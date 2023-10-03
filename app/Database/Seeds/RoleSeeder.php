<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use \App\Models\RoleModel;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['admin','company','employee','customer','driver','user'];
        

        $roleModel = new RoleModel();

      
            foreach($roles as $role):

                if(!$roleModel->where('name',$role)->first()):

                    $row=array('name'=>$role,'is_default'=>1);

                    $roleModel->insert($row);

            endif;

           
        endforeach;

    }
}
