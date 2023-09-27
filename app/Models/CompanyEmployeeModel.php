<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;


class CompanyEmployeeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'company_employees';
    protected $primaryKey       = 'employee_id';
    protected $useAutoIncrement = true;
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['company_id','employee_id'];

 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

     public static function employeeCount(int $company_id)
    {
        $obj=new self();

        return $obj->where('company_id',$company_id)->countAll();
    }


     public static function getCompanyEmployee(int $company_id,int $employee_id)
    {
          $companyObj=new \App\Models\EmployeeModel();

          $response= $companyObj->select('employees.*,users.email,users.phone,users.first_name,users.last_name,users.middle_name')->join('users','users.id=employees.user_id')->join('company_employees','employees.id=company_employees.employee_id')->where('company_employees.company_id',$company_id)->where('company_employees.employee_id',$employee_id)->first();
          
            return $response?$response: throw new DatabaseException('Unable to find the record.');
    }
   

    public static function attach(int $employee_id,int $company_id)
    {
        $obj=new self();

       return $obj->insert(['employee_id'=>$employee_id,'company_id'=>$company_id]);


    }


     public static function getCompanyEmployees(int $company_id)
    {
        
            $employeeObj=new \App\Models\EmployeeModel();

            return $employeeObj->select('employees.*,users.email,users.phone,users.first_name,users.last_name')->join('users','users.id=employees.user_id')->join('company_employees','employees.id=company_employees.employee_id')->where('company_employees.company_id',$company_id)->findAll();

                      
    }


      public static function datatable(int $company_id)
    {
        $request = service('request');
        $draw = $request->getVar('draw');
        $start = $request->getVar('start');
        $length = $request->getVar('length');
        $search=$request->getVar('search[value]');

         $obj=new \App\Models\EmployeeModel();

         $cEmployeeObj=new self();

          $query=$obj->builder();

            $query->select('employees.limit,employees.status,employees.created_at,employees.id as employee_id,users.email,users.phone,users.first_name,users.last_name,users.id as id,company_employees.company_id as company_id')->join('users','users.id=employees.user_id')->join('company_employees','employees.id=company_employees.employee_id')->where('company_employees.company_id',$company_id)->like('users.first_name',$search);

            $query1= clone $query;

            $countAll=$query1->countAll();
            $filterResult=$query1->countAllResults();




        $query=$query->limit($length, $start)
            ->get();

           $rows= $query->getResultArray();

           foreach($rows as $index => $row):

            $row['serial_no']=$index+1;
            $row['actions']=$cEmployeeObj->actions($row);
            $row['created_at']=date('d M Y',strtotime($row['created_at']));
            $row['status']=$cEmployeeObj->getStatus($row);

                $rows[$index]=$row;

           endforeach;

        $data = [
            'draw' => $draw,
            'recordsTotal' => $countAll,
            'recordsFiltered' => $filterResult,
            'data' => $rows,
        ];

        return $data;
    }

    public function actions($row)
    {
      return '<div class="btn-group"><button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions<i class="mdi mdi-chevron-down"></i></button><div class="dropdown-menu" style=""><a class="dropdown-item" href="'.base_url('admin/companies/'.$row['company_id'].'/employees/'.$row['employee_id'].'/edit').'"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Edit</a><a class="dropdown-item" href="javascript:void(0)" onclick="deleteEmployee('.$row['id'].')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</a></div></div>';

      // <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
    }

    public function getStatus($row)
    {
        if($row['status']):

            return '<input class="form-check form-switch" onchange="changeStatus('.$row['employee_id'].')" type="checkbox" id="switch'.$row['employee_id'].'" switch="bool" checked=""><label class="form-label  full-switch" for="switch'.$row['employee_id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            else:

                 return '<input class="form-check form-switch" onchange="changeStatus('.$row['employee_id'].')" type="checkbox" id="switch'.$row['employee_id'].'" switch="bool"><label class="form-label full-switch" for="switch'.$row['employee_id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            endif;

    }


     public function list(string $search,int $company_id)
    {
        $result=$this->select('users.*,employees.id as id')->join('employees','company_employees.employee_id=employees.id')
        ->join('users','users.id=employees.user_id')
        ->where('company_id',$company_id)->where('employees.status',1)
                     ->groupStart()
                     ->like('users.first_name',$search)
                     ->orLike('users.last_name',$search)
                     ->orLike('users.email',$search)
                     ->orLike('users.phone',$search)
                     
                     ->groupEnd()

                     ->findAll();

        $content='';

       

            $content.=view('admin/partials/employees',['employees'=>$result]);

   

        return $content;
    }
   

    
}

