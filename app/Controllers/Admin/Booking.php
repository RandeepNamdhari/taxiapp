<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Booking extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\BookingModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['pageTitle']='Bookings';
        $data['currentRoute']='admin-bookings';

        return view('admin/booking/index',$data);

    }




        public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\BookingModel::destroy($id);

            return array('status'=>1,'message'=>'The Booking is deleted successfully!','type'=>'success');

        });
           
        }



        return $this->response->setJSON($response);
       
    }


   

}
