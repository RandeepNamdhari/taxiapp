<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class EmployeeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\EmployeeEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    =['status','user_id','limit'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
 


   public function create(array $data,int $company_id=0)
   {


        $this->transBegin();

        $userData=['email'=>$data['email'],'phone'=>$data['phone'],'first_name'=>$data['first_name'],'last_name'=>$data['last_name']];

        $user_id=\App\Models\UserModel::createUser($userData);

        \App\Models\UserRoleModel::attachRole('employee',$user_id);


        $data['user_id']=$user_id;
       
        $data['status']=0;



        $employee_id=$this->insert($data);


        $redirect_url='';


        if($employee_id && $company_id):

            \App\Models\CompanyEmployeeModel::attach($employee_id,$company_id);

            $redirect_url=base_url('admin/companies/'.$company_id.'/employees/view');

        endif;



        if($user_id && $employee_id):



        $this->transCommit();

        return array('status'=>1,'message'=>'The employee is created successfully.','type'=>'success','redirect'=>$redirect_url);

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to insert the record.Please try again later.');

        endif;

   }

      public function updateEmployee(int $employee_id,array $data,int $company_id=0)
   {


        $this->transBegin();

        $employee=$this->where('id',$employee_id)->first();

        $employee===null ? throw new DatabaseException('Record not found.'):$employee;



        $userData=['email'=>$data['email'],'phone'=>$data['phone'],'first_name'=>$data['first_name'],'last_name'=>$data['last_name']];

        $user_id=\App\Models\UserModel::updateUser($employee->user_id,$userData);

        unset($data['user_id']);
        unset($data['status']);

        if($this->update($employee->id,$data)):


        $redirect_url='';

        if($company_id):
            $redirect_url=base_url('admin/companies/'.$company_id.'/employees/view');
        endif;

        $this->transCommit();

        return array('status'=>1,'message'=>'The employee is updated successfully.','type'=>'success','redirect'=>$redirect_url);

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to update the record.Please try again later.');

        endif;

   }

    public static function changeStatus(int $id)
    {
        $obj=new self();

        $employee= $obj->find($id);

        

        $employee->status=!$employee->status;

        return $obj->save($employee);
    }


         public static function destroy(int $id)
    {
        $userObj=new \App\Models\UserModel();


       

       if($userObj->delete($id)):


    return array('status'=>1,'message'=>'The Employee is deleted successfully!','type'=>'success');

     else:

       return array('status'=>0,'message'=>'Something went wrong! Please try again later.','type'=>'success');



   endif;

    }

    public static function getEmployee(int $employee)
    {
        $obj=new self();

        return $obj->find($employee);
    }

       public function list(string $search)
    {
        $result=$this->select('employees.*,users.email,users.phone,users.first_name,users.last_name')
                     ->join('users','users.id=employees.user_id')
                     ->where('users.status',1)
                     ->groupStart()
                     ->like('users.first_name',$search)
                     ->orLike('users.last_name',$search)
                     ->orLike('users.phone',$search)
                     ->orLike('users.email',$search)
                     ->groupEnd()
                     ->findAll();

        $content='';

       

            $content.=view('admin/partials/employees',['employees'=>$result]);

   

        return $content;
    }

     

    
}
