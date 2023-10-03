<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Chat extends BaseController
{
       public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\StateModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['currentRoute']='admin-chats';

        $data['pageTitle']='Chat Messages';

        return view('admin/chat/index');
    }
}
