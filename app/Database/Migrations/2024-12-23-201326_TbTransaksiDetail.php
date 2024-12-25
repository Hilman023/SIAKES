<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTransaksiDetail extends Migration
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
            'id_transaksi' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'item' => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],
            'qty' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'harga' => [
                'type'           => 'FLOAT',
            ],
            'subtotal' => [
                'type'           => 'FLOAT',
            ],
            'bayar_nominal' => [
                'type'           => 'FLOAT',
            ],
            'sisa_nominal' => [
                'type'           => 'FLOAT',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
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
        $this->forge->addForeignKey('id_transaksi', 'tb_transaksi', 'id');
        $this->forge->createTable('tb_transaksi_detail');
    }

    public function down()
    {
        $this->forge->dropTable('tb_transaksi_detail');
    }
}
