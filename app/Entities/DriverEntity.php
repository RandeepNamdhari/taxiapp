<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class DriverEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

     public function getDefaultMedia()
    {
        return \App\Models\MediaModel::getFirstOrDefaultMedia('User',$this->user_id);
    }

     public function deleteMedia()
    {
        $obj=new \App\Models\MediaModel();

        $obj->deleteMedia('User',$this->user_id);

        
    }
}
