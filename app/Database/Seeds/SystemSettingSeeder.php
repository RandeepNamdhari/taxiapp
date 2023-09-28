<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use \App\Models\SystemSettingModel;


class SystemSettingSeeder extends Seeder
{
     public function run()
    {
         $data = [
            [
                
                'key'=>'currency_icon',
                'value'=>'$',
            ],
                  
            
        ];

        $syestemSettingObject = new SystemSettingModel();



        foreach ($data as $key => $value):
            if(!$syestemSettingObject->where('key',$value['key'])->first()):

                 $syestemSettingObject->insert($value);


        endif;

endforeach;
        
    }
}
