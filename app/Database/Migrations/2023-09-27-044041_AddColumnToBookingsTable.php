<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnToBookingsTable extends Migration
{
    public function up()
    {
        $fields = [
            'booking_uid' => [
                'type' => 'VARCHAR',
                'constraint' => 255, 
                'null' => true,
                'after'=>'id',
                
            ],
           
        ];

        $this->forge->addColumn('bookings', $fields);
    }

    public function down()
    {
        
        $this->forge->dropColumn('bookings', 'booking_uid');
    }
}
