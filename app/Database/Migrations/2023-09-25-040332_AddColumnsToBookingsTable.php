<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsToBookingsTable extends Migration
{
     public function up()
    {
        $fields =['customer_type' => [
                'type' => 'VARCHAR',
                'constraint' => 250,                
                'null'=>true,
                'after'=>'user_id',
            ],        
        ];

        $this->forge->addColumn('bookings', $fields);
    }

    public function down()
    {
       
        $this->forge->dropColumn('bookings', 'customer_type');

       
    }
}
