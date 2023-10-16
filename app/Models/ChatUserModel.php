<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class ChatUserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'chat_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['sender','receiver','chat_message_id','connection_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

   public static function userChat(int $connection_id,$unread_count,$offset=0)
   {
      $obj=new self();
      $user_id=getUserId();



      $messages=$obj->select('chat_users.sender,chat_users.receiver,DATE_FORMAT(chat_messages.created_at, "%H:%i") as chat_time,sender.first_name as sender_first_name,sender.username as sender_username,receiver.username as receiver_username,sender_media_files.file_thumb_path as sender_photo,receiver.first_name as receiver_first_name,receiver_media_files.file_thumb_path as receiver_photo,chat_messages.message,chat_messages.is_file,chat_messages.is_read,chat_media_files.file_extension as attach_file_extension,chat_media_files.file_thumb_path as attach_file')
       // ->join('chat_users','chat_users.connection_id=user_connections.id')
        ->join('chat_messages','chat_users.chat_message_id=chat_messages.id')
        ->join('users as sender','chat_users.sender=sender.id')
        ->join('users as receiver','chat_users.receiver=receiver.id')

        ->join('media as sender_media','sender_media.model_id=sender.id AND sender_media.model="User"','left')
        ->join('media_files sender_media_files','sender_media.id=sender_media_files.media_id','left')
        ->join('media as receiver_media','receiver_media.model_id=receiver.id AND receiver_media.model="User"','left')->join('media_files receiver_media_files','receiver_media.id=receiver_media_files.media_id','left')
        ->join('media as chat_media','chat_media.model_id=chat_messages.id AND chat_media.model="Chat"','left')
        ->join('media_files as chat_media_files','chat_media_files.media_id=chat_media.id','left')
        ->where('chat_users.connection_id',$connection_id)->orderBy('chat_users.id','desc')->offset($offset)->limit(10)->get()->getResultArray();

        $is_read_done=0;

      

        if($unread_count):
            $obj2=new self();
            $result=$obj2->select('chat_users.chat_message_id')->where('chat_users.connection_id',$connection_id)->join('chat_messages','chat_users.chat_message_id=chat_messages.id')->where('receiver',$user_id)->where('chat_messages.is_read',0)->get()->getResultArray();

            $chat_ids=array_column($result, 'chat_message_id');

           $is_read_done= \App\Models\ChatMessageModel::updateOnlyThisIds($chat_ids);


        endif;

      return array_reverse($messages);
   }


   public static function saveChat(array $chatUser)
   {
      $obj=new self();

      $chatUserId= $obj->insert($chatUser);

      $chatUserId= $chatUserId?$chatUserId: throw new DatabaseException('Unable to insert details into database.');

      return $chatUserId;
   }


   public static function getSenderMessage(int $id)
   {
     $obj=new self();

     $chat=$obj->select('chat_users.*,users.first_name,users.last_name,users.username,u_m_f.file_thumb_path as user_photo,media_files.file_thumb_path as attach_file,media_files.file_extension as attach_file_extension,chat_messages.message,chat_messages.is_file,DATE_FORMAT(chat_messages.created_at, "%H:%i") as chat_time')->join('chat_messages','chat_users.chat_message_id=chat_messages.id')->join('users','chat_users.sender=users.id')->join('media','media.model_id=chat_messages.id AND media.model="Chat"','left')->join('media_files','media.id=media_files.media_id','left')->join('media as u_media','u_media.model_id=users.id AND u_media.model="User"','left')->join('media_files as u_m_f','u_media.id=u_m_f.media_id','left')->find($id);

     return $chat;
   }
}
