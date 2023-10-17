<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CommissionType extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\CommissionTypeModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['currentRoute']='admin-settings-commission-types';

        $data['pageTitle']='Commission Type Settings';

        return view('admin/setting/commissiontypes/index',$data);
    }


    public function create()
    {


        $data['currentRoute']='admin-settings-commission-types';

        $data['pageTitle']='Create Commission Type Settings';

        return view('admin/setting/commissiontypes/create',$data);
    }


    public function edit(int $id)
    {


        $data['currentRoute']='admin-settings-commission-types';

        $data['pageTitle']='Edit Commission Type Settings';

         $data['response']= run_with_exceptions(function() use ($id){ 
             
             $data['commission_type']= \App\Models\CommissionTypeModel::getType($id);

             return array('status'=>1,'data'=>$data);

        });

        return view('admin/setting/commissiontypes/edit',$data);
    }

      public function status(int $id)
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\CommissionTypeModel::changeStatus($id);

            return array('status'=>1,'message'=>'The commission type status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }

    public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\CommissionTypeModel::destroy($id);

            return array('status'=>1,'message'=>'The commission type is deleted successfully!','type'=>'success');

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
                   'name'   => 'required|is_unique[commission_types.name]',
                   'type'=>'required',
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
            $fare_type=new \App\Models\CommissionTypeModel();
            
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
                   'name'   => 'required|is_unique[commission_types.name,id,'.$id.']',
                   'type'=>'required',
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
            $commission_type=new \App\Models\CommissionTypeModel();
            
            return $commission_type->createOrUpdate($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }
}
