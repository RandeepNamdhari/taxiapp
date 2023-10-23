<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class DriverTipModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'driver_tips';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['booking_id','user_id','amount'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public static function attachTip(array $tip)
    {
        $obj=new self();

        $id=$obj->insert($tip);

        if($id):
            return $id;

            else:

                throw new DatabaseException('Unable to add tip to driver account.');

        endif;
    }

}
