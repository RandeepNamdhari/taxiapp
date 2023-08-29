<?php

namespace App\Models\Auth;

use CodeIgniter\Model;



class AuthModel extends Model
{
    protected $table = 'users'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['username', 'email', 'password', 'remember_token','reset_token'];
    protected $user;


    public function login(array $credentials)
{
    helper('exception_helper');

    return run_with_exceptions(function()use ($credentials){        

    $this->user = $this->where('username', $credentials['username'])
                 ->orWhere('email', $credentials['username'])
                 ->first();



    if ($this->user && password_verify($credentials['password'],$this->user['password'])) {

          $this->isRememberable($credentials['remember']);

          $session = session();
           
          $session->set(['user'=>$this->user]);

          return array('status'=>1,'message'=>'Your are successfully logged in.');

    } else {

        return array('status'=>0);
    }

       },'array');
}

public function isRememberable(Bool $remember=false)
{
     if ($remember) {

            $token = bin2hex(random_bytes(32));

            helper('cookie');


            set_cookie('remember_token', $token, 60 * 60 * 24 * 30); 

            $this->update($this->user['id'],['remember_token'=>$token]);



            

        }
}

public function genrateResetPasswordLink(string $email)
{ 
      helper('exception_helper');

       return run_with_exceptions(function()use ($email){  

         $this->user = $this->where('email',$email)->first();

         if($this->user):

         $token = bin2hex(random_bytes(32));

        
       $this->update($this->user['id'],['reset_token' => $token]);


        $this->sendMail($token);

        return array('status'=>1,'message'=>'Your request for forgot password is submitted successfully. You will get a mail for reset password soon.');

        else:

            return array('status'=>0,'message'=>'We have not any record with this email.Please make sure you are using right email Id.');

        endif;

    },'array');



}


public function setNewPassword($data)
{
   
    helper('exception_helper');

    return run_with_exceptions(function()use ($data){        

    $this->user = $this->where('reset_token', $data['reset_token'])->first();

    if ($this->user) {

          $this->update($this->user['id'],['password' =>password_hash($data['password'], PASSWORD_DEFAULT),'reset_token'=>null]);



          return array('status'=>1,'message'=>'Your new password is set successfully. Now you can login with your new password.');

    } else {

        return array('status'=>0,'message'=>'Invalid Request!');
    }

       },'array');
}

public function sendMail(string $token)
{
       $email = \Config\Services::email();

        $email->setTo('randeepnamdhari87@gmail.com');
        $email->setFrom('your@example.com');
        $email->setSubject('Reset Password');

       
        $message = view('emails/password_reset',['token'=>$token]);

        $email->setMessage($message);

        if ($email->send()) {

           return true;

        } 
        else {

            return false;
        }

}




}
