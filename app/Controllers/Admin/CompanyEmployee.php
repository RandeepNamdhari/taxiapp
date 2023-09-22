<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CompanyEmployee extends BaseController
{
    public function index()
    {
        
    }

      public function view(int $id)
    {
        $data['currentRoute']='admin-companies';

        $data['pageTitle']='View Employees';

        $data['activeTab']='employees';

        $data['activeContent']='employees';


        $data['response']=run_with_exceptions(function() use ($id){

            $data['employees']= \App\Models\CompanyEmployeeModel::getCompanyEmployees($id);
             $data['company']= \App\Models\CompanyModel::getCompany($id);

            return array('status'=>1,'data'=>$data);
        });


        return view('admin/company/view',$data);
    }

    public function create(int $id)
    {

                $data['currentRoute']='admin-companies';

        $data['pageTitle']='Add Companies\'s Employee';

        $data['activeTab']='employees';

        $data['activeContent']='create-employee';

        $data['response']=run_with_exceptions(function() use ($id){

            $data['company']= \App\Models\CompanyModel::getCompany($id);

              

            return array('status'=>1,'data'=>$data);
        });

 

        return view('admin/company/view',$data);

    }

       public function store(int $id=0)
    {
    

      $response=run_with_exceptions(function() use ($id)
      {

          $data = $this->request->getPost();

          

           $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required|is_unique[users.phone]',
                   'email' => 'required|is_unique[users.email]',
                   'limit'=>'required'
                   
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $employee=new \App\Models\EmployeeModel();
            
            return $employee->create($data,$id);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


        public function delete(int $company_id,int $employee_id)
    {

        if ($this->request->getMethod() === 'post') {

            $employee_id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($employee_id){ 

             return \App\Models\EmployeeModel::destroy($employee_id);

            

        });
           
        }



        return $this->response->setJSON($response);
       
    }




     
           public function edit(int $company_id,int $employee_id)
    {
        $data['currentRoute']='admin-companies';

        $data['pageTitle']='Edit Employee';

        $data['activeTab']='employees';

        $data['activeContent']='edit-employee';


        $data['response']=run_with_exceptions(function() use ($employee_id,$company_id){

            $data['employee']= \App\Models\CompanyEmployeeModel::getCompanyEmployee($company_id,$employee_id);

             $data['customer']= \App\Models\CompanyModel::getCompany($company_id);

               

             

            return array('status'=>1,'data'=>$data);
        });

      //  echo '<pre>';print_r($data['response']);die;

        return view('admin/customer/view',$data);
    }


           public function update(int $company_id,int $employee_id)
    {
    

      $response=run_with_exceptions(function() use ($employee_id,$company_id)
      {

          $data = $this->request->getPOST();

          $user_id=\App\Models\EmployeeModel::getEmployee($employee_id)->user_id;

          $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'phone'=>'required|is_unique[users.phone,id,'.$user_id.']',
                   'email' => 'required|is_unique[users.email,id,'.$user_id.']',
                   'limt'=>'required'
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $employee=new \App\Models\EmployeeModel();
            
            return $employee->updateEmployee($employee_id,$data,$company_id);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


             public function status(int $company_id,$employee_id)
    {

        if ($this->request->getMethod() === 'post') {

            $employee_id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($employee_id){ 

             \App\Models\EmployeeModel::changeStatus($employee_id);

            return array('status'=>1,'message'=>'The Employee status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }





}
