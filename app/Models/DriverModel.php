<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class DriverModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drivers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\DriverEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    =['first_name','last_name','middle_name','state_id','licence_expiry','licence_number','address','suburb','date_of_birth','user_id','status','post_code'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
 


   public function create(array $data,int $customer_id=0)
   {


        $this->transBegin();

        $userData=['email'=>$data['email'],'phone'=>$data['phone'],'first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'address'=>$data['address']??'','middle_name'=>$data['middle_name']??''];

        $user_id=\App\Models\UserModel::createUser($userData);
        \App\Models\UserRoleModel::attachRole('driver',$user_id);


        $data['user_id']=$user_id;
        $data['state_id']=$data['state'];
        $data['status']=0;



        $driver_id=$this->insert($data);

        \App\Models\MediaModel::attach(['model'=>'User',
                                         'type'=>'user',
                                         'user_id'=>$user_id,
                                         'model_id'=>$user_id,
                                         'file'=>'driver_picture'],true);

        $redirect_url='';

       \App\Models\UserCommissionModel::attachDriverCommission($data['profit'],$user_id,$driver_id);


        if($driver_id && $customer_id):

            \App\Models\CustomerDriverModel::attach($driver_id,$customer_id);

            $redirect_url=base_url('admin/customers/'.$customer_id.'/drivers/view');

        endif;



        if($user_id && $driver_id):



        $this->transCommit();

        return array('status'=>1,'message'=>'The driver is created successfully.','type'=>'success','redirect'=>$redirect_url);

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to insert the record.Please try again later.');

        endif;

   }

      public function updateDriver(int $driver_id,array $data,int $customer_id=0)
   {


        $this->transBegin();

        $driver=$this->where('id',$driver_id)->first();

        $driver===null ? throw new DatabaseException('Record not found.'):$driver;



        $userData=['email'=>$data['email'],'phone'=>$data['phone'],'first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'address'=>$data['address']??'','middle_name'=>$data['middle_name']??''];

        $user_id=\App\Models\UserModel::updateUser($driver->user_id,$userData);

        unset($data['user_id']);
        unset($data['status']);

        $data['state_id']=$data['state'];

        if($this->update($driver->id,$data)):

        \App\Models\MediaModel::attach(['model'=>'User',
                                         'type'=>'user',
                                         'user_id'=>$driver->user_id,
                                         'model_id'=>$driver->user_id,
                                         'file'=>'driver_picture'],true);

        $redirect_url='';

       \App\Models\UserCommissionModel::attachDriverCommission($data['profit'],$driver->user_id,$driver->id);


        if($customer_id):
            $redirect_url=base_url('admin/customers/'.$customer_id.'/drivers/view');
        endif;

        $this->transCommit();

        return array('status'=>1,'message'=>'The driver is updated successfully.','type'=>'success','redirect'=>$redirect_url);

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to update the record.Please try again later.');

        endif;

   }

    public static function changeStatus(int $id)
    {
        $obj=new self();

        $driver= $obj->find($id);

        

        $driver->status=!$driver->status;

        return $obj->save($driver);
    }


         public static function destroy(int $id)
    {
        $driverObj=new self();

        $driverObj->transBegin();

        $driverObj->find($id)->deleteMedia();

       if($driverObj->delete($id)):

        $driverObj->transCommit();

    return array('status'=>1,'message'=>'The Driver is deleted successfully!','type'=>'success');

     else:

       $driverObj->transRollback();

       return array('status'=>0,'message'=>'Something went wrong! Please try again later.','type'=>'success');



   endif;

    }

    public static function getDriver(int $driver_id)
    {
        $obj=new self();

        return $obj->select('drivers.user_id,users.email,users.phone,users.first_name,users.last_name,users.username')->join('users','users.id=drivers.user_id')->find($driver_id);
    }

       public function list(string $search)
    {
        $result=$this->select('drivers.*,users.email')
                     ->join('users','users.id=drivers.user_id')
                     ->where('drivers.status',1)
                     ->groupStart()
                     ->like('drivers.first_name',$search)
                     ->orLike('drivers.last_name',$search)
                     ->orLike('users.phone',$search)
                     ->orLike('users.email',$search)
                     ->groupEnd()
                     ->findAll();

        $content='';

       

            $content.=view('admin/partials/drivers',['drivers'=>$result]);

   

        return $content;
    }



    public function getDriverRow(int $driver_id)
    {
       

        return $this->select('drivers.*,users.email,users.phone')->join('users','users.id=drivers.user_id')->find($driver_id);
    }


}
