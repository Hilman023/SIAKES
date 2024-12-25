<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPembayaran extends Migration
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
            'no_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'id_transaksi' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'tanggal_pembayaran' => [
                'type'           => 'DATETIME',
                'null' => true,
            ],
            'method' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'bayar_nominal' => [
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
        $this->forge->addForeignKey('id_transaksi', 'tb_transaksi', 'id');
        $this->forge->createTable('tb_pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pembayaran');
    }
}
