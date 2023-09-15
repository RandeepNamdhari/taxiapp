<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Media extends BaseController
{
    public function index()
    {
        //
    }

    public function delete(int $file_id)
    {
         if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\MediaFileModel::destroy($id);

            return array('status'=>1,'message'=>'The file is deleted successfully!','type'=>'success');

        });
           
        }



        return $this->response->setJSON($response);

    }

       public function status(int $file_id)
    {
         if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\MediaFileModel::changeStatus($id);

            return array('status'=>1,'message'=>'The file status is changed successfully!','type'=>'success');

        });
           
        }



        return $this->response->setJSON($response);

    }


}
