<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVehiclesTable extends Migration
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
             'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
            'regd_no' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null'=>true,
            ],
              'make' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null'=>true,
            ],
              'model' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null'=>true,
            ],
            'year' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null'=>true,
            ],
           'body_type' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
            'color' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null'=>true,
            ],
             'state_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
             'vin' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null'=>true,
            ],
            
            
             'kilometers_driven' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null'=>true,
            ],
              'engine_no' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null'=>true,
            ],
             'status' => [
                'type' => 'BOOLEAN',
               
               'default'=>false,
            ],
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);

            $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('vehicles');
           
    }

    public function down()
    {
     
     $this->forge->dropTable('vehicles');

    }
}
