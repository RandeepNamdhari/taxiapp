<?php

namespace App\Models;

use CodeIgniter\Model;



class UserRoleModel extends Model
{
    protected $table = 'user_roles'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['role_id', 'user_id'];
    protected $user;



    public static function getRoleAndUsers($roles)
    {
        $obj=new self();

        $rolesIds=array_values(array_column($roles,'id'));


        $role_with_users=$obj->whereIn('role_id',$rolesIds)->findAll();



        if(count($role_with_users)):

        $userIds=array_unique(array_values(array_column($role_with_users,'user_id')));

        $users=\App\Models\UserModel::WhereIdIn($userIds);


        foreach($roles as $index => $role):
            foreach($role_with_users as $role_user):
                if($role['id']==$role_user['role_id']):
                    foreach($users as $user):
                        if($role_user['user_id']==$user['id']):

                            $roles[$index]['users'][]=$user;

                        endif;
                    endforeach;
                endif;
            endforeach;

        endforeach;

        endif;

        return $roles;

    }




}
