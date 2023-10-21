<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsHistoryTable extends Migration
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
             'transaction_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
            'service_detail'=>[
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
            'transaction_type' => [
                'type' => 'ENUM("create", "update")',
                'default' => 'create',
            ],
            'status' => [
                'type' => 'ENUM("paid", "cancel","pending","unpaid")',
                'default' => 'pending',
            ],

         
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
       
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id', 'NO ACTION', 'CASCADE');

    
        $this->forge->createTable('transactions_history');
    }

    public function down()
    {
        $this->forge->dropTable('transactions_history');
        
    }
}
