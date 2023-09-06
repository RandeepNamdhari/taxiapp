<?php

namespace App\Models;

use CodeIgniter\Model;



class RolePermissionModel extends Model
{
    protected $table = 'role_permissions'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['role_id', 'permission_id'];


    public static function getPermissionsWithRoleId($id)
    {
        $obj= new self();
        return $obj->where('role_id',$id)->findAll();
    }

    public function sortWithExistingPermissions($permissions,$role_id)
    {

       $existingPermissions=$this->select('permission_id')->where('role_id',$role_id)->whereIn('permission_id',$permissions)->findAll();

       $existingPermissions=array_values(array_column($existingPermissions, 'permission_id'));

       $this->where('role_id',$role_id)->whereNotIn('permission_id',$permissions)->delete();



       return array_diff($permissions, $existingPermissions);

    }


     public static function userPermissionsByRoles(array $roles)
    {
        $obj=new self();

        $permissions= $obj->whereIn('role_id',$roles)->findAll();

        return array_values(array_column($permissions,'permission_id'));
    }


  
  




}
