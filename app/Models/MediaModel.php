<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class MediaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'media';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['model_id','model','user_id','type'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   

    public static function attach(array $info,$do_update=false)
    {
        $mediaObj=new self();



        if($info['file'] && $info['model']):

             $mediaObj->transBegin();

            if($do_update):

            $media=$mediaObj->where('model_id',$info['model_id'])
                            ->where('type',$info['type'])
                            ->where('model',$info['model'])->first();




              endif;        

         

            if(isset($media['id'])):

             $media_id=$media['id'];

            $mediaObj->update($media_id,$info);

             else:

            $media_id=$mediaObj->insert($info);

            endif;

            if($media_id):          

            $media_file=$mediaObj->upload($info['file']);

            $media_file['media_id']=$media_id;

           // echo '<pre>';print_r($media_file);die;

            if($media_file):

               \App\Models\MediaFileModel::addFile($media_file,$do_update);

               $mediaObj->transCommit();

            endif;

             else:

            throw new DatabaseException('Unable to insert file into database.');

            $mediaObj->transRollback();

        endif;


        endif;

    }


    public function upload($fileName)
    {
           $request = service('request');

            $file = $request->getFile($fileName);


        if ($file->isValid() && ! $file->hasMoved()):
        
            $newName = $file->getRandomName();

            $thumbPath='uploads/media/thumbnails/';
            $filePath='uploads/media/orignals/';

            if ($file->move(WRITEPATH.$filePath, $newName)):
            
                // File uploaded successfully
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH.$filePath . $newName)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH.$thumbPath . $newName);

                $fileInfo['file_orignal_name']=$file->getClientName();
                $fileInfo['file_name']=$newName;
                $fileInfo['file_path']=$filePath.$newName;
                $fileInfo['file_thumb_path']=$thumbPath.$newName;


                $fileInfo['file_extension']=$file->getClientExtension();
                $fileInfo['file_size']=number_format($file->getSize() / 1024, 2) . ' KB';

                return $fileInfo;

            endif;

        endif;

           
    
}

public static function getMedia($model,$model_id='')
{
    $mediaObj=new self();

    $mediaObj->where('model',$model);

    if($model_id):

        $mediaObj->where('model_id',$model_id);

    endif;

    $media=$mediaObj->select('media_files.*,media.type,media.model')->join('media_files','media_files.media_id=media.id')->orderBy('media_files.id','desc')->findAll();
    $records=[];

    foreach($media as $file):

        $records[$file['type']][]=$file;

    endforeach;

    return $records;

}

}
