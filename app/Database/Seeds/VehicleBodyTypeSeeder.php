<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use \App\Models\VehicleBodyTypeModel;


class VehicleBodyTypeSeeder extends Seeder
{
    public function run()
    {
         $data = [
            [
                
                'name'=>'HATCHBACK',
              
            ],
            [
              
                'name'=>'SEDAN',
              
            ],
              [
               
                'name'=>'VAN',
              
            ],
            
        ];

        $stateModel = new VehicleBodyTypeModel();



        foreach ($data as $key => $value):
            if(!$stateModel->where('name',$value['name'])->first()):

                 $stateModel->insert($value);


        endif;

endforeach;
        
    }
}
