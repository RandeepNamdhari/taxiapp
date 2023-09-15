<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CustomerVehicle extends BaseController
{
    public function index()
    {
        
    }

      public function view(int $id)
    {
        $data['currentRoute']='admin-customers';

        $data['pageTitle']='View Customer';

        $data['activeTab']='vehicles';

        $data['activeContent']='vehicles';


        $data['response']=run_with_exceptions(function() use ($id){

            $data['vehicles']= \App\Models\CustomerVehicleModel::getCustomerVehicles($id);
             $data['customer']= \App\Models\CustomerModel::getCustomer($id);

            return array('status'=>1,'data'=>$data);
        });


        return view('admin/customer/view',$data);
    }

    public function create(int $id)
    {

                $data['currentRoute']='admin-customers';

        $data['pageTitle']='Add Customer\'s Vehicle';

        $data['activeTab']='vehicles';

        $data['activeContent']='create-vehicle';

        $data['response']=run_with_exceptions(function() use ($id){

            $data['customer']= \App\Models\CustomerModel::getCustomer($id);

            $data['states']=\App\Models\StateModel::all();
            $data['body_types']=\App\Models\VehicleBodyTypeModel::all();



            return array('status'=>1,'data'=>$data);
        });

 

        return view('admin/customer/view',$data);

    }

       public function store(int $id=0)
    {
    

      $response=run_with_exceptions(function() use ($id)
      {

          $data = $this->request->getJSON(true);

          $rule = [
                   'regd_no'   => 'required',
                   'make' =>'required',
                   'model'=>'required|is_unique[vehicles.model]',
                   'year'=>'required',
                   'body_type'=>'required',
                   'color'=>'required',
                   'state'=>'required',
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $vehicle=new \App\Models\VehicleModel();
            
            return $vehicle->create($data,$id);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


        public function delete(int $customer_id,int $vehicle_id)
    {

        if ($this->request->getMethod() === 'post') {

            $vehicle_id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($vehicle_id){ 

             return \App\Models\VehicleModel::destroy($vehicle_id);

            

        });
           
        }



        return $this->response->setJSON($response);
       
    }


        public function gallery(int $id,int $vehicle_id)
    {

                $data['currentRoute']='admin-customers';

        $data['pageTitle']='Customer\'s Vehicle Gallery';

        $data['activeTab']='vehicles';

        $data['activeContent']='vehicle-gallery';

        $data['vehicle_id']=$vehicle_id;



        $data['response']=run_with_exceptions(function() use ($id,$vehicle_id){

            $data['customer']= \App\Models\CustomerModel::getCustomer($id);

            $data['vehicle']=\App\Models\VehicleModel::gallery($vehicle_id);


            return array('status'=>1,'data'=>$data);
        });

        return view('admin/customer/view',$data);

    }


     public function upload(int $id,int $vehicle_id)
           {
            
               $response=run_with_exceptions(function() use ($id,$vehicle_id)
      {

          $file = $this->request->getFile('vehicle_image');

        $validation = service('validation');

       
        $validation->setRules([
            'vehicle_image' => 'uploaded[vehicle_image]|is_image[vehicle_image]',
        ]);

        if (!$validation->run(['vehicle_image' => $file])):
             return array('status'=>0,
                             'errors'=>$validation->getErrors(),
                             'message'=>'Invalid file validation Error Occur!',
                             'type'=>'warning');
            
     
        else:
        
            $vehicle=new \App\Models\VehicleModel();
            
            $vehicle->UploadVehicleImage($id,$vehicle_id);

            return array('status'=>1,'message'=>'Vehicle gallery is updated successfully.');
           
        endif;
         });



        return $this->response->setJSON($response);
       
         
           }


           public function edit(int $customer_id,int $vehicle_id)
    {
        $data['currentRoute']='admin-customers';

        $data['pageTitle']='Edit Vehicle';

        $data['activeTab']='vehicles';

        $data['activeContent']='edit-vehicle';


        $data['response']=run_with_exceptions(function() use ($vehicle_id,$customer_id){

            $data['vehicle']= \App\Models\CustomerVehicleModel::getCustomerVehicle($customer_id,$vehicle_id);
             $data['customer']= \App\Models\CustomerModel::getCustomer($customer_id);

            $data['states']=\App\Models\StateModel::all();

            $data['body_types']=\App\Models\VehicleBodyTypeModel::all();

             

            return array('status'=>1,'data'=>$data);
        });

        return view('admin/customer/view',$data);
    }


           public function update(int $customer_id,int $vehicle_id)
    {
    

      $response=run_with_exceptions(function() use ($vehicle_id,$customer_id)
      {

          $data = $this->request->getJSON(true);

          $rule = [
                   'regd_no'   => 'required',
                   'make' =>'required',
                   'model'=>'required|is_unique[vehicles.model,id,'.$vehicle_id.']',
                   'year'=>'required',
                   'body_type'=>'required',
                   'color'=>'required',
                   'state'=>'required',
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $vehicle=new \App\Models\VehicleModel();
            
            return $vehicle->updateVehicle($data,$vehicle_id,$customer_id);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


             public function status(int $customer_id,$vehicle_id)
    {

        if ($this->request->getMethod() === 'post') {

            $vehicle_id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($vehicle_id){ 

             \App\Models\VehicleModel::changeStatus($vehicle_id);

            return array('status'=>1,'message'=>'The Vehicle status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }





}
