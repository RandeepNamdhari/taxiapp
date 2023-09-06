<?php

namespace App\Models;

use CodeIgniter\Model;



class PermissionModel extends Model
{
    protected $table = 'permissions'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['name', 'description'];


    public function getPermissions()
    {
        return run_with_exceptions(function(){   

            return $this->findAll();

        });
    }

    public static function all()
    {
           $obj=new self();

           return $obj->findAll();

    }

    public static function getPermissionIds(array $permissionNamesArray)
    {
        
           $obj=new self();

           $permissions=$obj->whereIn('name',$permissionNamesArray)->findAll();

           return array_values(array_column($permissions,'id'));


    }



  




}
