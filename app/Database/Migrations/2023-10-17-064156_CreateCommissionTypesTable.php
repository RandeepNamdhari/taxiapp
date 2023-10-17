<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommissionTypesTable extends Migration
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
              'type' => [
                'type' => 'ENUM("percent", "fixed")',
                'default' => 'percent',
            ],
            'status' => [
                'type' => 'BOOLEAN',               
               'default'=>true,
            ],
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
    
        $this->forge->createTable('commission_types');
    }

    public function down()
    {
        $this->forge->dropTable('commission_types');
        
    }
}
