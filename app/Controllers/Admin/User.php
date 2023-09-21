<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function search()
    {
        $response=run_with_exceptions(function()
        {
            return \App\Models\UserModel::search();
        });

         return $this->response->setJSON($response);
    }

    public function check()
    {

        $response=run_with_exceptions(function()
        {
            $search=$this->request->getJSON(true)['search']??'';

            $user= \App\Models\UserModel::checkExisitngUser($search);

            return array('status'=>1,'user'=>$user);
        });

         return $this->response->setJSON($response);

    }
}
