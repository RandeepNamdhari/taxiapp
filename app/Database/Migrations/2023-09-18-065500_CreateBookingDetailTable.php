<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingDetailTable extends Migration
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
             'driver_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
             'vehicle_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
            'from_location' => [
                'type' => 'VARCHAR',
                'constraint'=>250,
                                
            ],
            'to_location' => [
                'type' => 'VARCHAR',
                'constraint'=>250,
                                
            ],
             'to_location_latitude' => [
                'type' => 'VARCHAR',
                'constraint'=>250,
                                
            ],
             'to_location_longitude' => [
                'type' => 'VARCHAR',
                'constraint'=>250,
                                
            ],
             'from_location_latitude' => [
                'type' => 'VARCHAR',
                'constraint'=>250,
                                
            ],
             'from_location_longitude' => [
                'type' => 'VARCHAR',
                'constraint'=>250,
                                
            ],
            'distance' => [
                'type' => 'DECIMAL',
                'constraint'=>'10,2',
                                
            ],
            'estimate_time'=>[
                'type'=>'DECIMAL',
                'constraint'=>'10,2',
                'null'=>true],

            'pickup_time' => [
                'type' => 'DATETIME',
                'null'=>true,                                
            ],
             'drop_time' => [
                'type' => 'DATETIME',
                'null'=>true,                                
            ],
             'fares' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null'=>true,
                
            ],
            'note'=>[
                'type'=>'TEXT',
                'null'=>true,
            ],            
             'status' => [
                'type' => 'ENUM("pending", "confirmed", "cancelled")',
                'default' => 'pending',
            ],
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('booking_id', 'bookings', 'id', 'NO ACTION', 'CASCADE');

        $this->forge->addForeignKey('vehicle_id', 'vehicles', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->addForeignKey('driver_id', 'drivers', 'id', 'NO ACTION', 'CASCADE');
    
        $this->forge->createTable('booking_details');
    }

    public function down()
    {
        $this->forge->dropTable('booking_details');
        
    }
}
