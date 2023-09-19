<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
            'fares_type' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],

            'tax_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],

            'booking_date' => [
                'type' => 'DATETIME',
                                
            ],
             'booking_fares' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null'=>true,
                
            ],
             'discount_type' => [
                'type' => 'VARCHAR',
                'constraint'=>250,
                                
            ],
             'discount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
       

    
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        $this->forge->dropTable('bookings');
        
    }
}
