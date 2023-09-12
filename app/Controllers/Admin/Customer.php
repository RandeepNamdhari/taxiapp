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
             
             $data['states']= \App\Models\StateModel::all();

             return array('status'=>1,'data'=>$data);

        });

      

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


    public function status($id)
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\CustomerModel::changeStatus($id);

            return array('status'=>1,'message'=>'The Customer status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }

    public function view(int $id)
    {
        $data['currentRoute']='admin-customers';

        $data['pageTitle']='View Customer';

        $data['response']=run_with_exceptions(function() use ($id){

            $data['customer']= \App\Models\CustomerModel::getCustomer($id);

            return array('status'=>1,'data'=>$data);
        });

      

        //echo '<pre>';print_r($data['response']['data']['customer']->getFile('licence_front'));die;

        return view('admin/customer/view',$data);
    }


    public function edit(int $id)
    {
        $data['currentRoute']='admin-customers';
        $data['pageTitle']='Edit Customer';

        $data['response']= run_with_exceptions(function() use ($id){ 
             
             $data['customer']= \App\Models\CustomerModel::getCustomer($id);

             $data['states']=\App\Models\StateModel::all();

             return array('status'=>1,'data'=>$data);

        });

      

        return view('admin/customer/edit',$data);
    }


    public function update(int $id)
    {
    

      $response=run_with_exceptions(function() use ($id)
      {

          $data = $this->request->getJSON(true);



          $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required',
                   'email' => 'required|is_unique[users.email,id,'.$id.']',
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
            
            return $customer->updateCustomer($id,$data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }

     public function upload(string $type,int $id)
           {
            
               $response=run_with_exceptions(function() use ($type,$id)
      {

          $file = $this->request->getFile($type);

        $validation = service('validation');

       
        $validation->setRules([
            $type => 'uploaded['.$type.']|is_image['.$type.']',
        ]);

        if (!$validation->run([$type => $file])):
             return array('status'=>0,
                             'errors'=>$validation->getErrors(),
                             'message'=>'Invalid file validation Error Occur!',
                             'type'=>'warning');
            
     
        else:
        
            $customer=new \App\Models\CustomerModel();
            
            $customer->UploadLicence($type,$id);

            return array('status'=>1,'message'=>'Licence image uploaded successfully.');
           
        endif;
         });



        return $this->response->setJSON($response);
       
         
           }


}
