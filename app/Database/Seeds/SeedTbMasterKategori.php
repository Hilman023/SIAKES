<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedTbMasterKategori extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => '10',
                'jenis' => 'kelas',
            ],
            [
                'nama' => '11',
                'jenis' => 'kelas',
            ],
            [
                'nama' => '12',
                'jenis' => 'kelas',
            ],

            [
                'nama' => '2024/2025',
                'jenis' => 'tahun',
            ],
            [
                'nama' => '2023/2024',
                'jenis' => 'tahun',
            ],
            [
                'nama' => '2022/2023',
                'jenis' => 'tahun',
            ],

            [
                'nama' => 'TKRO',
                'jenis' => 'jurusan',
            ],
            [
                'nama' => 'TKJ',
                'jenis' => 'jurusan',
            ],
            [
                'nama' => 'TB',
                'jenis' => 'jurusan',
            ],



        ];

        $this->db->table('tb_master_kategori')->insertBatch($data);
    }
}
