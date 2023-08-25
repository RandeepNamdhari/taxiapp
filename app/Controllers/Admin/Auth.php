<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index(): string
    {
       
        $data['pageTitle']='Admin Login';
        
        return view('auth/login',$data);
    }
}
