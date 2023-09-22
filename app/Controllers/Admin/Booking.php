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


      public function create()
    {
        $data['currentRoute']='admin-bookings';
        $data['pageTitle']='Add New Booking';

        $data['response']= run_with_exceptions(function(){ 
             
             $data['states']= \App\Models\StateModel::all();

             return array('status'=>1,'data'=>$data);

        });

      

        return view('admin/booking/create',$data);
    }


        public function store()
    {
    

      $response=run_with_exceptions(function()
      {

          $data = $this->request->getJSON(true);

          $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required|is_unique[users.phone,id,'.$data['user_id'].']',
                   'email' => 'required|is_unique[users.email,id,'.$data['user_id'].']',
                   'pickup_time'=>'required',
                   'vehicle'=>'required',
                   'driver'=>'required',
                   'from_location'=>'required',
                   'to_location'=>'required'
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $booking=new \App\Models\BookingModel();
            
            return $booking->create($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


   

}