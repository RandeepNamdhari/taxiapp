<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserConnectionsTable extends Migration
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
              'sender' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
              'receiver' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],  
             'status' => [
                'type' => 'ENUM("pending", "blocked", "approved")',
                'default' => 'pending',
            ],   
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],                 
            
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
         $this->forge->addForeignKey('sender', 'users', 'id', 'NO ACTION', 'CASCADE');
          $this->forge->addForeignKey('receiver', 'users', 'id', 'NO ACTION', 'CASCADE');


    
        $this->forge->createTable('user_connections');
    }

    public function down()
    {
        $this->forge->dropTable('user_connections');
        
    }
}
