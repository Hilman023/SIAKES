<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedTbJenisTransaksi extends Seeder
{
    public function run()
    {

        $data = [
            [
                'nama' => 'SPP',
                'id_master_kategori' => 10,
                'nominal' => '60000',
            ],
            [
                'nama' => 'PSAS',
                'id_master_kategori' => 10,
                'nominal' => '100000',
            ],
            [
                'nama' => 'PSAT',
                'id_master_kategori' => 10,
                'nominal' => '100000',
            ],
            [
                'nama' => 'Daftar ulang',
                'id_master_kategori' => 10,
                'nominal' => '100000',
            ],
            [
                'nama' => 'Praktek',
                'id_master_kategori' => 10,
                'nominal' => '100000',
            ],
            [
                'nama' => 'Awal masuk',
                'id_master_kategori' => 10,
                'nominal' => '1000000',
            ],
            [
                'nama' => 'PKL',
                'id_master_kategori' => 10,
                'nominal' => '1000000',
            ],
            [
                'nama' => 'ANBK',
                'id_master_kategori' => 10,
                'nominal' => '200000',
            ],
            [
                'nama' => 'UjiKom',
                'id_master_kategori' => 10,
                'nominal' => '200000',
            ],
            [
                'nama' => 'PSAJ',
                'id_master_kategori' => 10,
                'nominal' => '500000',
            ],
            [
                'nama' => 'Wisuda',
                'id_master_kategori' => 10,
                'nominal' => '900000',
            ],
            [
                'nama' => 'Mapel',
                'id_master_kategori' => 12,
                'nominal' => '20000',
            ],
            [
                'nama' => 'Struktur',
                'id_master_kategori' => 12,
                'nominal' => '200000',
            ],
            [
                'nama' => 'Wali Kelas',
                'id_master_kategori' => 12,
                'nominal' => '100000',
            ],


        ];

        // $this->db->table('tb_jenis_pembayaran')->insertBatch($data);

        $sql = "INSERT INTO tb_jenis_transaksi (nama, id_kategori_sub, nominal, qty, total, keterangan) VALUES ('Jas Almamater', '1', '200000', '1', '200000', 'kelas 10');";

        $this->db->query($sql);
    }
}
