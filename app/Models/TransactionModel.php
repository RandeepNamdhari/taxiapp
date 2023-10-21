<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class TransactionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['model_id','model','user_id','amount','user_type','note','type','parent_id','status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function create(array $transaction,$model_id=null,string $model='')
    {
       if($model_id && $model):

        $parentTransaction=$this->where('model_id',$model_id)->where('model',$model)->first();

        $transaction['parent_id']=$parentTransaction['id']??null;

       endif;
       $transaction_id=$this->insert($transaction);

       $transaction['transaction_id']=$transaction_id;


       if($transaction_id):

       $transaction_history=\App\Models\TransactionHistoryModel::create($transaction);


        return $transaction_id;

       else:

        throw new DatabaseException('Unable to insert the transaction.Please try again later.');

       endif;
    }


    public function updateTransaction(array $transaction)
    {
        $row=$this->where('model',$transaction['model'])
                          ->where('model_id',$transaction['model_id'])->first();

            if($this->update($row['id'],$transaction)):

                $transaction['transaction_id']=$row['id'];

                $transaction['transaction_type']='update';

                $transaction['status']=$row['status'];

             $transaction_history=\App\Models\TransactionHistoryModel::create($transaction);


            else:

                 throw new DatabaseException('Unable to insert the transaction.Please try again later.');

            endif;




    }

    public function removeTransaction(int $model_id,string $model)
    {
        if($this->where('model',$model)->where('model_id',$model_id)->delete()):

            return true;

        else:

        throw new DatabaseException('Unable to remove the transaction.Please try again later.');

        endif;
    }


         public static function datatable()
    {
        $request = service('request');
        $draw = $request->getVar('draw');
        $start = $request->getVar('start');
        $length = $request->getVar('length');
        $search=$request->getVar('search[value]');

        $obj=new self();

        $query=$obj->builder();


      $query->select('transactions.*, users.username,users.first_name,users.email,users.phone,transactions.id as id')
        ->join('users', 'users.id = transactions.user_id')->like('users.username',$search)->orLike('users.first_name',$search);

          $query1= clone $query;


        $query=$query->limit($length, $start)
            ->get();

           $rows= $query->getResultArray();

           foreach($rows as $index => $row):

            $row['serial_no']=$index+1;
            $row['username']=$row['username']?$row['username']:$row['first_name'];
            $row['actions']=$obj->actions($row);
            $row['created_at']=date('d M Y',strtotime($row['created_at']));
            $row['status']=$obj->getStatus($row);

                $rows[$index]=$row;

           endforeach;

        $data = [
            'draw' => $draw,
            'recordsTotal' => $obj->countAll(),
            'recordsFiltered' => $query1->countAllResults(),
            'data' => $rows,
        ];

        return $data;
    }

    public function actions($row)
    {
      return '<div class="btn-group"><button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions<i class="mdi mdi-chevron-down"></i></button><div class="dropdown-menu" style=""><a class="dropdown-item" href="'.base_url('admin/transactions/'.$row['id'].'/view').'"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;View</a>
      <a class="dropdown-item" href="javascript:void(0)" onclick="changePaymentStatus('.$row['id'].')"><i class="far fa-check-circle "></i>&nbsp;&nbsp;&nbsp;&nbsp;Mark As Paid</a>
      </div></div>';

      // <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
    }

    public function getStatus($row)
    {
        if($row['status']=='paid'):

            return '<b class="text-success">Paid</b>';

        elseif($row['status']=='pending'):

            return '<b class="text-warning">Pending</b>';

            else:

                            return '<b class="text-danger">'.ucwords($row['status']).'</b>';


            endif;

    }

    public static function getInvoice(int $id)
    {
        $obj=new self();

        //$transaction=$obj->find($id);


        $transactions=$obj->select('transactions.*,users.address,users.username,users.phone,users.first_name,bookings.booking_uid,booking_details.to_location,booking_details.from_location,services.name as service_name,driver_user.username as driver_name,driver_user.phone as driver_phone,driver_user.first_name as driver_first_name')
        ->join('bookings','bookings.id=transactions.model_id and transactions.model="Booking"','left')
        ->join('booking_details','bookings.id=booking_details.booking_id','left')
        ->join('booking_add_ons','transactions.model_id=booking_add_ons.id and model="Addon"','left')
        ->join('users','transactions.user_id=users.id')
        ->join('drivers','booking_details.driver_id=drivers.id','left')
        ->join('users as driver_user','drivers.user_id=driver_user.id','left')
        ->join('services','services.id=booking_add_ons.service_id','left')
        ->where('transactions.id',$id)->orWhere('transactions.parent_id',$id)->get()->getResultArray();

        return $transactions;
    }
    

}
