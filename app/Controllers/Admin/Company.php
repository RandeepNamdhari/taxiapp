<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Company extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\CompanyModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['pageTitle']='Companies';
        $data['currentRoute']='admin-companies';

        return view('admin/company/index',$data);

    }

    public function create()
    {
        $data['currentRoute']='admin-companies';
        $data['pageTitle']='Create Company';

        $data['response']= run_with_exceptions(function(){ 
             
             $data['states']= \App\Models\StateModel::all();

             return array('status'=>1,'data'=>$data);

        });

      

        return view('admin/company/create',$data);
    }

    public function store()
    {
    

      $response=run_with_exceptions(function()
      {

          $data = $this->request->getJSON(true);

          $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'company_name'=>'required|is_unique[companies.company_name]',
                   'abn_number'=>'required|is_unique[companies.abn_number]',
                   'phone'=>'required|is_unique[users.phone]',
                   'email' => 'required|is_unique[users.email]',
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $company=new \App\Models\CompanyModel();
            
            return $company->create($data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }


        public function delete()
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\CompanyModel::destroy($id);

            return array('status'=>1,'message'=>'The Company is deleted successfully!','type'=>'success');

        });
           
        }



        return $this->response->setJSON($response);
       
    }


    public function status($id)
    {

        if ($this->request->getMethod() === 'post') {

            $id=$this->request->getVar('id');

     
             $response=run_with_exceptions(function() use ($id){ 

             \App\Models\CompanyModel::changeStatus($id);

            return array('status'=>1,'message'=>'The Company status is updated successfully!','type'=>'success');

        });

        return $this->response->setJSON($response);

           
        }



       
    }

    public function view(int $id)
    {
        $data['currentRoute']='admin-companies';

        $data['pageTitle']='View Company';

        $data['activeTab']='profile';

        $data['activeContent']='profile';


        $data['response']=run_with_exceptions(function() use ($id){

            $data['company']= \App\Models\CompanyModel::getCompany($id);

            return array('status'=>1,'data'=>$data);
        });

      

        //echo '<pre>';print_r($data['response']['data']['company']->getFile('licence_front'));die;

        return view('admin/company/view',$data);
    }


    public function edit(int $id)
    {
        $data['currentRoute']='admin-companies';
        $data['pageTitle']='Edit Company';

        $data['response']= run_with_exceptions(function() use ($id){ 
             
             $data['company']= \App\Models\CompanyModel::getCompany($id);

             $data['states']=\App\Models\StateModel::all();

             return array('status'=>1,'data'=>$data);

        });

      

        return view('admin/company/edit',$data);
    }


    public function update(int $id)
    {
    

      $response=run_with_exceptions(function() use ($id)
      {

          $data = $this->request->getJSON(true);

          $company=\App\Models\CompanyModel::companyRow($id);

         $rule = [
                   'first_name'   => 'required',
                   'last_name' =>'required',
                   'company_name'=>'required|is_unique[companies.company_name,id,'.$company->id.']',
                   'abn_number'=>'required|is_unique[companies.abn_number,id,'.$company->id.']',
                   'phone'=>'required|is_unique[users.phone,id,'.$id.']',
                   'email' => 'required|is_unique[users.email,id,'.$id.']',
                  ];

        if (! $this->validateData($data, $rule)) {
             return array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $company=new \App\Models\CompanyModel();
            
            return $company->updateCompany($id,$data);
           
        }
         });



        return $this->response->setJSON($response);
       
           }




}
