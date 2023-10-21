<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


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
            if($detail['driver_id']):
            $details[$ind]['driver']=\App\Models\DriverModel::getDriver($detail['driver_id']);
        endif;
        }

        return $details;
    }


    public static function createOrUpdate($data,int $booking_id)
    {
      
      $obj=new self();




      $bookingDetail=array('vehicle_id'=>$data['vehicle'],
                           'driver_id'=>$data['driver']?$data['driver']:null,
                           'booking_id'=>$booking_id,
                           'from_location'=>$data['from_location'],
                           'to_location'=>$data['to_location'],
                           'from_location_latitude'=>$data['from_location_latitude']??'',
                            'from_location_longitude'=>$data['from_location_longitude']??'',
                            'to_location_latitude'=>$data['to_location_latitude']??'',
                            'to_location_longitude'=>$data['to_location_longitude']??'',
                            'distance'=>$data['distance']??0,
                            'estimate_time'=>$data['estimate_time']??null,
                            'pickup_time'=>$data['pickup_time']??null,
                            'drop_time'=>$data['drop_time']??null,
                            'fares'=>$data['fares']??null,
                            'note'=>$data['note']??null,
                            'status'=>'pending');

    

      if(isset($data['booking_detail_id'])):

      $rid=  $obj->update($data['booking_detail_id'],$bookingDetail);



      else:

      $rid=  $obj->insert($bookingDetail);

      endif;

      if($rid):

           return $rid;

      else:

         throw new DatabaseException('Unable to insert the booking details.Please try again later.');

      endif;



    }

    public static function attachDriver(int $driver_id,int $booking_id)
    {
        $obj=new self();

        return $obj->where('booking_id',$booking_id)->set(['driver_id'=>$driver_id])->update();
    }
}
