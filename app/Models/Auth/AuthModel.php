<?php

namespace App\Models\Auth;

use CodeIgniter\Model;



class AuthModel extends Model
{
    protected $table = 'users'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['username', 'email', 'password', 'remember_token'];
    protected $user;


    public function login($credentials)
{
   helper('exception_helper');
    return run_with_exceptions(function()use ($credentials){        

    $this->user = $this->where('username', $credentials['username'])
                 ->orWhere('email', $credentials['username'])
                 ->first();



    if ($this->user && password_verify($credentials['password'],$this->user['password'])) {

          $this->isRememberable($credentials['remember']);

          $session = session();
           
          $session->set($this->user);

          return array('status'=>1,'message'=>'Your are successfully logged in.');

    } else {

        return array('status'=>0);
    }

       },'array');
}

public function isRememberable($remember=false)
{
     if ($remember) {
            $token = bin2hex(random_bytes(32)); // Generate a random token
            set_cookie('remember_token', $token, 60 * 60 * 24 * 30); // Set a cookie for 30 days

           $this->update($this->user['id'],['remember_token'=>$token]);



            

        }
}

}
