<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bookings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','status','booking_date','customer_type','fares_type','tax_type_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

public static function getBooking(int $booking_id)
{
    $obj=new self();

    $booking=$obj->select('bookings.*,users.email,users.first_name,users.last_name,users.phone,users.address,users.id as main_user_id,companies.abn_number,companies.acn_number,companies.company_name,companies.id as company_id,company_bookings.employee_id')->join('users','users.id=bookings.user_id')->join('company_bookings','bookings.id=company_bookings.booking_id','left')->join('companies','companies.id=company_bookings.company_id','left')
    ->find($booking_id);

    $booking['booking_details']=\App\Models\BookingDetailModel::getDetails($booking_id);


    return $booking;
}


   public function updateIfUserExist(array $data)
   {
      $userObj=new \App\Models\UserModel;
       $user= $userObj->where('email',$data['email'])
                   ->orWhere('phone',$data['phone'])->first();

                   if($user)
                   {
                      $userObj->update($user['id'],$data);
                   }

            return $user;
   }
       public function create($data)   
   {


        $this->transBegin();

        if($data['customer_type']!=2):

        $userData=['email'=>$data['email'],'phone'=>$data['phone'],'first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'address'=>$data['address']];

        if(!$user=$this->updateIfUserExist($userData)):

        $user_id=\App\Models\UserModel::createUser($userData);

        $data['user_id']=$user_id;

        else:

        $data['user_id']=$user['id'];


         endif;


         else:

            \App\Models\CompanyBookingModel::attach($data['employee'],$data['company']);

           $employee= \App\Models\EmployeeModel::getEmployee($data['employee']);

            $data['user_id']=$employee->user_id;


       endif;



         $booking=array('status'=>'pending','user_id'=>$data['user_id'],
                       'customer_type'=>$data['customer_type'],'fares_type'=>$data['fares_type'],'tax_type_id'=>$data['tax'],'booking_date'=>date('Y-m-d-His_'));

         $booking_id=$this->insert($booking);

         $bookingDetail=\App\Models\BookingDetailModel::createOrUpdate($data,$booking_id);

        if($booking && $data['user_id'] && $bookingDetail):

        

        $this->transCommit();

        return array('status'=>1,'message'=>'The booking is created successfully.','type'=>'success','redirect'=>base_url('admin/bookings'));

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to insert the record.Please try again later.');

        endif;

   }
   

       public static function datatable()
    {
        $request = service('request');
        $draw = $request->getVar('draw');
        $start = $request->getVar('start');
        $length = $request->getVar('length');
        $search=$request->getVar('search[value]');

        $obj=new self();

        $query=$obj->builder();


        $query->select('bookings.*,users.username,GROUP_CONCAT(booking_details.to_location SEPARATOR "____") as to_locations,GROUP_CONCAT(booking_details.from_location SEPARATOR "____") as from_locations,vehicles.model as vehicle_name,drivers.first_name as driver_name,vehicles.id as vehicle_id')
        ->join('booking_details','booking_details.booking_id=bookings.id')
        ->join('users', 'users.id = bookings.user_id')
        ->join('vehicles','booking_details.vehicle_id=vehicles.id')
        ->join('drivers','booking_details.driver_id=drivers.id')
        ->like('users.username',$search)
        ->like('drivers.first_name',$search)
        ->like('vehicles.model',$search)
        ->like('booking_details.to_location',$search)
        ->like('booking_details.from_location',$search)
        ->groupBy('booking_details.booking_id');



       $query1= clone $query;


        $query=$query->limit($length, $start)
            ->get();

           $rows= $query->getResultArray();

           foreach($rows as $index => $row):

            $row['serial_no']=$index+1;
            $row['actions']=$obj->actions($row);
            $row['booking_date']=date('d M Y',strtotime($row['booking_date']));
            $row['status']=$obj->getStatus($row);
            $row['vehicle_name']=$obj->getVehicleWithImg($row['vehicle_id'])??$row['vehicle_name'];
            $row['locations']='<b>From:</b>'.$row['from_locations'].' <br><b>To:</b> '.$row['to_locations'];

                $rows[$index]=$row;

           endforeach;

        $data = [
            'draw' => $draw,
            'recordsTotal' => $query1->countAll(),
            'recordsFiltered' => $query1->countAllResults(),
            'data' => $rows,
        ];

        return $data;
    }

    public function getVehicleWithImg($vehicle_id)
    {
        $file=\App\Models\MediaModel::getFirstOrDefaultMedia('Vehicle',$vehicle_id);

     
        if(isset($file['file_thumb_path'])):

            return '<img src="'.base_url($file['file_thumb_path']).'" class="w-100">';
        else:
             return false;

         endif;
    }

    public function actions($row)
    {
      return '<div class="btn-group"><button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions<i class="mdi mdi-chevron-down"></i></button><div class="dropdown-menu" style=""><a class="dropdown-item" href="'.base_url('admin/bookings/'.$row['id'].'/view').'"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;View</a><a class="dropdown-item" href="'.base_url('admin/bookings/'.$row['id'].'/edit').'"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Edit</a><a class="dropdown-item" href="javascript:void(0)" onclick="deleteBooking('.$row['id'].')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</a></div></div>';

    }

    public function getStatus($row)
    {
        if($row['status']=='pending'):

            return '<span class="text-warning">Pending</span>';

        elseif ($row['status']=='confirmed'):

              return '<span class="text-success">Confirmed</span>';


            else:

                 return '<span class="text-danger">Cancelled</span>';


            endif;

    }

    public static function destroy(int $id)
    {
        $obj=new self();

        return $obj->delete($id);
    }

    


   
}
