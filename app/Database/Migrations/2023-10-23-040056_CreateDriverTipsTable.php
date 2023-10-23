<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDriverTipsTable extends Migration
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
           'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],         

            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                
            ],
            

         
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
       
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->addForeignKey('booking_id', 'bookings', 'id', 'NO ACTION', 'CASCADE');


    
        $this->forge->createTable('driver_tips');
    }

    public function down()
    {
        $this->forge->dropTable('driver_tips');
        
    }
}
