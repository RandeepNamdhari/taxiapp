<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCompaniesTable extends Migration
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
         
            'company_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for company_name
                'null' => true,
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'suburb' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for suburb
                'null' => true,
            ],
            'post_code' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for post_code
                'null' => true,
            ],
            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'state_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'trading_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250, 
                'null' => true,
            ],
            'acn_number' => [
                'type' => 'VARCHAR',
                'constraint'=>250,
                'null' => true,
            ],
            'abn_number' => [
                'type' => 'VARCHAR',
                'constraint' => 250, 
                'null' => true,
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
        $this->forge->createTable('companies');
    }

    public function down()
    {
        $this->forge->dropTable('companies');
    }
}
