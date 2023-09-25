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
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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
}
