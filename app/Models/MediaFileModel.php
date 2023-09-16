<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class MediaFileModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'media_files';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['file_path','file_thumb_path','file_name','file_orignal_name','file_extension','media_id','file_size','is_default'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    public static function addFile(array $file,$do_update=false)
    {
        $media_file_obj=new self();

        if(is_array($file)):

              if($do_update):

                $media_file=$media_file_obj->where('media_id',$file['media_id'])->first();

             


               endif;

               if(isset($media_file['id'])):


                self::removeExistingFile($media_file);

                $file_id=$media_file['id'];

               $media_file_obj->update($media_file['id'],$file)?true:throw new DatabaseException('Unable to update file details');

              else:
                 $file_id=$media_file_obj->insert($file);
              $res=$file_id?true:throw new DatabaseException('Unable to insert file details');


            endif;

            return $file_id;


        endif;
    }

    public static function removeExistingFile($file)
    {
        if(isset($file['file_path']) && file_exists(WRITEPATH.$file['file_path'])):

            unlink(WRITEPATH.$file['file_path']);

        endif;

         if(isset($file['file_thumb_path']) && file_exists(WRITEPATH.$file['file_thumb_path'])):

            unlink(WRITEPATH.$file['file_thumb_path']);

        endif;
    }

    public static function destroy(int $file_id)
    {
          $obj= new self();

          $file= $obj->find($file_id);

          self::removeExistingFile($file);

          $obj->delete($file);
    }

    public static function changeStatus(int $file_id)
    {
        $obj=new self();

        $file=$obj->find($file_id); 

        if(!$file['is_default']):

        $obj2=new self();

        $obj2->where('media_id',$file['media_id'])->set(['is_default'=>0])->update();

       endif;

        return $obj->update($file_id,['is_default'=>!$file['is_default']]);
    }
}
