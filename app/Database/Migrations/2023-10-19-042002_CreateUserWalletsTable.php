<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserWalletsTable extends Migration
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
              'type' => [
                'type' => 'ENUM("credit", "debit")',
                'default' => 'debit',
            ],
            'status' => [
                'type' => 'ENUM("success","failed")',
                'default' => 'success',
            ],

         
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
       
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');

    
        $this->forge->createTable('user_wallets');
    }

    public function down()
    {
        $this->forge->dropTable('user_wallets');
        
    }
}
