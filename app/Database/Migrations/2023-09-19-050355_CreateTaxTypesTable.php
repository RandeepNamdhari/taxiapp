<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaxTypesTable extends Migration
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
             'percent' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null'=>true,
                
            ],
            'status' => [
                'type' => 'BOOLEAN',               
               'default'=>true,
            ],
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
    
        $this->forge->createTable('tax_types');
    }

    public function down()
    {
        $this->forge->dropTable('tax_types');
        
    }
}
