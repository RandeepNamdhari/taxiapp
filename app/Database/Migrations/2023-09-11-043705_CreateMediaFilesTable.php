<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMediaFilesTable extends Migration
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
            'media_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'file_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for first_name
                'null' => true,
            ],
            'file_extension' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for middle_name
                'null' => true,
            ],
            'file_size' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for last_name
                'null' => true,
            ],
             'file_path' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for last_name
                'null' => true,
            ],
              'file_thumb_path' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for last_name
                'null' => true,
            ],
            'file_orignal_name' => [
                'type' => 'VARCHAR',
                'constraint' => 250, // Maximum length for last_name
                'null' => true,
            ],
            
             'is_default' => [
                'type' => 'BOOLEAN',
               
               'default'=>false,
            ],
          
            'created_at datetime default current_timestamp',
             'updated_at datetime default current_timestamp on update current_timestamp', 
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('media_id', 'media', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('media_files');
    }

    public function down()
    {
        $this->forge->dropTable('media_files');
    }
}
