<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicesTable extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                
            ],
          
            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                
            ],
            'status' => [
                'type' => 'BOOLEAN',               
               'default'=>true,
            ],
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
    
        $this->forge->createTable('services');
    }

    public function down()
    {
        $this->forge->dropTable('services');
        
    }
}
