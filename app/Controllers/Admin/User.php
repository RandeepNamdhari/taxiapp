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
}
