<?php

namespace App\Models;

use CodeIgniter\Model;



class RoleModel extends Model
{
    protected $table = 'roles'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['name', 'description'];


    public function addRoleWithPermissions($data)
    {
        $response= run_with_exceptions(function() use ($data){  

            $db = \Config\Database::connect();
            $this->db->transBegin();

            $role=array('name'=>$data['role_name']);

            $role_id=$this->insert($role);

            $rolePermissions= new \App\Models\RolePermissionModel;


            if($role_id):

                foreach($data['permissions'] as $permission):


                    $rolePermissions->insert(array('role_id'=>$role_id,'permission_id'=>$permission));



                endforeach;

            endif;



            return array('status'=>1,'message'=>'The role is created successfully','type'=>'success');

            

           

        },'array');

        if($response['status']==1 && $this->db->transStatus() === true):

           $this->db->transCommit();

        else:

              $this->db->transRollback();

        endif;

        return $response;
    }
  




}
