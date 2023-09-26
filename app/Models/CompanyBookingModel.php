<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyBookingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'company_bookings';
    protected $primaryKey       = 'employee_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['employee_id','company_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public static function attach(int $employee_id,int $company_id)
    {
        $obj=new self();

       return $obj->insert(['employee_id'=>$employee_id,'company_id'=>$company_id]);


    }
   
}
