<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaketTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'desa_id' => [
                'type' => 'INT',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => [10, 2],
            ],
            'description' => [
                'type' => 'LONGTEXT',
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
        $this->forge->addForeignKey('desa_id', 'desa', 'id');
        $this->forge->createTable('paket');
    }

    public function down()
    {
        $this->forge->dropTable('paket');
    }
}
