<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'states';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','code'];

    // Dates
    protected $useTimestamps = true;
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
