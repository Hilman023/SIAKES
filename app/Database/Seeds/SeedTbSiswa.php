<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedTbSiswa extends Seeder
{
    public function run()
    {
        $sql = "INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2425.01.001', 'ANJAS MALISI', 'Subang', '2009-6-27', 'L', 'anjasmalisi@gmail.com', '085717684498', '1', '7', '4');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2425.01.002', 'HAIKAL', 'Subang', '2008-8-25', 'L', 'kalll0808@gmail.com', '081313937792', '1', '7', '4');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2425.02.001', 'ANANG MAULANA', 'Subang', '2009-4-05', 'L', 'anangm123@gmail.com', '083833679726', '1', '8', '4');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2425.02.002', 'ASEP TAMAMI', 'Subang', '2009-1-02', 'L', 'asep0201@gmail.com', '085132449671', '1', '8', '4');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2324.01.014', 'RIKI SETIAWAN', 'Subang', '2007-6-04', 'L', 'rikis0325@gmail.com', '082120592524', '2', '7', '5');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2324.01.016', 'SAEPUL JAMIL', 'Subang', '2008-1-01', 'L', 'epulepul045@gmail.com', '085717684502', '2', '7', '5');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2324.02.007', 'FIRLY FAUZIAH', 'Subang', '2008-7-31', 'P', 'friyfauziah@gmail.com', '083839175245', '2', '8', '5');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2324.02.008', 'JIHAN', 'Subang', '2008-1-01', 'P', 'jhnptr078@gmail.com', '083116850526', '2', '8', '5');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2223.01.002', 'AKBAR RAHMAT RAMADHAN', 'Subang', '2007-9-25', 'L', 'barzzcloren@gmail.com', '085176866872', '3', '7', '6');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2223.01.012', 'RAHMAT DANI', 'Bandung', '2006-10-04', 'L', 'rahmatdani123new@gmail.com', '082130954380', '3', '7', '6');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2223.02.014', 'RAESHA ADELVIRA ASTUTI', 'Ciamis', '2006-8-09', 'P', 'ecaraesha694@gmail.com', '082117365029', '3', '8', '6');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2223.02.016', 'RISNANDAR A PERMANA', 'Subang', '2006-5-14', 'L', 'eris18789@gmail.com', '083862930249', '3', '8', '6');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2223.03.001', 'AGENG MUHOLAPI', 'Subang', '2007-3-14', 'L', 'agengmuholapi@gmail.com', '085714558831', '3', '9', '6');
INSERT INTO `tb_siswa` (`nipd`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`, `id_kelas`, `id_jurusan`, `id_tahun`) VALUES ('2223.03.002', 'DENUR  ATIKAH', 'Subang', '2007-1-22', 'P', 'atikahdenur@gmail.com', '082121507367', '3', '9', '6');";

        $data = explode(";", $sql);
        foreach ($data as $d) {
            if (strlen($d) > 2) {
                $this->db->query($d);

                $last_id = $this->db->table('tb_siswa')->limit(1)->orderBy('id', 'DESC')->get()->getRowArray();
                $data_his = [
                    'id_siswa' => $last_id['id'],
                    'id_kelas' => $last_id['id_kelas'],
                    'id_jurusan' => $last_id['id_jurusan'],
                    'id_tahun' => $last_id['id_tahun'],
                ];

                $this->db->table('tb_siswa_history')->insert($data_his);
            }
        }
    }
}
