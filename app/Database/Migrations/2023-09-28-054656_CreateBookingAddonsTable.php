<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingAddonsTable extends Migration
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

            
             'booking_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
             'service_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],

            'note' => [
                'type' => 'TEXT',
                'constraint' => 250,
                
            ],
          
            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                
            ],
         
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
           $this->forge->addForeignKey('service_id', 'services', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->addForeignKey('booking_id', 'bookings', 'id', 'NO ACTION', 'CASCADE');
    
        $this->forge->createTable('booking_add_ons');
    }

    public function down()
    {
        $this->forge->dropTable('booking_add_ons');
        
    }
}
