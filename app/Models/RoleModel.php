<?php

namespace App\Models;

use CodeIgniter\Model;



class RoleModel extends Model
{
    protected $table = 'roles'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['name', 'description','is_default'];


    public function addRoleWithPermissions($data)
    {
        $response= run_with_exceptions(function() use ($data){  

            $this->db->transBegin();

            $role=array('name'=>$data['role_name']);

            $role_id=$this->insert($role);

            $rolePermissions= new \App\Models\RolePermissionModel;


            if($role_id):

                foreach($data['permissions'] as $permission):


                    $rolePermissions->insert(array('role_id'=>$role_id,'permission_id'=>$permission));



                endforeach;

            endif;



            return array('status'=>1,'message'=>'The role is created successfully','type'=>'success',
                         'redirect'=>base_url('admin/roles'));

            

           

        },'array');

        if($response['status']==1 && $this->db->transStatus() === true):

           $this->db->transCommit();

        else:

              $this->db->transRollback();

        endif;

        return $response;
    }


    public function getRolesWithUsers()
    {
          $roles=$this->findAll();

          
          
          if(count($roles)):

          $roles=\App\Models\UserRoleModel::getRoleAndUsers($roles);

          endif;

          $data['roles']=$roles;



          return array('data'=>$data,'status'=>1);
    }


    public function getRoleWithPermissions($role_id)
    {

          $role=$this->find($role_id);

          $data['role']=$role===null ? throw new DatabaseException('Record not found.'):$role;

         
          $data['role']['permissions']=\App\Models\RolePermissionModel::getPermissionsWithRoleId($role_id);

          $data['permissions']=\App\Models\PermissionModel::all();


          return array('data'=>$data,'status'=>1);
    }

    public static function destroy(int $id)
    {
        $obj=new self();

        $role=$obj->find($id);

        if(!$role['is_default']):

        return $obj->delete($id);

    else:

         return false;

        endif;
    }

    

     public function updateRoleWithPermissions($data,int $id)
    {
        $response= run_with_exceptions(function() use ($data,$id){  

            $this->db->transBegin();

            $role=array('name'=>$data['role_name']);

            $roleRow=$this->find($id);

            if($roleRow['is_default'] && $role['name']!=$roleRow['name']):

                return array('status'=>1,'message'=>'The default role name cannot be changed','type'=>'warning');


            endif;

           $this->update($id,$role);


            $rolePermissions= new \App\Models\RolePermissionModel;


            

                $permissions=$rolePermissions->sortWithExistingPermissions($data['permissions'],$id);

                if(count($permissions)):

                foreach($permissions as $permission):


                    $rolePermissions->insert(array('role_id'=>$id,'permission_id'=>$permission));



                endforeach;

            endif;






            return array('status'=>1,'message'=>'The role is updated successfully','type'=>'success',
                         'redirect'=>base_url('admin/roles'));

            

           

        },'array');

        if($response['status']==1 && $this->db->transStatus() === true):

           $this->db->transCommit();

        else:

              $this->db->transRollback();

        endif;

        return $response;
    }


    public static function getRoleWithName(string $role_name)
    {
        $obj=new self();

        return $obj->where('name',$role_name)->first();
    }

  

  




}
