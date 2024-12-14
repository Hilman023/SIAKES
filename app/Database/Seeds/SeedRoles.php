<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedRoles extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Administrator',
            ],
            [
                'title' => 'Bendahara',
            ],
            [
                'title' => 'Kepsek',
            ],
        ];

        $this->db->table('tb_role')->insertBatch($data);
    }
}
