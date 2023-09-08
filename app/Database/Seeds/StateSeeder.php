<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use \App\Models\StateModel;


class StateSeeder extends Seeder
{
    public function run()
    {
         $data = [
            [
                'name' => '',
                'code'=>'NSW',
              
            ],
            [
                'name' => '',
                'code'=>'VIC',
              
            ],
              [
                'name' => '',
                'code'=>'TAS',
              
            ],
            [
                'name' => '',
                'code'=>'WA',
              
            ],
             [
                'name' => '',
                'code'=>'SA',
              
            ],
            // Add more user data here...
        ];

        $stateModel = new StateModel();



        foreach ($data as $key => $value):
            if(!$stateModel->where('code',$value['code'])->first()):

                 $stateModel->insert($value);


        endif;

endforeach;
        
    }
}
