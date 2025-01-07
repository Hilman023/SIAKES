<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'id_kategori_sub' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_aktor' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'jenis_aktor' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                // guru atau siswa
            ],
            'tanggal_transaksi' => [
                'type'           => 'DATETIME',
                'null' => true,
            ],
            'total_nominal' => [
                'type'           => 'FLOAT',
            ],
            'bayar_nominal' => [
                'type'           => 'FLOAT',
            ],
            'sisa_nominal' => [
                'type'           => 'FLOAT',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default' => 'Menunggu'
                // Menunggu, Lunas, Sebagian
            ],
            'cid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
                'unsigned'       => true,
            ],
            'uid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
                'unsigned'       => true,
            ],
            'did' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true,
                'unsigned'       => true,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kategori_sub', 'tb_transaksi_kategori_sub', 'id');
        $this->forge->createTable('tb_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_transaksi');
    }
}
