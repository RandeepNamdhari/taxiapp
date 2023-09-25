<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCompanyBookingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'company_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
               
            ],
              'booking_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            
        ]);
          $this->forge->addForeignKey('company_id', 'companies', 'id', 'NO ACTION', 'CASCADE');
           $this->forge->addForeignKey('booking_id', 'bookings', 'id', 'NO ACTION', 'CASCADE');
    
        $this->forge->createTable('company_bookings');
    }

    public function down()
    {
        $this->forge->dropTable('company_bookings');
        
    }
}
