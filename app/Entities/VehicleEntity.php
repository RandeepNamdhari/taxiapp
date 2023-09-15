<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class VehicleEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    protected $attributes=['media'];

    public $media=[];


     public function getMediaList()
    {
        $media = \App\Models\MediaModel::getMedia('Vehicle',$this->id);
        return $media['vehicle']??[];
    }

    public function getDefaultMedia()
    {
        return \App\Models\MediaModel::getFirstOrDefaultMedia('Vehicle',$this->id);
    }


    public function getMedia()
    {
        $this->media= \App\Models\MediaModel::getMedia('Vehicle',$this->id);

        return $this;

      
    }

    public function getFile($type,$size='orignal')
    {

        $file=$this->media[$type][0]??[];

       
          if($size =='thumb'):
            $file['file_path']=$file['file_thumb_path']??'';
        endif;




        if(isset($file['file_path']) && $file['file_path'] && file_exists(WRITEPATH.$file['file_path'])):

            return base_url($file['file_path']);

        else:

            return '';

        endif;
    }

    public function deleteMedia()
    {
        $obj=new \App\Models\MediaModel();

        $obj->deleteMedia('Vehicle',$this->id);

        
    }

   
}
