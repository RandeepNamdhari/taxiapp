<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyEmployees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'company_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
               
            ],
              'employee_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            
        ]);
          $this->forge->addForeignKey('company_id', 'companies', 'id', 'NO ACTION', 'CASCADE');
           $this->forge->addForeignKey('emloyee_id', 'employees', 'id', 'NO ACTION', 'CASCADE');
    
        $this->forge->createTable('company_employees');
    }

    public function down()
    {
        $this->forge->dropTable('company_employees');
        
    }
}
