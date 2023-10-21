<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Transaction extends BaseController
{
    public function index()
    {

        if($this->request->isAJAX())
        {
          
         $data = \App\Models\TransactionModel::datatable();

         return $this->response->setJSON($data);
        }

        $data['pageTitle']='Transactions';
        $data['currentRoute']='admin-transactions';

        return view('admin/transaction/index',$data);

    }

    public function invoice(int $id)
    {
        $data['pageTitle']='Transaction Invoice';
        $data['currentRoute']='admin-transactions';

           $data['response']=run_with_exceptions(function() use ($id){

            $data['invoice']= \App\Models\TransactionModel::getInvoice($id);

            return array('status'=>1,'data'=>$data);
        });

        //   echo '<pre>';print_r($data);die;

        return view('admin/transaction/invoice',$data);
    }
}
