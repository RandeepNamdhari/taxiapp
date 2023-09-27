<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyBookingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'company_bookings';
    protected $primaryKey       = 'company_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['booking_id','company_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public static function attach(int $booking_id,int $company_id)
    {
        $obj=new self();

       return $obj->insert(['booking_id'=>$booking_id,'company_id'=>$company_id]);


    }
    
    public static function CheckAndAttach(int $booking_id,int $company_id)
    {
        $obj=new self();

        if(!$obj->where('booking_id',$booking_id)->where('company_id',$company_id)->first()):

       return $obj->insert(['booking_id'=>$booking_id,'company_id'=>$company_id]);
       endif;


    }

    
     public static function CheckAndDetach(int $booking_id,int $company_id)
    {
        $obj=new self();
 
        return $obj->where('booking_id',$booking_id)->where('company_id',$company_id)->delete();


    }
   
}
