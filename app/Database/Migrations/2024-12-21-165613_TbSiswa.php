<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSiswa extends Migration
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
            'nipd' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_lahir' => [
                'type'       => 'DATE',
            ],
            'jk' => [
                'type'       => 'CHAR',
                'constraint' => '1',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addForeignKey('id_kelas', 'tb_master_Kategori', 'id');
        $this->forge->addForeignKey('id_jurusan', 'tb_master_Kategori', 'id');
        $this->forge->addForeignKey('id_tahun', 'tb_master_Kategori', 'id');
        $this->forge->createTable('tb_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_siswa');
    }
}
