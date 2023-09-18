<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;


class CustomerDriverModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customer_drivers';
    protected $primaryKey       = 'driver_id';
    protected $useAutoIncrement = true;
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['customer_id','driver_id'];

 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

     public static function driverCount(int $customer_id)
    {
        $obj=new self();

        return $obj->where('customer_id',$customer_id)->countAll();
    }


     public static function getCustomerDriver(int $customer_id,int $driver_id)
    {
          $driverObj=new \App\Models\DriverModel();

          $response= $driverObj->select('drivers.*,users.email,users.phone')->join('users','users.id=drivers.user_id')->join('customer_drivers','drivers.id=customer_drivers.driver_id')->where('customer_drivers.customer_id',$customer_id)->where('customer_drivers.driver_id',$driver_id)->first();
          
            return $response?$response: throw new DatabaseException('Unable to find the record.');
    }
   

    public static function attach(int $driver_id,int $customer_id)
    {
        $obj=new self();

       return $obj->insert(['driver_id'=>$driver_id,'customer_id'=>$customer_id]);


    }


     public static function getCustomerDrivers(int $customer_id)
    {
        
            $driverObj=new \App\Models\DriverModel();

            return $driverObj->select('drivers.*,users.email,users.phone')->join('users','users.id=drivers.user_id')->join('customer_drivers','drivers.id=customer_drivers.driver_id')->where('customer_drivers.customer_id',$customer_id)->findAll();

                      
    }
   

       public static function datatable()
    {
        $request = service('request');
        $draw = $request->getVar('draw');
        $start = $request->getVar('start');
        $length = $request->getVar('length');
        $search=$request->getVar('search[value]');

        $obj=new self();

        $query=$obj->select('customers.*,customers.id as customer_id, users.username,users.email,users.phone,users.id as id')
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
      return '<div class="btn-group"><button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions<i class="mdi mdi-chevron-down"></i></button><div class="dropdown-menu" style=""><a class="dropdown-item" href="'.base_url('admin/customers/'.$row['customer_id'].'/view').'"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;View</a><a class="dropdown-item" href="'.base_url('admin/customers/'.$row['id'].'/edit').'"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Edit</a><a class="dropdown-item" href="javascript:void(0)" onclick="deleteCustomer('.$row['id'].')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</a></div></div>';

      // <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
    }

    public function getStatus($row)
    {
        if($row['status']):

            return '<input class="form-check form-switch" onchange="changeStatus('.$row['customer_id'].')" type="checkbox" id="switch'.$row['customer_id'].'" switch="bool" checked=""><label class="form-label  full-switch" for="switch'.$row['customer_id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            else:

                 return '<input class="form-check form-switch" onchange="changeStatus('.$row['customer_id'].')" type="checkbox" id="switch'.$row['customer_id'].'" switch="bool"><label class="form-label full-switch" for="switch'.$row['customer_id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            endif;

    }

    public static function destroy(int $id)
    {
        $userObj=new \App\Models\UserModel();

        return $userObj->delete($id);
    }

    

     public static function changeStatus(int $id)
    {
        $obj=new self();

        $customer= $obj->find($id);

        

        $customer->status=!$customer->status;

        return $obj->save($customer);
    }


    public static function getCustomer(int $id)
    {
        $obj=new self();

        $customer= $obj->select('customers.*, users.email AS email,users.phone as phone') 
            ->join('users', 'customers.user_id = users.id') 
            ->where('customers.id',$id)->first();

        if($customer):

            $customer->getMedia();


        endif;

           return $customer===null ? throw new DatabaseException('Record not found.'):$customer;


    }

    public static function customerRow($id)
    {
        $obj=new self();

        return $obj->where('user_id',$id)->first();
    }

    public function UploadLicence(string $type,int $id)
    {
        $customer=$this->find($id);

        return \App\Models\MediaModel::attach(['model'=>'Customer',
                                         'type'=>$type,
                                         'user_id'=>$customer->user_id,
                                         'model_id'=>$customer->id,
                                         'file'=>$type],true);

        

    }
}

