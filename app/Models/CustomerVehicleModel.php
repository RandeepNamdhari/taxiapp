<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerVehicleModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customer_vehicles';
    protected $primaryKey       = 'vehicle_id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['customer_id','vehicle_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

     public static function getCustomerVehicles(int $customer_id)
    {
        
            $vehicleObj=new \App\Models\VehicleModel();

            return $vehicleObj->select('vehicles.*')->join('customer_vehicles','vehicles.id=customer_vehicles.vehicle_id')->where('customer_vehicles.customer_id',$customer_id)->findAll();

                      
    }

    public static function getCustomerVehicle(int $customer_id,$vehicle_id)
    {
          $vehicleObj=new \App\Models\VehicleModel();

          $response= $vehicleObj->select('vehicles.*')->join('customer_vehicles','vehicles.id=customer_vehicles.vehicle_id')->where('customer_vehicles.customer_id',$customer_id)->where('customer_vehicles.vehicle_id',$vehicle_id)->first();
          
            return $response?$response: throw new DatabaseException('Unable to find the record.');
    }


    public static function attach(int $customer_id,int $vehicle_id)
    {
        $obj=new self();

        return $obj->insert(['customer_id'=>$customer_id,'vehicle_id'=>$vehicle_id])?$vehicle_id:0;

    }


 
}
