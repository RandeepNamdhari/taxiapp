<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAddressColumnToUsersTable extends Migration
{
        public function up()
    {
        $fields = [
            'address' => [
                'type' => 'TEXT',
                
                'null' => true,
                'after' => 'last_name' 
            ],
         
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'address');
       
    }
}
