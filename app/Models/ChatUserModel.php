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
   

   public static function userChat(int $connection_id)
   {
      $obj=new self();

      $messages=$obj->select('chat_messages.*,chat_users.sender,chat.chat_users.receiver')->join('chat_messages','chat_users.chat_message_id=chat_messages.id')->where('chat_users.connection_id',$connection_id)->findAll();

      return $messages;
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

     $chat=$obj->select('chat_users.*,users.first_name,u_m_f.file_thumb_path as user_photo,media_files.file_thumb_path,chat_messages.message,chat_messages.is_file')->join('chat_messages','chat_users.chat_message_id=chat_messages.id')->join('users','chat_users.sender=users.id')->join('media','media.model_id=chat_messages.id AND media.model="Chat"','left')->join('media_files','media.id=media_files.media_id','left')->join('media as u_media','u_media.model_id=users.id AND u_media.model="User"','left')->join('media_files as u_m_f','u_media.id=u_m_f.media_id','left')->find($id);

     return $chat;
   }
}
