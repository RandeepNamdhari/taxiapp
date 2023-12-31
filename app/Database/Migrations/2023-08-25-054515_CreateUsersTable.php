<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'   => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email'      => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'=>true,
            ],
            'phone'      => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'=>true,
            ],
            'password'   => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
             'remember_token'   => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
              'reset_token'   => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
             'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('phone');

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
