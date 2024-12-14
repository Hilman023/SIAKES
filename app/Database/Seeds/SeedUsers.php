<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedUsers extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$j1DUadXW3FpeYAtRab7YXOmxdQSETLN7Pvza/ay3P9CX0TFi4KBzm',
                'image' => 'user.png',
                'role_id' => 1,
                'is_active' => 1,
            ],
            [
                'name' => 'bendahara',
                'username' => 'bendahara',
                'email' => 'bendahara@gmail.com',
                'password' => '$2y$10$j1DUadXW3FpeYAtRab7YXOmxdQSETLN7Pvza/ay3P9CX0TFi4KBzm',
                'image' => 'user.png',
                'role_id' => 2,
                'is_active' => 1,
            ],
            [
                'name' => 'kepsek',
                'username' => 'kepsek',
                'email' => 'kepsek@gmail.com',
                'password' => '$2y$10$j1DUadXW3FpeYAtRab7YXOmxdQSETLN7Pvza/ay3P9CX0TFi4KBzm',
                'image' => 'user.png',
                'role_id' => 3,
                'is_active' => 1,
            ],
        ];

        $this->db->table('tb_user')->insertBatch($data);
    }
}
