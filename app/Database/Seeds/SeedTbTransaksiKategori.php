<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedTbTransaksiKategori extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'pemasukan',
            ],
            [
                'nama' => 'pengeluaran',
            ],

        ];

        $this->db->table('tb_transaksi_kategori')->insertBatch($data);


        $data = [
            [
                'id_kategori' => 1,
                'nama' => 'Pembayaran Siswa',
                'is_manual' => 0,
            ],
            [
                'id_kategori' => 1,
                'nama' => 'Dana BOS',
                'is_manual' => 1,
            ],
            [
                'id_kategori' => 2,
                'nama' => 'Honorium',
                'is_manual' => 0,
            ],

            [
                'id_kategori' => 2,
                'nama' => 'Hutang',
                'is_manual' => 1,
            ],
            [
                'id_kategori' => 2,
                'nama' => 'Pembelian Tunai',
                'is_manual' => 1,
            ],


        ];

        $this->db->table('tb_transaksi_kategori_sub')->insertBatch($data);
    }
}
