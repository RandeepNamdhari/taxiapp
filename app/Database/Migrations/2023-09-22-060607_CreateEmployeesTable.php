<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeesTable extends Migration
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

            'limit' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null'=>true,
                
            ],         
            
             'status' => [
                'type' => 'BOOLEAN',
               
               'default'=>false,
            ],
          
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
