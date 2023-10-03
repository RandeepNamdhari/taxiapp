<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChatUsersTable extends Migration
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
            'connection_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
            'chat_message_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
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
            
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('connection_id', 'user_connections', 'id', 'NO ACTION', 'CASCADE');
         $this->forge->addForeignKey('chat_message_id', 'chat_messages', 'id', 'NO ACTION', 'CASCADE');
          $this->forge->addForeignKey('sender', 'users', 'id', 'NO ACTION', 'CASCADE');
          $this->forge->addForeignKey('receiver', 'users', 'id', 'NO ACTION', 'CASCADE');


    
        $this->forge->createTable('chat_users');
    }

    public function down()
    {
        $this->forge->dropTable('chat_users');
        
    }
}
