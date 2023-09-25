<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TaxType extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\TaxTypeModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['currentRoute']='admin-settings-taxes';

        $data['pageTitle']='Tax Settings';

        return view('admin/setting/taxtypes');
    }

      public function status($id)
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\TaxTypeModel::changeStatus($id);

            return array('status'=>1,'message'=>'The tax status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }

    public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\TaxTypeModel::destroy($id);

            return array('status'=>1,'message'=>'The tax type is deleted successfully!','type'=>'success');

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
                   'name'   => 'required|is_unique[tax_types.name]',
                   'percent'=>'required',
                  
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $tax=new \App\Models\TaxTypeModel();
            
            return $tax->create($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }
}
