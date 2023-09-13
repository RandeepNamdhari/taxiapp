<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'vehicles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\VehicleEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['regd_no','model','state_id','color','body_type','customer_id','user_id','engine_no','vin','kilometers_driven','year','make'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public static function getCustomerVehicles(int $customer_id)
    {
            return [];
    }

    public function create($data,$user_id)
    {

        $data['state_id']=$data['state'];

      

        $customer=\App\Models\CustomerModel::customerRow($user_id);

        $data['customer_id']=$customer->id;
        $data['user_id']=$customer->user_id;

        $vehicle_id=$this->insert($data);


            if($vehicle_id):


                return array('status'=>1,'message'=>'Vehicle is created successfully!','type'=>'success','redirect'=>base_url('admin/customers/'.$customer->user_id.'/vehicles/'.$vehicle_id.'/gallery'),'vehicle_id'=>$vehicle_id);

            else:

                 $this->rollback();

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
  

  
}
