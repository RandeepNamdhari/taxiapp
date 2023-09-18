<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class VehicleBodyType extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\VehicleBodyTypeModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['currentRoute']='admin-settings-vehicle-body-type';

        $data['pageTitle']='Vehicle Body Type Settings';

        return view('admin/setting/bodytypes');
    }

      public function status($id)
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\VehicleBodyTypeModel::changeStatus($id);

            return array('status'=>1,'message'=>'The status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }

    public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\VehicleBodyTypeModel::destroy($id);

            return array('status'=>1,'message'=>'The Vehicle body type is deleted successfully!','type'=>'success');

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
                   'name'   => 'required|is_unique[vehicle_body_types.name]',
                  
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $bodyType=new \App\Models\VehicleBodyTypeModel();
            
            return $bodyType->create($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }
}
