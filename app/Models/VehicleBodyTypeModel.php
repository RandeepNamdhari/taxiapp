<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleBodyTypeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'vehicle_body_types';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public static function all()
    {
        $obj=new self();

        return $obj->findAll();     

    }

 
}
