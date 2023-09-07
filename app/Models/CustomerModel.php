<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;


class CustomerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType    = \App\Entities\CustomerEntity::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['first_name','last_name','middle_name','state_id','company_name','licence_expiry','licence_number','address','suburb','date_of_birth','interested_party','user_id'];

 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

   public function create($data)
   {


        $this->transBegin();

        $userData=['email'=>$data['email'],'phone'=>$data['phone']];

        $user_id=\App\Models\UserModel::createUser($userData);

        $data['user_id']=$user_id;
        $data['state_id']=$data['state'];



        if($user_id && $this->insert($data)):

        $this->transCommit();

        return array('status'=>1,'message'=>'The customer is created successfully.','type'=>'success','redirect'=>base_url('admin/customers'));

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to insert the record.Please try again later.');

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

        $query=$obj->select('customers.*, users.username,users.email,users.phone')
        ->join('users', 'users.id = customers.user_id')->like('users.username',$search)
        ->limit($length, $start)
            ->get();

           $rows= $query->getResultArray();

           foreach($rows as $index => $row):

            $row['serial_no']=$index+1;
            $row['actions']=$obj->actions($row);
            $row['created_at']=date('d M Y',strtotime($row['created_at']));
            $row['status']=$obj->getStatus($row);

                $rows[$index]=$row;

           endforeach;

        $data = [
            'draw' => $draw,
            'recordsTotal' => $obj->countAll(),
            'recordsFiltered' => $obj->countAllResults(),
            'data' => $rows,
        ];

        return $data;
    }

    public function actions($row)
    {
      return '<div class="btn-group"><button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions<i class="mdi mdi-chevron-down"></i></button><div class="dropdown-menu" style=""><a class="dropdown-item" href="'.base_url('admin/customers/'.$row['id'].'/view').'"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;View</a><a class="dropdown-item" href="'.base_url('admin/customers/'.$row['id'].'/edit').'"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Edit</a><a class="dropdown-item" href="javascript:void(0)" onclick="deleteCustomer('.$row['id'].')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</a></div></div>';

      // <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
    }

    public function getStatus($row)
    {
        if($row['status']):

            return '<input class="form-check form-switch" type="checkbox" id="switch'.$row['id'].'" switch="bool" checked=""><label class="form-label  full-switch" for="switch'.$row['id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            else:

                 return '<input class="form-check form-switch" type="checkbox" id="switch'.$row['id'].'" switch="bool"><label class="form-label full-switch" for="switch'.$row['id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            endif;

    }

    public static function destroy(int $id)
    {
        $obj=new self();

        return $obj->delete($id);
    }
}
