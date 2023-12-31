<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $data['currentRoute']='admin-dashboard';
        $data['pageTitle']='Admin Dashboard';
        
        return view('admin/dashboard',$data);
    }
}
