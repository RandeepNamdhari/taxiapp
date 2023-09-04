<?php

namespace App\Models;

use CodeIgniter\Model;



class UserModel extends Model
{
    protected $table = 'users'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['username', 'email', 'password', 'remember_token','reset_token'];
    protected $user;



 public static function all()
    {
        $obj=new self();

        return $obj->findAll();
    }


    public static function WhereIdIn(array $ids)
    {
        $obj=new self();

        return $obj->whereIn('id',$ids)->findAll();
    }






}
