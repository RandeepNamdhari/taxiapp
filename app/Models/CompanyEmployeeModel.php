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

          $response= $companyObj->select('employees.*,users.email,users.phone')->join('users','users.id=drivers.user_id')->join('customer_drivers','drivers.id=company_employees.employee_id')->where('company_employees.company_id',$company_id)->where('company_employees.employee_id',$employee_id)->first();
          
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
   

    
}

