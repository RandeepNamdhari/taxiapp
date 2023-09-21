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
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


       public function create($data)
   {


        $this->transBegin();

        $userData=['email'=>$data['email'],'phone'=>$data['phone']];

        $user_id=\App\Models\UserModel::createUser($userData);

        $data['user_id']=$user_id;
        $data['state_id']=$data['state'];
        $data['status']=0;



        if($user_id && $this->insert($data)):

        $this->transCommit();

        return array('status'=>1,'message'=>'The customer is created successfully.','type'=>'success','redirect'=>base_url('admin/customers'));

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

        $query=$obj->select('bookings.*,users.username,GROUP_CONCAT(booking_details.to_location SEPARATOR "____") as to_locations,GROUP_CONCAT(booking_details.from_location SEPARATOR "____") as from_locations,vehicles.model as vehicle_name,drivers.first_name as driver_name,vehicles.id as vehicle_id')
        ->join('booking_details','booking_details.booking_id=bookings.id')
        ->join('users', 'users.id = bookings.user_id')
        ->join('vehicles','booking_details.vehicle_id=vehicles.id')
        ->join('drivers','booking_details.driver_id=drivers.id')
        ->like('users.username',$search)
        ->like('drivers.first_name',$search)
        ->like('vehicles.model',$search)
        ->like('booking_details.to_location',$search)
        ->like('booking_details.from_location',$search)
        ->groupBy('booking_details.booking_id')


        ->limit($length, $start)
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
            'recordsTotal' => $obj->countAll(),
            'recordsFiltered' => $obj->countAllResults(),
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
