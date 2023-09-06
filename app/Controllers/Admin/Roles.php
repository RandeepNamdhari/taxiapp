<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\RoleModel;

class Roles extends BaseController
{
    public function index(): string
    {
        $data['currentRoute']='admin-roles';
        $data['pageTitle']='Roles';

        $data['response']= run_with_exceptions(function(){ 

            $role=new RoleModel;

            return $role->getRolesWithUsers();

        });

       // echo '<pre>';print_r($data);die;

        return view('admin/roles/index',$data);
        
    }


    public function create(): string
    {
        $data['currentRoute']='admin-roles';
        $data['pageTitle']='Create Role';

        $data['response']= run_with_exceptions(function(){ 

            $data['permissions']=\App\Models\PermissionModel::all();

            return array('status'=>1,'data'=>$data);

        });
     
        
        return view('admin/roles/create',$data);
    }

    public function store()
    {

        if ($this->request->getMethod() === 'post') {

          $data = [
            'role_name'   => $this->request->getVar('role_name'),
            'permissions' => $this->request->getVar('permissions'),
                   ];

        $rule = [
            'role_name'   => 'required|is_unique[roles.name]',
            'permissions' => 'required',
        ];

        if (! $this->validateData($data, $rule)) {
             $response=array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $roleModel=new RoleModel();
            $response=$roleModel->addRoleWithPermissions($data);
           
        }



        return $this->response->setJSON($response);
       
    }

}


  public function edit(int $id): string
    {


       $data['currentRoute']='admin-roles';
        $data['pageTitle']='Edit Role';

        $data['response']= run_with_exceptions(function()use ($id){ 

            $role=new RoleModel;


            return $role->getRoleWithPermissions($id);

        });

    
        return view('admin/roles/edit',$data);
    }


        public function update(int $id)
    {

        if ($this->request->getMethod() === 'post') {

          $data = [
            'role_name'   => $this->request->getVar('role_name'),
            'permissions' => $this->request->getVar('permissions'),
                   ];

        $rule = [
            'role_name'   => 'required|is_unique[roles.name,id,'.$id.']',
            'permissions' => 'required',
        ];

        if (! $this->validateData($data, $rule)) {
             $response=array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $roleModel=new RoleModel();
            $response=$roleModel->updateRoleWithPermissions($data,$id);
           
        }



        return $this->response->setJSON($response);
       
    }

}



    public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\RoleModel::destroy($id);

            return array('status'=>1,'message'=>'The Role is deleted successfully!','type'=>'success');

        });
           
        }



        return $this->response->setJSON($response);
       
    }

    public function attach()
    {
         if ($this->request->getMethod() === 'post') {

            $data=$this->request->getJSON(true);

     
             $response=run_with_exceptions(function() use ($data){ 

             return \App\Models\UserRoleModel::attach($data);

         

        });
           
        }



        return $this->response->setJSON($response);

    }

    public function detach()
    {
         if ($this->request->getMethod() === 'post') {

            $data=$this->request->getJSON(true);

     
             $response=run_with_exceptions(function() use ($data){ 

             return \App\Models\UserRoleModel::detach($data);

         

        });
           
        }



        return $this->response->setJSON($response);

    }



}
