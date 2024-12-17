<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbJenisPembayaran extends Migration
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
            'id_master_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nominal' => [
                'type'       => 'FLOAT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_master_kategori', 'tb_master_kategori', 'id');
        $this->forge->createTable('tb_jenis_pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jenis_pembayaran');
    }
}
