<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAddressColumnToUsersTable extends Migration
{
    public function up()
    {
        $fields = [
            'middle_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255, // Adjust the constraint based on your requirements
                'null' => true,
                'after' => 'first_name',
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'last_name',
            ]
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'middle_name');
        $this->forge->dropColumn('users', 'address');
    }
}
