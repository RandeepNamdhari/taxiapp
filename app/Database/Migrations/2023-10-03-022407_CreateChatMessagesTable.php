<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChatMessagesTable extends Migration
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
            'message' => [
                'type' => 'TEXT',
                'null' => true,                
            ],
            'is_file' => [
                'type' => 'BOOLEAN',               
               'default'=>false,
            ],
             'is_read' => [
                'type' => 'BOOLEAN',               
               'default'=>false,
            ],
          
            
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
    
        $this->forge->createTable('chat_messages');
    }

    public function down()
    {
        $this->forge->dropTable('chat_messages');
        
    }
}
