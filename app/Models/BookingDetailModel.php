<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'booking_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['booking_id','driver_id','vehicle_id','from_location','to_location','from_location_latitude','from_location_longitude','to_location_latitude','to_location_longitude','distance','estimate_time','pickup_time','drop_time','fares','note','status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    public static function getDetails(int $booking_id)
    {
        $obj=new self();

        $details= $obj->where('booking_id',$booking_id)->findAll();

        foreach($details as $ind => $detail)
        {
            $details[$ind]['vehicle']=\App\Models\VehicleModel::getVehicle($detail['vehicle_id']);
            $details[$ind]['driver']=\App\Models\DriverModel::getDriver($detail['driver_id']);
        }

        return $details;
    }


    public static function createOrUpdate($data,int $booking_id)
    {
      
      $obj=new self();




      $bookingDetail=array('vehicle_id'=>$data['vehicle'],
                           'driver_id'=>$data['driver'],
                           'booking_id'=>$booking_id,
                           'from_location'=>$data['from_location'],
                           'to_location'=>$data['to_location'],
                           'from_location_latitude'=>$data['from_location_latitude']??'',
                            'from_location_longitude'=>$data['from_location_longitude']??'',
                            'to_location_latitude'=>$data['to_location_latitude']??'0',
                            'to_location_longitude'=>$data['to_location_longitude']??'',
                            'distance'=>$data['distance']??'',
                            'estimate_time'=>$data['estimate_time']??'',
                            'pickup_time'=>$data['pickup_time']??'',
                            'drop_time'=>$data['drop_time']??'',
                            'fares'=>$data['fares']??'0',
                            'note'=>$data['note']??'',
                            'status'=>'pending');

      //print_r($data);die;

      if(isset($data['booking_detail_id'])):

      return  $obj->update($data['booking_detail_id'],$bookingDetail);



      else:

      return  $obj->allowEmptyInserts()->insert($bookingDetail);

      endif;



    }
}
