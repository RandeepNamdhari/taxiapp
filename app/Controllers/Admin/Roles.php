<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

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
        
        return view('admin/roles/create',$data);
    }



}
