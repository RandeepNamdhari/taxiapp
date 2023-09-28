<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Service extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\ServiceModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['currentRoute']='admin-services';

        $data['pageTitle']='Services';

        return view('admin/service/index',$data);
    }


    public function create()
    {


        $data['currentRoute']='admin-services';

        $data['pageTitle']='Create New Servie';

        return view('admin/service/create',$data);
    }


    public function edit(int $id)
    {


        $data['currentRoute']='admin-services';

        $data['pageTitle']='Edit Service';

         $data['response']= run_with_exceptions(function() use ($id){ 
             
             $data['service']= \App\Models\ServiceModel::getService($id);

             return array('status'=>1,'data'=>$data);

        });

        return view('admin/service/edit',$data);
    }

      public function status(int $id)
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\ServiceModel::changeStatus($id);

            return array('status'=>1,'message'=>'The service status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }

    public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\ServiceModel::destroy($id);

            return array('status'=>1,'message'=>'The service is deleted successfully!','type'=>'success');

        });
           
        }



        return $this->response->setJSON($response);
       
    }


       public function store()
    {
    

      $response=run_with_exceptions(function()
      {

          $data = $this->request->getJSON(true);



          $rule = [
                   'name'   => 'required|is_unique[services.name]',
               
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $service=new \App\Models\ServiceModel();
            
            return $service->createOrUpdate($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }

                  public function update(int $id)
    {
    

      $response=run_with_exceptions(function() use ($id)
      {

          $data = $this->request->getJSON(true);



          $rule = [
                   'name'   => 'required|is_unique[services.name,id,'.$id.']',
                   
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $service=new \App\Models\ServiceModel();
            
            return $service->createOrUpdate($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }
}
