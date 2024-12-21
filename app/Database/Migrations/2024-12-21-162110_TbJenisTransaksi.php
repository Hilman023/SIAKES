<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbJenisTransaksi extends Migration
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
            'id_kategori_sub' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nominal' => [
                'type'       => 'FLOAT',
            ],
            'qty' => [
                'type'       => 'INT',
            ],
            'total' => [
                'type'       => 'INT',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint'     => '128',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kategori_sub', 'tb_transaksi_kategori_sub', 'id');
        $this->forge->createTable('tb_jenis_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jenis_transaksi');
    }
}
