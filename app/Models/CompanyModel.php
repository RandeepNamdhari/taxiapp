<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;


class CompanyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'companies';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType    = \App\Entities\CompanyEntity::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['state_id','company_name','trading_name','abn_number','acn_number','address','suburb','date_of_birth','user_id','status','post_code'];

 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

   public function create($data)
   {


        $this->transBegin();

        $userData=['email'=>$data['email'],'phone'=>$data['phone'],
        'first_name'=>$data['first_name'],'last_name'=>$data['last_name'],
       'middle_name'=>$data['middle_name'],'address'=>'address'];

        $user_id=\App\Models\UserModel::createUser($userData);

        $data['user_id']=$user_id;
        $data['state_id']=$data['state'];
        $data['status']=0;



        if($user_id && $this->insert($data)):

        $this->transCommit();

        return array('status'=>1,'message'=>'The company is created successfully.','type'=>'success','redirect'=>base_url('admin/companies'));

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to insert the record.Please try again later.');

        endif;

   }

      public function updateCompany(int $id,$data)
   {


        $this->transBegin();

        $company=$this->where('user_id',$id)->first();

        $company===null ? throw new DatabaseException('Record not found.'):$company;


       $userData=['email'=>$data['email'],'phone'=>$data['phone'],
        'first_name'=>$data['first_name'],'last_name'=>$data['last_name'],
       'middle_name'=>$data['middle_name'],'address'=>$data['address']];

        $user_id=\App\Models\UserModel::updateUser($company->user_id,$userData);

        unset($data['user_id']);
        unset($data['status']);

        $data['state_id']=$data['state'];

        if($this->update($company->id,$data)):

        $this->transCommit();

        return array('status'=>1,'message'=>'The company is updated successfully.','type'=>'success','redirect'=>base_url('admin/companies/'.$company->id.'/view'));

        else:

            $this->transRollback();

            throw new DatabaseException('Unable to update the record.Please try again later.');

        endif;

   }

   

       public static function datatable()
    {
        $request = service('request');
        $draw = $request->getVar('draw');
        $start = $request->getVar('start');
        $length = $request->getVar('length');
        $search=$request->getVar('search[value]');

        $obj=new self();

        $query=$obj->builder();


        $query->select('companies.*,companies.id as company_id, users.username,users.email,users.phone,users.id as id')
        ->join('users', 'users.id = companies.user_id')->like('users.first_name',$search);


         $query1= clone $query;


        $query=$query->limit($length, $start)
            ->get();

           $rows= $query->getResultArray();

           foreach($rows as $index => $row):

            $row['serial_no']=$index+1;
            $row['actions']=$obj->actions($row);
            $row['created_at']=date('d M Y',strtotime($row['created_at']));
            $row['status']=$obj->getStatus($row);

                $rows[$index]=$row;

           endforeach;

        $data = [
            'draw' => $draw,
            'recordsTotal' => $obj->countAll(),
            'recordsFiltered' => $query1->countAllResults(),
            'data' => $rows,
        ];

        return $data;
    }

    public function actions($row)
    {
      return '<div class="btn-group"><button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions<i class="mdi mdi-chevron-down"></i></button><div class="dropdown-menu" style=""><a class="dropdown-item" href="'.base_url('admin/companies/'.$row['company_id'].'/view').'"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;View</a><a class="dropdown-item" href="'.base_url('admin/companies/'.$row['company_id'].'/edit').'"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Edit</a><a class="dropdown-item" href="javascript:void(0)" onclick="deleteCompany('.$row['id'].')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</a></div></div>';

      // <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
    }

    public function getStatus($row)
    {
        if($row['status']):

            return '<input class="form-check form-switch" onchange="changeStatus('.$row['company_id'].')" type="checkbox" id="switch'.$row['company_id'].'" switch="bool" checked=""><label class="form-label  full-switch" for="switch'.$row['company_id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            else:

                 return '<input class="form-check form-switch" onchange="changeStatus('.$row['company_id'].')" type="checkbox" id="switch'.$row['company_id'].'" switch="bool"><label class="form-label full-switch" for="switch'.$row['company_id'].'" data-on-label="Active" data-off-label="InActive"></label>';

            endif;

    }

    public static function destroy(int $id)
    {
        $userObj=new \App\Models\UserModel();

        return $userObj->delete($id);
    }

    

     public static function changeStatus(int $id)
    {
        $obj=new self();

        $company= $obj->find($id);

        

        $company->status=!$company->status;

        return $obj->save($company);
    }


    public static function getCompany(int $id)
    {
        $obj=new self();

        $company= $obj->select('companies.*, users.email AS email,users.phone as phone,users.first_name,users.last_name,users.middle_name,users.address,states.code as state') 
            ->join('users', 'companies.user_id = users.id')
            ->join('states','companies.state_id=states.id') 
            ->where('companies.id',$id)->first();

    
           return $company===null ? throw new DatabaseException('Record not found.'):$company;


    }

    public static function companyRow($id)
    {
        $obj=new self();

        return $obj->where('user_id',$id)->first();
    }

    public function list(string $search)
    {
        $result=$this->where('status',1)
                     ->groupStart()
                     ->like('company_name',$search)
                     ->orLike('acn_number',$search)
                     ->orLike('abn_number',$search)
                     ->orLike('trading_name',$search)


                     ->groupEnd()

                     ->findAll();

        $content='';

       

            $content.=view('admin/partials/companies',['companies'=>$result]);

   

        return $content;
    }



}
