<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePagesTable extends Migration
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
          
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                
            ],
            'content' => [
                'type' => 'TEXT',               
               'null'=>true,
            ],
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
    
        $this->forge->createTable('pages');
    }

    public function down()
    {
        $this->forge->dropTable('pages');
        
    }
}
