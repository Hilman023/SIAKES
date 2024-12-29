<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSiswaHistory extends Migration
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
            'id_siswa' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_kelas' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_jurusan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_tahun' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_siswa', 'tb_siswa', 'id');
        $this->forge->addForeignKey('id_kelas', 'tb_master_Kategori', 'id');
        $this->forge->addForeignKey('id_jurusan', 'tb_master_Kategori', 'id');
        $this->forge->addForeignKey('id_tahun', 'tb_master_Kategori', 'id');
        $this->forge->createTable('tb_siswa_history');
    }

    public function down()
    {
        $this->forge->dropTable('tb_siswa_history');
    }
}
