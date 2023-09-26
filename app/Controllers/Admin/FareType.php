<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class FareType extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\FareTypeModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['currentRoute']='admin-settings-fare-types';

        $data['pageTitle']='Fare Type Settings';

        return view('admin/setting/faretypes/index',$data);
    }


    public function create()
    {


        $data['currentRoute']='admin-settings-fare-types';

        $data['pageTitle']='Create Fare Type Settings';

        return view('admin/setting/faretypes/create',$data);
    }


    public function edit(int $id)
    {


        $data['currentRoute']='admin-settings-fare-types';

        $data['pageTitle']='Edit Fare Type Settings';

         $data['response']= run_with_exceptions(function() use ($id){ 
             
             $data['fare_type']= \App\Models\FareTypeModel::getType($id);

             return array('status'=>1,'data'=>$data);

        });

        return view('admin/setting/faretypes/edit',$data);
    }

      public function status(int $id)
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\FareTypeModel::changeStatus($id);

            return array('status'=>1,'message'=>'The fare type status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }

    public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\FareTypeModel::destroy($id);

            return array('status'=>1,'message'=>'The fare type is deleted successfully!','type'=>'success');

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
                   'name'   => 'required|is_unique[fare_types.name]',
                   'range'=>'required',
                   'amount'=>'required'
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $fare_type=new \App\Models\FareTypeModel();
            
            return $fare_type->createOrUpdate($data);
           
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
                   'name'   => 'required|is_unique[fare_types.name,id,'.$id.']',
                   'range'=>'required',
                   'amount'=>'required'
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $fare_type=new \App\Models\FareTypeModel();
            
            return $fare_type->createOrUpdate($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }
}
