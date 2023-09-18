<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CustomerDriver extends BaseController
{
    public function index()
    {
        
    }

      public function view(int $id)
    {
        $data['currentRoute']='admin-customers';

        $data['pageTitle']='View Drivers';

        $data['activeTab']='drivers';

        $data['activeContent']='drivers';


        $data['response']=run_with_exceptions(function() use ($id){

            $data['drivers']= \App\Models\CustomerDriverModel::getCustomerDrivers($id);
             $data['customer']= \App\Models\CustomerModel::getCustomer($id);

            return array('status'=>1,'data'=>$data);
        });


        return view('admin/customer/view',$data);
    }

    public function create(int $id)
    {

                $data['currentRoute']='admin-customers';

        $data['pageTitle']='Add Customer\'s Driver';

        $data['activeTab']='drivers';

        $data['activeContent']='create-driver';

        $data['response']=run_with_exceptions(function() use ($id){

            $data['customer']= \App\Models\CustomerModel::getCustomer($id);

            $data['states']=\App\Models\StateModel::all();
           

            return array('status'=>1,'data'=>$data);
        });

 

        return view('admin/customer/view',$data);

    }

       public function store(int $id=0)
    {
    

      $response=run_with_exceptions(function() use ($id)
      {

          $data = $this->request->getPost();

          

           $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required|is_unique[users.phone]',
                   'email' => 'required|is_unique[users.email]',
                   'driver_picture' => 'uploaded[driver_picture]|is_image[driver_picture]',
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $driver=new \App\Models\DriverModel();
            
            return $driver->create($data,$id);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


        public function delete(int $customer_id,int $driver_id)
    {

        if ($this->request->getMethod() === 'post') {

            $driver_id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($driver_id){ 

             return \App\Models\DriverModel::destroy($driver_id);

            

        });
           
        }



        return $this->response->setJSON($response);
       
    }




     
           public function edit(int $customer_id,int $driver_id)
    {
        $data['currentRoute']='admin-customers';

        $data['pageTitle']='Edit Driver';

        $data['activeTab']='drivers';

        $data['activeContent']='edit-driver';


        $data['response']=run_with_exceptions(function() use ($driver_id,$customer_id){

            $data['driver']= \App\Models\CustomerDriverModel::getCustomerDriver($customer_id,$driver_id);

             $data['customer']= \App\Models\CustomerModel::getCustomer($customer_id);

            $data['states']=\App\Models\StateModel::all();

        

             

            return array('status'=>1,'data'=>$data);
        });

      //  echo '<pre>';print_r($data['response']);die;

        return view('admin/customer/view',$data);
    }


           public function update(int $customer_id,int $driver_id)
    {
    

      $response=run_with_exceptions(function() use ($driver_id,$customer_id)
      {

          $data = $this->request->getPOST();

          $user_id=\App\Models\DriverModel::getDriver($driver_id)->user_id;

          $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required|is_unique[users.phone,id,'.$user_id.']',
                   'email' => 'required|is_unique[users.email,id,'.$user_id.']',
                   'driver_picture' => 'is_image[driver_picture]',
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $driver=new \App\Models\DriverModel();
            
            return $driver->updateDriver($driver_id,$data,$customer_id);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


             public function status(int $customer_id,$vehicle_id)
    {

        if ($this->request->getMethod() === 'post') {

            $vehicle_id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($vehicle_id){ 

             \App\Models\DriverModel::changeStatus($vehicle_id);

            return array('status'=>1,'message'=>'The Driver status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }





}
