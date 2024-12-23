<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class All extends Seeder
{
  public function run()
  {
    $this->call('SeedRoles');
    $this->call('SeedUsers');
    $this->call('SeedTbMasterKategori');
    $this->call('SeedTbTransaksiKategori');
    $this->call('SeedTbJenisTransaksi');
    $this->call('SeedTbSiswa');
  }
}
