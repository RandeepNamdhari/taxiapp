<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusColumnToRolesTable extends Migration
{
    public function up()
    {
        $fields = [
            'is_default' => [
                'type' => 'BOOLEAN',
                'default'=>0,
                'after'=>'description',                                        
            ],
            'status' => [
                'type' => 'BOOLEAN',
                'default'=>1,
                'after'=>'is_default',                                        
            ],
           
        ];

        $this->forge->addColumn('roles', $fields);
    }

    public function down()
    {   
        $this->forge->dropColumn('roles', 'is_default');      
        
        $this->forge->dropColumn('roles', 'status');


    }
}
