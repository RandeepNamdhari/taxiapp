<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Auth\AuthModel;

class Auth extends BaseController
{
    public function index(): string
    {
       
        $data['pageTitle']='Admin Login';
        
        return view('auth/login',$data);
    }

    /**
    * Function for login 
    * @method POST
    * @param Email,Password
    */

    public function login()
    {

        if ($this->request->getMethod() === 'post') {

          $data = [
            'password'   => $this->request->getVar('password'),
            'username' => $this->request->getVar('username'),
            'remember' => $this->request->getVar('remember'),
        ];

        $rule = [
            'password'   => 'required',
            'username' => 'required',
        ];

        if (! $this->validateData($data, $rule)) {
             $response=array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!');
            
        }
        else
        {
            $auth=new AuthModel();
            $response=$auth->login($data);
           
        }



        return $this->response->setJSON($response);

    }




        // $input=$this->input->post();

        // echo '<pre>';print_r($input);die;

    }
}
