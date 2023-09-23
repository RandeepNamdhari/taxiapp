<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class EmployeeEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

     public function getDefaultMedia()
    {
        return \App\Models\MediaModel::getFirstOrDefaultMedia('Employee',$this->id);
    }

     public function deleteMedia()
    {
        $obj=new \App\Models\MediaModel();

        $obj->deleteMedia('Employee',$this->id);

        
    }
}
