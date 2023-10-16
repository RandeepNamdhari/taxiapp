<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Chat extends BaseController
{
    public function index()
    {
        //
    }

    public function messages(int $connection_id,$unread_count,$offset)
    {
        $unread_count=(int)$unread_count; 
       
         $response=run_with_exceptions(function() use ($connection_id,$unread_count,$offset)
        {
            return \App\Models\UserConnectionModel::getChat($connection_id,$unread_count,$offset);
        });

         

         return $this->response->setJSON($response);
    }

      public function send()
    {
        $data=$this->request->getPOST();
       // echo '<pre>';print_r($this->request->getPOST());die;

          $response=run_with_exceptions(function() use ($data)
        {
            $request = service('request');

       $file = $request->getFile('upload_file');

       $rule['message']='required';

        if($file):
              $rule['upload_file'] = 'is_image[upload_file]';
              endif;


        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            return \App\Models\UserConnectionModel::saveChat($data);
        }
        });

         return $this->response->setJSON($response);


       // echo '<pre>';print_r($response);die;
    }

    public function searchUser()
    {
        $search=$this->request->getVar('search');

        $response=run_with_exceptions(function() use ($search)
        {
            return \App\Models\UserConnectionModel::searchUser($search);
        });

         return $this->response->setJSON($response);
    }

    public function users()
    {
        

        $response=run_with_exceptions(function()
        {
            return \App\Models\UserConnectionModel::getUsers();
        });

       // echo '<pre>';print_r($response);die;

         return $this->response->setJSON($response);
    }
}
