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
        
        return view('admin/roles/index',$data);
    }


    public function create(): string
    {
        $data['currentRoute']='admin-roles';
        $data['pageTitle']='Roles';
        $permissionModel=new \App\Models\PermissionModel;
        $data['permissions']=$permissionModel->getPermissions();

       // echo '<pre>';print_r($data);die;
        
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
            'role_name'   => 'required',
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



}
