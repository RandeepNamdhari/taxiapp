<?php

namespace App\Models;

use CodeIgniter\Model;

class UserConnectionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_connections';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public static function searchUser(string $search)
    {

        if($search):

            $obj=new self();

            $connected_users=$obj->select('users.*,u.*,user_connections.is_active')
                                 ->join('users','user_connections.sender=users.id')
                                 ->join('users as u','user_connections.receiver=u.id')
                                 ->where('users.id','!='.getUserId())
                                 ->where('u.id','!='.getUserId())
                                 ->groupStart()
                                 ->like('u.first_name',$search)
                                 ->orLike('users.first_name',$search)
                                 ->groupEnd()
                                 ->findAll();

          
            $users=\App\Models\UserModel::getUserExcludeIds([],$search);


            $content=view('chat/partials/search',['users'=>$users]);





        else:

        endif;

        return array('status'=>1,'connected_users'=>$connected_users,'users'=>$users,'content'=>$content);

    }
   
}
