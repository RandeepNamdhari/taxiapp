<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemSettingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'system_settings';
    protected $primaryKey       = 'key';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['key','value'];

    // Dates
    protected $useTimestamps = false;
    

    public function getSetting(string $key)
    {
         return $this->where('key',$key)->first()['value']??'';
    }
}
