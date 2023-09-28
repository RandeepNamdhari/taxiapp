<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSystemSettings extends Migration
{
    public function up()
    {
        $this->forge->addField([
           
            'key' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                
            ],
              'value' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                
            ],
          
          
        ]);
       
    
        $this->forge->createTable('system_settings');
    }

    public function down()
    {
        $this->forge->dropTable('system_settings');
        
    }
}
