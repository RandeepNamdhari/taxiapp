<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class State extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\StateModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['currentRoute']='admin-settings-states';

        $data['pageTitle']='State Settings';

        return view('admin/setting/states');
    }

      public function status($id)
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\StateModel::changeStatus($id);

            return array('status'=>1,'message'=>'The State status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }

    public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\StateModel::destroy($id);

            return array('status'=>1,'message'=>'The State is deleted successfully!','type'=>'success');

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
                   'name'   => 'required|is_unique[states.code]',
                  
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $state=new \App\Models\StateModel();
            
            return $state->create($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }
}
