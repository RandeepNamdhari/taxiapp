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


        $role_with_users=$obj->whereIn('role_id',$rolesIds)->orderBy('id','desc')->findAll();



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

    public static function getUsersOfRole(int $role_id)
    {
       $obj=new self();

       return $obj->where('role_id',$role_id)->findAll();
    }

      public static function attach(array $data)
    {
        $obj=new self();

        if(!$obj->where('user_id',$data['user_id'])->where('role_id',$data['model_id'])->first()):

            $obj->insert(['role_id'=>$data['model_id'],'user_id'=>$data['user_id']]);

            $data['content']=$obj->userDiv($data['user_id'],$data['model_id']);

            return array('status'=>1,'message'=>'The role is attached to the user successfully!','type'=>'success','data'=>$data);

        else:

               return array('status'=>0,'message'=>'The role is already attached to the user.','type'=>'warning');



        endif;
    }

    public function userDiv($user_id,$role_id)
    {
        $user=$this->db->table('users')->where('id',$user_id)->get()->getRowArray();

        return ' <div data-toggle="tooltip" data-placement="top" title="'.ucwords($user['username']).'" class="avatar-sm zIndex0 role-member"><span class="avatar-title rounded-circle text-white font-size-14" style="background:'.randomColor($user['username']).'">'.strtoupper(mb_substr($user['username'], 0, 1)).'</span><span onclick="detachUser(this,'.$user['id'].','.$role_id.')" class="remove-icon-user removeUserIcon">X</span></div>';
    }

      public static function detach(array $data)
    {
        $obj=new self();

        if($obj->where('user_id',$data['user_id'])->where('role_id',$data['model_id'])->first()):

            $obj->where('role_id',$data['model_id'])->where('user_id',$data['user_id'])->delete();

            

            return array('status'=>1,'message'=>'The role is detach from the user successfully!','type'=>'success');

        else:

               return array('status'=>0,'message'=>'No data is effected!','type'=>'warning');



        endif;
    }




}
