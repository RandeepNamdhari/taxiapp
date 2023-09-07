<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Customer extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\CustomerModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['pageTitle']='Customers';
        $data['currentRoute']='admin-customers';

        return view('admin/customer/index',$data);

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

    public function store()
    {
    

      $response=run_with_exceptions(function()
      {

          $data = $this->request->getJSON(true);

          $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required',
                   'email' => 'required|is_unique[users.email]',
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $customer=new \App\Models\CustomerModel();
            
            return $customer->create($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


        public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\CustomerModel::destroy($id);

            return array('status'=>1,'message'=>'The Customer is deleted successfully!','type'=>'success');

        });
           
        }



        return $this->response->setJSON($response);
       
    }
}
