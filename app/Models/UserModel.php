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

    public static function search()
    {
        $request = \Config\Services::request();

        $search=$request->getVar('search');

        $obj=new self();


        $data['users']=$obj->like('username', $search)->like('email',$search)->findAll();

        $data['content']=view('admin/partials/user-list',$data);

        return array('status'=>1,'message'=>'success','data'=>$data);
    }






}
