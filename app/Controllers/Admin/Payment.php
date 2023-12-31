<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Payment extends BaseController
{
    public function index(int $transaction_id)
    {
        $data['pageTitle']='Payments';
        $data['currentRoute']='admin-payments';
$data['response']= run_with_exceptions(function() use ($transaction_id){

$transaction=\App\Models\TransactionModel::getTransaction($transaction_id);

if(isset($transaction['amount'])):

    $data['intent']=$this->createPaymentIntent($transaction['amount']);
    $data['transaction']=$transaction;

    endif;

return array('status'=>1,'data'=>$data);


});

return view('admin/payment/index',$data);

       
    }


    public function make(int $transaction_id)
    {
       echo 'in';die;
    }

    public function callback()
    {

    }


    public function createPaymentIntent($amount)
    {
         \Stripe\Stripe::setApiKey(''); // Set your secret API key

    $intent = \Stripe\PaymentIntent::create([
    'amount' => $amount*100, // Amount in cents
    'currency' => 'aud',
    'payment_method_types' => ['card'],
]);
    return $intent;
    }
}
