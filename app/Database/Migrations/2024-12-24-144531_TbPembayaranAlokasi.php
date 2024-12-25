<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPembayaranAlokasi extends Migration
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
            'id_pembayaran' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_transaksi_detail' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'alokasi_nominal' => [
                'type'           => 'FLOAT',
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
        $this->forge->addForeignKey('id_pembayaran', 'tb_pembayaran', 'id');
        $this->forge->addForeignKey('id_transaksi_detail', 'tb_transaksi_detail', 'id');
        $this->forge->createTable('tb_pembayaran_alokasi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pembayaran_alokasi');
    }
}
