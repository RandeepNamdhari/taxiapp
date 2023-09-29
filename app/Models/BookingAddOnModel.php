<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingAddOnModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'booking_add_ons';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['service_id','booking_id','amount','note'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
  


  public static function create($data)
  {
      $obj=new self();

      $data['booking_id']=$data['bookingID'];
      $data['service_id']=$data['service'];

      $id=$obj->insert($data);

      return $id ? $id : throw new DatabaseException('Unable to insert the record.Please try again later.');
  }


  public static function getAddons(int $booking_id)
  {
     $obj=new self();

     return $obj->select('booking_add_ons.*,services.name')->join('services','booking_add_ons.service_id=services.id','left')->where('booking_id',$booking_id)->findAll();
  }

  public static function remove(int $addon_id)
  {
    $obj=new self();

    return $obj->delete($addon_id);
  }
}
