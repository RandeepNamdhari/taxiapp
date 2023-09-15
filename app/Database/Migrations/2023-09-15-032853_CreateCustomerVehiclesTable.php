<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomerVehiclesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
               
            ],
              'vehicle_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            
        ]);
          $this->forge->addForeignKey('customer_id', 'customers', 'id', 'NO ACTION', 'CASCADE');
           $this->forge->addForeignKey('vehicle_id', 'vehicles', 'id', 'NO ACTION', 'CASCADE');
    
        $this->forge->createTable('customer_vehicles');
    }

    public function down()
    {
        $this->forge->dropTable('customer_vehicles');
        
    }
}
