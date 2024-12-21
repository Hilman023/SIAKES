<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTransaksiKategoriSub extends Migration
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
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'is_manual' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kategori', 'tb_transaksi_kategori', 'id');
        $this->forge->createTable('tb_transaksi_kategori_sub');
    }

    public function down()
    {
        $this->forge->dropTable('tb_transaksi_kategori_sub');
    }
}
