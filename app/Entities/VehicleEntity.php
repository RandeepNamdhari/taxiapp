<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class VehicleEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public $media=[];


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

   
}
