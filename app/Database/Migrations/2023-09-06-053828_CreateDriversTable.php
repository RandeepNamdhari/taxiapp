<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDriversTable extends Migration
{
   public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for first_name
                'null' => true,
            ],
            'middle_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for middle_name
                'null' => true,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for last_name
                'null' => true,
            ],
         
            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'suburb' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for suburb
                'null' => true,
            ],
            'post_code' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for post_code
                'null' => true,
            ],
            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'state_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'licence_number' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for licence_number
                'null' => true,
            ],
            'licence_expiry' => [
                'type' => 'DATE',
                'null' => true,
            ],
          
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('drivers');
    }

    public function down()
    {
        $this->forge->dropTable('drivers');
    }
}
