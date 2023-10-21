<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserCommissionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            
           'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
            'commission_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
              'model_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
            'model'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>true,
            ],
            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                
            ],
              'type' => [
                'type' => 'ENUM("add_on", "booking","cancellation")',
                'default' => 'booking',
            ],
         
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
       

        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');

        $this->forge->addForeignKey('commission_type_id', 'commission_types', 'id', 'NO ACTION', 'CASCADE');

    
        $this->forge->createTable('user_commissions');
    }

    public function down()
    {
        $this->forge->dropTable('user_commissions');
        
    }
}
