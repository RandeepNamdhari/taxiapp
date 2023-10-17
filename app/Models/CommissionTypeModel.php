<?php

namespace App\Models;

use CodeIgniter\Model;

class CommissionTypeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'commission_types';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','type','amount','status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public static function all()
    {
        $obj=new self();

        return $obj->findAll();

     

    }

    public static function getType(int $id)
    {
        $obj=new self();

        return $obj->find($id);
    }

       public function createOrUpdate($data)
   {


        if(isset($data['hid'])):

            $res=$this->update($data['hid'],$data);

        else:


           $res= $this->insert($data);

        endif;

        if($res):


        return array('status'=>1,'message'=>'The commission type is create or updated successfully.','type'=>'success','redirect'=>base_url('admin/settings/commission/types'));

        else:


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
        $order=$request->getVar('order[0][dir]');

        $obj=new self();

        $query=$obj->builder();

        $query->select('commission_types.*')->like('name',$search);

        $query1=clone $query;


        $query=$query->limit($length, $start)->orderBy('name',$order)
            ->get();

           $rows= $query->getResultArray();

           foreach($rows as $index => $row):

            $row['serial_no']=$index+1;
            $row['actions']=$obj->actions($row);
           $row['type']=ucwords($row['type']);
            $row['amount']=system_setting('currency_icon').''.$row['amount'];

           
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
      return '<div class="btn-group"><button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions<i class="mdi mdi-chevron-down"></i></button><div class="dropdown-menu" style=""><a class="dropdown-item" href="'.base_url('admin/settings/commission/types/'.$row['id'].'/edit').'" ><i class="fas fa-user-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Edit</a><a class="dropdown-item" href="javascript:void(0)" onclick="deleteCommissionType('.$row['id'].')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</a></div></div>';

      // <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
    }

    public function getStatus($row)
    {
        if($row['status']):

            return '<input class="form-check form-switch" onchange="changeStatus('.$row['id'].')" type="checkbox" id="switch'.$row['id'].'" switch="bool" checked=""><label class="form-label  full-switch" for="switch'.$row['id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            else:

                 return '<input class="form-check form-switch" onchange="changeStatus('.$row['id'].')" type="checkbox" id="switch'.$row['id'].'" switch="bool"><label class="form-label full-switch" for="switch'.$row['id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            endif;

    }

    public static function destroy(int $id)
    {
        $obj=new self();

        return $obj->delete($id);
    }

    

     public static function changeStatus(int $id)
    {
        $obj=new self();

        $commission_type= $obj->find($id);

        


        return $obj->update($id,['status'=>!$commission_type['status']]);
    }




}
