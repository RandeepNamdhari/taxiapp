<?php

namespace App\Models;

use CodeIgniter\Model;



class UserModel extends Model
{
    protected $table = 'users'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['username', 'email', 'password', 'remember_token','reset_token','phone','first_name','middle_name','last_name','address'];
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

    public static function search()
    {
        $request = \Config\Services::request();

        $search=$request->getVar('search');

        $type=$request->getVar('type');

        $id=$request->getVar('id');



        $obj=new self();

        $query=$obj->like('username', $search)->like('email',$search);

        if($type && $id):

        $existingUsers=$obj->checkExistingUsers($type,$id);

       if(count($existingUsers)):

       

        $query->whereNotIn('id',$existingUsers);

        endif;



        endif;


        $data['users']=$query->findAll();

        $data['role_id']=$id;

        $data['content']=view('admin/partials/user-list',$data);

        return array('status'=>1,'message'=>'success','data'=>$data);
    }

    public function checkExistingUsers($type,$id)
    {
       switch ($type) {

           case 'user_roles':



               $users=\App\Models\UserRoleModel::getUsersOfRole($id);



               return array_values(array_column($users,'user_id'));

               break;
           
           default:
               // code...
               break;
       }
        
    }


    public static function createUser($user)
    {
         $obj=new self();

         return $obj->allowEmptyInserts()->insert($user);
    }

    public static function updateUser($id,$user)
    {
         $obj=new self();

         return $obj->update($id,$user);
    }

    public static function checkExisitngUser(string $search)
    {
       $obj=new self();

       $user=$obj->where('email',$search)->orWhere('phone',$search)->first();

       return $user;

    }






}
