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
    protected $allowedFields    = ['sender','receiver','is_active'];

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

    public static function getChat(int $user_id)
    {
        $obj=new self();
        $connection_id=$obj->where('sender',$user_id)->orWhere('receiver',$user_id)->first()['id']??null;
        if($connection_id):

            $messages=\App\Models\ChatUserModel::userChat($connection_id);

        else:

            $messages=[];

        endif;

        $content=view('chat/partials/messages',['messages'=>$messages]);

        return array('status'=>'success','content'=>$content);

    }

    public static function saveChat(array $data)
    {
        if(isset($data['chat_user_id']) && $data['chat_user_id']):



            $obj=new self();

            $newConnection=0;

            $obj->transBegin();


            $user_id=getUserId();

            $connection=$obj->groupStart()->where('sender',$user_id)->orWhere('receiver',$user_id)->groupEnd()->first();

            if(($connection && $connection['status']!='blocked') || !$connection):

            $chat_id=\App\Models\ChatMessageModel::create($data);

            endif;


            if($connection):

                $connection_id=$connection['id'];

            else:

                $connection_data=array('sender'=>$user_id,'receiver'=>$data['chat_user_id'],'is_active'=>1);

                $connection_id=$obj->insert($connection_data);

                $newConnection=$connection_id;

            endif;

            $chat_user=array('sender'=>$user_id,'receiver'=>$data['chat_user_id'],'connection_id'=>$connection_id,'chat_message_id'=>$chat_id);

            $chat_user_id=\App\Models\ChatUserModel::saveChat($chat_user);

            if($chat_user_id && $chat_id && $connection_id):
                
                $obj->transCommit();

                $chat=\App\Models\ChatUserModel::getSenderMessage($chat_user_id);

              //  echo '<pre>';print_r($chatDetail);die;

                $content=view('chat/partials/sender-message',['chat'=>$chat]);


                return array('status'=>1,'content'=>$content,'connection'=>$newConnection);

            else:

                $obj->transRollback();

                return array('status'=>1,'message'=>'Something went wrong.Please try again later.','type'=>'warning');



            endif;



        else:

        endif;
    }
   
}
