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
    protected $allowedFields    = ['first_name','last_name','middle_name','state_id','company_name','licence_expiry','licence_number','address','suburb','date_of_birth','interested_party','user_id','status','post_code'];

 
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
        $data['status']=0;



        if($user_id && $this->insert($data)):

        $this->transCommit();

        return array('status'=>1,'message'=>'The customer is created successfully.','type'=>'success','redirect'=>base_url('admin/customers'));

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to insert the record.Please try again later.');

        endif;

   }

      public function updateCustomer(int $id,$data)
   {


        $this->transBegin();

        $customer=$this->where('user_id',$id)->first();

        $customer===null ? throw new DatabaseException('Record not found.'):$customer;



        $userData=['email'=>$data['email'],'phone'=>$data['phone']];

        $user_id=\App\Models\UserModel::updateUser($customer->user_id,$userData);

        unset($data['user_id']);
        unset($data['status']);

        $data['state_id']=$data['state'];

        if($this->update($customer->id,$data)):

        $this->transCommit();

        return array('status'=>1,'message'=>'The customer is updated successfully.','type'=>'success','redirect'=>base_url('admin/customers/'.$customer->id.'/view'));

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to update the record.Please try again later.');

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


      $query->select('customers.*,customers.id as customer_id, users.username,users.email,users.phone,users.id as id')
        ->join('users', 'users.id = customers.user_id')->like('users.username',$search);

          $query1= clone $query;


        $query=$query->limit($length, $start)
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
            'recordsFiltered' => $query1->countAllResults(),
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

        $customer->vehicle_count=\App\Models\CustomerVehicleModel::vehicleCount($customer->id);

        $customer->driver_count=\App\Models\CustomerDriverModel::driverCount($customer->id);

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
