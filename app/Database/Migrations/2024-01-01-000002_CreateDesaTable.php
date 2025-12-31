<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDesaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'LONGTEXT',
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', false, true);
        $this->forge->createTable('desa');
    }

    public function down()
    {
        $this->forge->dropTable('desa');
    }
}