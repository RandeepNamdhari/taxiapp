<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomerDriversTable extends Migration
{
       public function up()
    {
        $this->forge->addField([
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
               
            ],
              'driver_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            
        ]);
          $this->forge->addForeignKey('customer_id', 'customers', 'id', 'NO ACTION', 'CASCADE');
           $this->forge->addForeignKey('driver_id', 'drivers', 'id', 'NO ACTION', 'CASCADE');
    
        $this->forge->createTable('customer_drivers');
    }

    public function down()
    {
        $this->forge->dropTable('customer_drivers');
        
    }
}
