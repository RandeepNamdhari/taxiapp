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

         $user_id=getUserId();

        $obj=new self();

         $connected_users=[];
         $connected_users=$obj->getConnections($user_id,$search);

                          //  return $connected_users;

         $existingUsers=[];

         $existingUsers1=array_column($connected_users, 'sender');
         $existingUsers2=array_column($connected_users, 'receiver');

         $existingUsers=array_merge($existingUsers2,$existingUsers1);



        //  print_r($existingUsers);die;
            $users=\App\Models\UserModel::getUserExcludeIds($existingUsers,$search);

           // return $users;


            $content=view('chat/partials/search',['connections'=>$connected_users,'users'=>$users]);





        else:



        endif;

        return array('status'=>1,'content'=>$content);

    }

    public static function getChat(int $connection_id,int $count)
    {
        $obj=new self();
       
        if($connection_id):

            $messages=\App\Models\ChatUserModel::userChat($connection_id,$count);

        else:

            $messages=[];

        endif;

       //echo '<pre>';print_r($messages);die;

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

            $connection=$obj->groupStart()->where('sender',$user_id)->orWhere('receiver',$user_id)->groupEnd()->groupStart()->where('sender',$data['chat_user_id'])->orWhere('receiver',$data['chat_user_id'])->groupEnd()->first();

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

               // echo '<pre>';print_r($chat);die;

                $content=view('chat/partials/sender-message',['chat'=>$chat]);


                return array('status'=>1,'content'=>$content,'connection'=>$newConnection);

            else:

                $obj->transRollback();

                return array('status'=>1,'message'=>'Something went wrong.Please try again later.','type'=>'warning');



            endif;



        else:

        endif;
    }

    public static function getUsers()
    {
        $user_id=getUserId();

        $obj=new self();

     
        $connections=$obj->getConnections($user_id);
      //return array('connections'=>$connections);

        $content='';

        if(count($connections)):


            $content=view('chat/partials/users',['connections'=>$connections]);




        endif;

        return array('status'=>1,'content'=>$content);



    }

    // public function getConnections2(int $user_id,$search='')
    // {
    //     $obj=new self();
    //        $connections=$obj->select('user_connections.*,sender.first_name as sender_first_name,sender.username as sender_username,receiver.username as receiver_username,sender_media_files.file_thumb_path as sender_photo,receiver.first_name as receiver_first_name,receiver_media_files.file_thumb_path as receiver_photo,MAX(chat_messages.message) AS message,chat_messages.is_file,  SUM(CASE WHEN chat_messages.is_read != 1 AND chat_users.receiver ='.$user_id.' THEN 1 ELSE 0 END) AS unread_messages_count')
    //     ->join('chat_users','chat_users.connection_id=user_connections.id')
    //     ->join('chat_messages','chat_users.chat_message_id=chat_messages.id')
    //     ->join('users as sender','user_connections.sender=sender.id')
    //     ->join('users as receiver','user_connections.receiver=receiver.id')

    //     ->join('media as sender_media','sender_media.model_id=sender.id AND sender_media.model="User"','left')
    //     ->join('media_files sender_media_files','sender_media.id=sender_media_files.media_id','left')
    //     ->join('media as receiver_media','receiver_media.model_id=receiver.id AND receiver_media.model="User"','left')->join('media_files receiver_media_files','receiver_media.id=receiver_media_files.media_id','left');

    //     if($search):

    //     $connections=$connections->groupStart()->like('sender.username',$search)->orLike('sender.first_name',$search)->orLike('receiver.first_name',$search)->orLike('receiver.username',$search)->groupEnd()->where('user_connections');

    // endif;

    //     $connections=$connections->groupStart()->where('user_connections.sender',$user_id)->orWhere('user_connections.receiver',$user_id)->groupEnd()->groupBy('user_connections.id')->orderBy('chat_users.id','desc')->findAll();

    //     return $connections;
    // }


    public function getConnections(int $user_id,$search='')
    {
        $obj=new self();
        
           $connections=$obj->select('user_connections.*,sender.first_name as sender_first_name,sender.username as sender_username,receiver.username as receiver_username,sender_media_files.file_thumb_path as sender_photo,receiver.first_name as receiver_first_name,receiver_media_files.file_thumb_path as receiver_photo,MAX(chat_messages.message) AS message,chat_messages.is_file,  SUM(CASE WHEN chat_messages.is_read != 1 AND chat_users.receiver ='.$user_id.' THEN 1 ELSE 0 END) AS unread_messages_count')
        ->join('chat_users','chat_users.connection_id=user_connections.id')
        ->join('chat_messages','chat_users.chat_message_id=chat_messages.id')
        ->join('users as sender','user_connections.sender=sender.id')
        ->join('users as receiver','user_connections.receiver=receiver.id')

        ->join('media as sender_media','sender_media.model_id=sender.id AND sender_media.model="User"','left')
        ->join('media_files sender_media_files','sender_media.id=sender_media_files.media_id','left')
        ->join('media as receiver_media','receiver_media.model_id=receiver.id AND receiver_media.model="User"','left')->join('media_files receiver_media_files','receiver_media.id=receiver_media_files.media_id','left');

        if($search):

        $connections=$connections->groupStart()->like('(CASE WHEN user_connections.sender = '.$user_id.' THEN receiver.username ELSE sender.username END)',$search)->groupEnd();

    endif;

        $connections=$connections->groupStart()->where('user_connections.sender',$user_id)->orWhere('user_connections.receiver',$user_id)->groupEnd()->groupBy('user_connections.id')->orderBy('chat_users.id','desc')->findAll();

        return $connections;
    }
   
}
