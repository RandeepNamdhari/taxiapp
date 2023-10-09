<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class ChatMessageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'chat_messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['message','is_read','is_file'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

   public static function create(array $data)
   {
      $obj=new self();
      
       $chat['message']=$data['message'];

       $request = service('request');

       $file = $request->getFile('upload_file');

        if($file):

            $chat['is_file']=1;           

        endif;

        $chat_id= $obj->insert($chat) ;
        $chat_id=$chat_id?$chat_id:throw new DatabaseException('Unable to insert chat message.');

        if($file):

         $file=\App\Models\MediaModel::attach(['model'=>'Chat',
                                         'type'=>'chat',
                                         'user_id'=>getUserId(),
                                         'model_id'=>$chat_id,
                                         'file'=>'upload_file']);

     endif;

        return $chat_id;
        

       
   }


   public static function updateOnlyThisIds(array $ids)
   {
      $obj=new self();

      return $obj->set(['is_read'=>1])->whereIn('id',$ids)->update();
   }
}
