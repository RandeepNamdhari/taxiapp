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

    public function view(int $booking_id)
    {
        $data['currentRoute']='admin-bookings';
        $data['pageTitle']='View Booking';

        $data['response']= run_with_exceptions(function() use($booking_id){ 
             
             $data['booking']=\App\Models\BookingModel::getBooking($booking_id);


             return array('status'=>1,'data'=>$data);

        });      

        return view('admin/booking/view',$data);
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
             
             $data['taxes']= \App\Models\TaxTypeModel::all();

             $data['fare_types']=\App\Models\FareTypeModel::all();

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
                   
                   'pickup_time'=>'required',
                   'vehicle'=>'required',
                   'driver'=>'required',
                   'from_location'=>'required',
                   'to_location'=>'required',
                   'fares_type'=>'required',

                  ];

        if($data['customer_type']==2):
            $rule+=['company'=>'required','employee'=>'required'];

        else:

            $rule+=['first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required|is_unique[users.phone,id,'.$data['user_id'].']',
                   'email' => 'required|is_unique[users.email,id,'.$data['user_id'].']',];

        endif;

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


        //echo '<pre>';print_r($response);die;
        return $this->response->setJSON($response);
       
           }


           public function edit(int $booking_id)
    {
        $data['currentRoute']='admin-bookings';
        $data['pageTitle']='Edit Booking';

        $data['response']= run_with_exceptions(function() use($booking_id){ 
             
             $data['taxes']= \App\Models\TaxTypeModel::all();

             $data['booking']=\App\Models\BookingModel::getBooking($booking_id);

             $data['fare_types']=\App\Models\FareTypeModel::all();


             return array('status'=>1,'data'=>$data);

        });

      //  echo '<pre>';print_r($data);die;

      

        return view('admin/booking/edit',$data);
    }



        public function update(int $id)
    {
    



      $response=run_with_exceptions(function() use ($id)
      {

          $data = $this->request->getJSON(true);



          $rule = [
                   
                   'pickup_time'=>'required',
                   'vehicle'=>'required',
                   'driver'=>'required',
                   'from_location'=>'required',
                   'to_location'=>'required',
                   'fares_type'=>'required',

                  ];

        if($data['customer_type']==2):
            $rule+=['company'=>'required','employee'=>'required'];

        else:

            $rule+=['first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required|is_unique[users.phone,id,'.$data['user_id'].']',
                   'email' => 'required|is_unique[users.email,id,'.$data['user_id'].']',];

        endif;

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $booking=new \App\Models\BookingModel();
            
            return $booking->updateBooking($data,$id);
           
        }
         });


        //echo '<pre>';print_r($response);die;
        return $this->response->setJSON($response);
       
           }


   

}
