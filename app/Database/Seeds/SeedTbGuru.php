<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedTbGuru extends Seeder
{
    public function run()
    {
        $sql = "INSERT INTO `tb_guru` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `email`, `no_hp`) VALUES
	('3213262002230001', 'GINA ABIDIN, S.Pd', 'Subang', '1989-09-27', 'Perempuan', 'ginaabidin2@gmail.com', '081382541384'),
	('3213262002230002', 'ATIN ROHAENI, S.Pd', 'Subang', '1993-09-27', 'Perempuan', 'atinrohaeni93@gmail.com', '085221359007'),
	('1602022705990002', 'MUKSIN, S.Pd', 'Tanjung Baru', '1999-05-25', 'Laki-laki', 'muksinadithya@gmai.com', '082115896770'),
	('3213261803940002', 'ROBI AHMADI', 'Kota Baru', '1994-03-18', 'Laki-laki', 'ahmadirobbi10@gmail.com', '081394440445');";
        $this->db->query($sql);
    }
}
