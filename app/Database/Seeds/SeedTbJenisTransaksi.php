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

        $sql = "INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('1', 'Jas Almamater', '1', '200000', '1', '200000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('2', 'Baju Olahraga', '1', '150000', '1', '150000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('3', 'Atribut', '1', '100000', '1', '100000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('4', 'Sampul Raport', '1', '150000', '1', '150000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('5', 'Baju Kejuruan', '1', '200000', '1', '200000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('6', 'Praktek', '1', '700000', '1', '700000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('7', 'SPP', '1', '60000', '12', '720000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('8', 'PSAS', '1', '100000', '1', '100000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('9', 'PSAT', '1', '100000', '1', '100000', 'kelas 10');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('10', 'Daftar ulang', '1', '50000', '1', '50000', 'kelas 11');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('11', 'SPP', '1', '60000', '12', '720000', 'kelas 11');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('12', 'PKL', '1', '820000', '1', '820000', 'kelas 11');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('13', 'ANBK', '1', '300000', '1', '300000', 'kelas 11');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('14', 'PSAS', '1', '100000', '1', '100000', 'kelas 11');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('11', 'PSAT', '1', '100000', '1', '100000', 'kelas 11');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('12', 'Daftar ulang', '1', '50000', '1', '50000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('13', 'Diklat UKK', '1', '250000', '1', '250000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('14', 'UKK', '1', '600000', '1', '600000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('15', 'PSAJ', '1', '300000', '1', '300000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('16', 'UPP', '1', '200000', '1', '200000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('17', 'Pas Photo', '1', '50000', '1', '50000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('18', 'Sampul ijazah', '1', '100000', '1', '100000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('19', 'Penulisan ijazah', '1', '500000', '1', '500000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('20', 'Souvenir', '1', '100000', '1', '100000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('21', 'Perpisahan', '1', '200000', '1', '200000', 'kelas 12');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('22', 'Honorarium', '2', '0', '1', '0', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('23', 'Sarpras', '2', '0', '1', '0', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('24', 'Kegiatan', '2', '0', '1', '0', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('25', 'Mapel', '3', '20000', '1', '20000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('26', 'Wali kelas', '3', '100000', '1', '100000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('27', 'Kurikulum', '3', '300000', '1', '300000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('28', 'Operator', '3', '800000', '1', '800000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('29', 'Bendahara', '3', '400000', '1', '400000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('30', 'Kaprog', '3', '150000', '1', '150000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('31', 'Sarpras', '3', '300000', '1', '300000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('32', 'TU Kepegawaian', '3', '400000', '1', '400000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('33', 'TU SIM', '3', '130000', '1', '130000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('34', 'Kesiswaan', '3', '300000', '1', '300000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('35', 'Pembina eskul', '3', '1000000', '1', '1000000', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('36', 'Baju', '4', '0', '1', '0', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('37', 'Mesin Photocopy', '4', '0', '1', '0', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('38', 'ATK', '5', '0', '1', '0', '');
INSERT INTO `tb_jenis_transaksi` (`id`, `nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES ('38', 'Kertas', '5', '0', '1', '0', '');";

        $sql = "INSERT INTO `tb_jenis_transaksi` (`nama`, `id_kategori_sub`, `nominal`, `qty`, `total`, `keterangan`) VALUES
	('Jas Almamater', '1', '200000', '1', '200000', 'kelas 10'),
	('Baju Olahraga', '1', '150000', '1', '150000', 'kelas 10'),
	('Atribut', '1', '100000', '1', '100000', 'kelas 10'),
	('Sampul Raport', '1', '150000', '1', '150000', 'kelas 10'),
	('Baju Kejuruan', '1', '200000', '1', '200000', 'kelas 10'),
	('Praktek', '1', '700000', '1', '700000', 'kelas 10'),
	('SPP', '1', '60000', '12', '720000', 'kelas 10'),
	('PSAS', '1', '100000', '1', '100000', 'kelas 10'),
	('PSAT', '1', '100000', '1', '100000', 'kelas 10'),
	('Daftar ulang', '1', '50000', '1', '50000', 'kelas 11'),
	('SPP', '1', '60000', '12', '720000', 'kelas 11'),
	('PKL', '1', '820000', '1', '820000', 'kelas 11'),
	('ANBK', '1', '300000', '1', '300000', 'kelas 11'),
	('PSAS', '1', '100000', '1', '100000', 'kelas 11'),
	('PSAT', '1', '100000', '1', '100000', 'kelas 11'),
	('Daftar ulang', '1', '50000', '1', '50000', 'kelas 12'),
	('Diklat UKK', '1', '250000', '1', '250000', 'kelas 12'),
	('UKK', '1', '600000', '1', '600000', 'kelas 12'),
	('PSAJ', '1', '300000', '1', '300000', 'kelas 12'),
	('UPP', '1', '200000', '1', '200000', 'kelas 12'),
	('Pas Photo', '1', '50000', '1', '50000', 'kelas 12'),
	('Sampul ijazah', '1', '100000', '1', '100000', 'kelas 12'),
	('Penulisan ijazah', '1', '500000', '1', '500000', 'kelas 12'),
	('Souvenir', '1', '100000', '1', '100000', 'kelas 12'),
	('Perpisahan', '1', '200000', '1', '200000', 'kelas 12'),
	('Honorarium', '2', '0', '1', '0', ''),
	('Sarpras', '2', '0', '1', '0', ''),
	('Kegiatan', '2', '0', '1', '0', ''),
	('Mapel', '3', '20000', '1', '20000', ''),
	('Wali kelas', '3', '100000', '1', '100000', ''),
	('Kurikulum', '3', '300000', '1', '300000', ''),
	('Operator', '3', '800000', '1', '800000', ''),
	('Bendahara', '3', '400000', '1', '400000', ''),
	('Kaprog', '3', '150000', '1', '150000', ''),
	('Sarpras', '3', '300000', '1', '300000', ''),
	('TU Kepegawaian', '3', '400000', '1', '400000', ''),
	('TU SIM', '3', '130000', '1', '130000', ''),
	('Kesiswaan', '3', '300000', '1', '300000', ''),
	('Pembina eskul', '3', '1000000', '1', '1000000', ''),
	('Baju', '4', '0', '1', '0', ''),
	('Mesin Photocopy', '4', '0', '1', '0', ''),
	('ATK', '5', '0', '1', '0', ''),
	('Kertas', '5', '0', '1', '0', '');";

        $this->db->query($sql);
    }
}
