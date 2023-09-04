<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
       
        $data['pageTitle']='Home';

        
        return view('user/home',$data);
    }

   
}
