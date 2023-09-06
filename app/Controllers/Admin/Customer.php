<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Customer extends BaseController
{
    public function index()
    {
        //
    }

    public function create()
    {
        $data['currentRoute']='admin-customers';
        $data['pageTitle']='Customer Create';

        $data['response']= run_with_exceptions(function(){ 
             
             return true;

        });

       // echo '<pre>';print_r($data);die;

        return view('admin/customer/create',$data);
    }
}
