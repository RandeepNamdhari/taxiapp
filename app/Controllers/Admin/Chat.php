<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Chat extends BaseController
{
       public function index()
    {

        

        $data['currentRoute']='admin-chats';

        $data['pageTitle']='Chat Messages';

        return view('admin/chat/index');
    }

    public function send()
    {
        $data=$this->request->getPOST();
        echo '<pre>';print_r($this->request->getPOST());die;


       // echo '<pre>';print_r($this->request->getFiles());die;
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
}
