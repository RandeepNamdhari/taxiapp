<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class UserCommissionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_commissions';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','commission_type_id','amount','model','model_id','type'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public static function attachDriverCommission(array $profits,int $user_id,int $driver_id)
    {
        $obj=new self();

        $obj->where('user_id',$user_id)->where('model','Driver')->where('model_id',$driver_id)->delete();

        foreach($profits as $type =>$value):

            if($value['commission_type_id']):

                $row=array('commission_type_id'=>$value['commission_type_id'],
                           'amount'=>$value['amount'],
                           'user_id'=>$user_id,
                           'model'=>'Driver',
                           'model_id'=>$driver_id,
                           'type'=>$type);

                if(!$obj->insert($row)):

                     throw new DatabaseException('Unable to insert the record.Please try again later.');

                endif;


            endif;

        endforeach;
    }


    public static function getCommissions(string $model,int $model_id)
    {
        $obj=new self();
        return $obj->where('model',$model)->where('model_id',$model_id)->findAll();

    }

}
