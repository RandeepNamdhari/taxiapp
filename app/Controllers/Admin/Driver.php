<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Driver extends BaseController
{
    public function index()
    {
        //
    }



           public function list()
           {


              $response=run_with_exceptions(function()
      {

          $data = $this->request->getJSON(true);

          $search=$data['search'];

          $content='';

         if($search):
            $driver=new \App\Models\DriverModel();
            
            $content= $driver->list($search);
           
          endif;

            return array('status'=>1,'content'=>$content);

         });



        return $this->response->setJSON($response);

           }
}
