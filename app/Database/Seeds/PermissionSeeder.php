<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use \App\Models\PermissionModel;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $modules = ['users','roles'];
        $permissions=['create','read','update','delete'];

        $permissionModel = new PermissionModel();

        foreach($modules as $module):
            foreach($permissions as $permission):

                if(!$permissionModel->where('name',$module.'.'.$permission)->first()):

                    $row=array('name'=>$module.'.'.$permission);

                    $permissionModel->insert($row);

            endif;

            endforeach;
        endforeach;

    }
}
