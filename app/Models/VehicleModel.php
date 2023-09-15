<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;


class VehicleModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'vehicles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\VehicleEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['regd_no','model','state_id','color','body_type','engine_no','vin','kilometers_driven','year','make','status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // public static function CustomerVehicles(array $vehicle_ids)
    // {
    //   $obj=new self();

    //   return $obj->whereIn('id',$vehicle_ids)->findAll();
    // }
  
    public function create(array $data,int $customer_id=0)
    {

        $data['state_id']=$data['state'];

        $this->transBegin();  

        $vehicle_id=$this->insert($data);

        $redirect_url='';



        if($customer_id && $vehicle_id)
        {     


         $vehicle_id=\App\Models\CustomerVehicleModel::attach($customer_id,$vehicle_id);

         $redirect_url=base_url('admin/customers/'.$customer_id.'/vehicles/'.$vehicle_id.'/gallery');


        }



            if($vehicle_id):

              $this->transCommit();

                return array('status'=>1,'message'=>'Vehicle is created successfully!','type'=>'success','redirect'=>$redirect_url,'vehicle_id'=>$vehicle_id);

            else:

              $this->transRollback();


               

                return array('status'=>0,'message'=>'Something went wrong.Please check your details and try again.','type'=>'warning');

            endif;
    }

    public function updateVehicle(array $data,int $vehicle_id,$customer_id=0)
    {
          $data['state_id']=$data['state'];      

          $result=$this->update($vehicle_id,$data);

          $redirect_url='';

          if($customer_id):

            $redirect_url=base_url('admin/customers/'.$customer_id.'/vehicles/view');

          endif;


            if($result):


                return array('status'=>1,'message'=>'Vehicle is updated successfully!','type'=>'success','redirect'=>$redirect_url,'vehicle_id'=>$vehicle_id);

            else:

               

                return array('status'=>0,'message'=>'Something went wrong.Please check your details and try again.','type'=>'warning');

            endif;
    }

    public function UploadVehicleImage($user_id,int $vehicle_id)
    {
        

        return \App\Models\MediaModel::attach(['model'=>'Vehicle',
                                         'type'=>'vehicle',
                                         'user_id'=>$user_id,
                                         'model_id'=>$vehicle_id,
                                         'file'=>'vehicle_image']);

        

    }

    public static function gallery(int $vehicle_id)
    {
        $obj=new self();
        $vehicle=$obj->where('id',$vehicle_id)->first();

       $vehicle->getMedia()??[];

       return $vehicle;


    }

     public static function destroy(int $id)
    {
        $vehicleObj=new self();

        $vehicleObj->transBegin();

        $vehicleObj->find($id)->deleteMedia();

       if($vehicleObj->delete($id)):

        $vehicleObj->transCommit();

    return array('status'=>1,'message'=>'The Vehicle is deleted successfully!','type'=>'success');

     else:

       $vehicleObj->transRollback();

       return array('status'=>0,'message'=>'Something went wrong! Please try again later.','type'=>'success');



   endif;

    }


     public static function changeStatus(int $id)
    {
        $obj=new self();

        $vehicle= $obj->find($id);

        

        $vehicle->status=!$vehicle->status;

        return $obj->save($vehicle);
    }
  

  
}
