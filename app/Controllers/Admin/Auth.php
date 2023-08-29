<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Auth\AuthModel;

class Auth extends BaseController
{
    public function index()
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

    }

    public function logout()
    {
         $session = session();

     
         $session->destroy();

        return redirect()->to('/admin/login');
    }



    public function forgot_password()
    {
        $data['pageTitle']='Forgot Password';

        return view('auth/forgot_password',$data);
    }

     public function send_forgot_password_link()
    {

        if ($this->request->getMethod() === 'post') {

          $data = ['email' => $this->request->getVar('email')];

          $rule = ['email'   => 'required'];

        if (! $this->validateData($data, $rule)) {
             $response=array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!');
            
        }
        else
        {
            $auth=new AuthModel();
            $response=$auth->genrateResetPasswordLink($data['email']);
           
        }



        return $this->response->setJSON($response);
        
       }
    }

    public function reset_password($token)
    {
        $data=['token'=>$token,'pageTitle'=>'Reset Password'];

         return view('auth/reset_password',$data);
    }

    public function set_new_password(string $token)
    {

        if ($this->request->getMethod() === 'post') {

          $data = ['password' => $this->request->getVar('password'),
                   'reset_token'=>$token,
                   'password_confirm'=>$this->request->getVar('password_confirm')];

          $rule = ['password'   => 'required',
                  'password_confirm'=>'required|matches[password]'];

       



        if (! $this->validateData($data, $rule)) {
             $response=array('status'=>0,
                             'errors'=>$this->validator->getErrors(),
                             'message'=>'Validation Error Occur!');
            
        }
        else
        {
            $auth=new AuthModel();
            $response=$auth->setNewPassword($data);
           
        }



        return $this->response->setJSON($response);
        
       }
    }
}
