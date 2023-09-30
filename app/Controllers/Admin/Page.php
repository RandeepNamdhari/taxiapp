<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Page extends BaseController
{
    public function index()
    {
        //
    }

      public function show(string $name,string $type='us')
    {
       
       if($name=='about-us'):
        $name='about';
        $type='us';

       endif;
        $data['currentRoute']='admin-pages-'.$name.'-'.$type;

        $data['pageTitle']=ucwords($name).' '.$type;

        $data['pageType']=strtolower($type);
        $data['pageName']=strtolower($name);


         $data['response']= run_with_exceptions(function() use ($name,$type){ 
             
        $data['page']= \App\Models\PageModel::getPage($name,$type);

             return array('status'=>1,'data'=>$data);

        });

        return view('admin/page/show',$data);
    }


          public function save(string $name,string $type)
    {
    

      $response=run_with_exceptions(function() use ($name,$type)
      {

          $data = $this->request->getPOST();

        

        if (!trim($data['content'])) {
             return array('status'=>0,
                             'errors'=>['content'=>'The Content field is required'],
                             'message'=>'Validation Error Occur!',
                             'type'=>'warning');
            
        }
        else
        {
            $policy=new \App\Models\PageModel();
            
             $response= $policy->createOrUpdate($data,$name,$type);

             if($type=='us'):

                $type='about page content';

             endif;

             return array('status'=>1,'message'=>'The '.$type.' is saved succesfully.','type'=>'success');


           
        }
         });



        return $this->response->setJSON($response);
       
           }
}
