<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbMasterKategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_master_kategori');
    }

    public function down()
    {
        $this->forge->dropTable('tb_master_kategori');
    }
}
