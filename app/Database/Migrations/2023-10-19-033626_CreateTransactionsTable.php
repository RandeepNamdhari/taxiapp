<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsTable extends Migration
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
             'parent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'=>true,
              
            ],        
           'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
              
            ],
            'user_type' => [
                'type' => 'ENUM("driver", "company","user","customer","admin")',
               
                'null'=>true,
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
            'note'=>[
                'type'=>'TEXT',               
                'null'=>true,
            ],

            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                
            ],
              'type' => [
                'type' => 'ENUM("credit", "debit")',
                'default' => 'debit',
            ],
            'status' => [
                'type' => 'ENUM("paid", "cancel","pending","unpaid")',
                'default' => 'pending',
            ],

         
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
       
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');

    
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
        
    }
}
