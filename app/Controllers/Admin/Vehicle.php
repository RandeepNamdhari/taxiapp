<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Vehicle extends BaseController
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

            $data['vehicles']= \App\Models\VehicleModel::getCustomerVehicles($id);
             $data['customer']= \App\Models\CustomerModel::getCustomer($id);

            return array('status'=>1,'data'=>$data);
        });

      

        //echo '<pre>';print_r($data['response']['data']['customer']->getFile('licence_front'));die;

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


            return array('status'=>1,'data'=>$data);
        });

      

        //echo '<pre>';print_r($data['response']['data']['customer']->getFile('licence_front'));die;

        return view('admin/customer/view',$data);

    }

       public function store(int $id)
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


        public function gallery(int $id,int $vehicle_id)
    {

                $data['currentRoute']='admin-customers';

        $data['pageTitle']='Customer\'s Vehicle Gallery';

        $data['activeTab']='vehicles';

        $data['activeContent']='vehicle-gallery';

        $data['vehicle_id']=$vehicle_id;



        $data['response']=run_with_exceptions(function() use ($id){

            $data['customer']= \App\Models\CustomerModel::getCustomer($id);

            $data['vehicle']=\App\Models\VehicleModel::gallery($id);


            return array('status'=>1,'data'=>$data);
        });

      

      //  echo '<pre>';print_r($data['response']);die;

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

}
