<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed Users
        $this->db->table('users')->insertBatch([
            [
                'name' => 'Admin Wisata',
                'email' => 'admin@wisatadesa.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'User Wisata',
                'email' => 'user@wisatadesa.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);

        // Seed Desa
        $this->db->table('desa')->insertBatch([
            [
                'name' => 'Desa Wisata Penglipuran',
                'location' => 'Bali, Indonesia',
                'description' => 'Desa wisata tradisional dengan arsitektur Bali yang masih kental.',
                'photo' => 'penglipuran.jpg',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Desa Wisata Ubud',
                'location' => 'Ubud, Bali',
                'description' => 'Desa seni dan budaya dengan terasering sawah yang indah.',
                'photo' => 'ubud.jpg',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);

        // Seed Paket
        $this->db->table('paket')->insertBatch([
            [
                'desa_id' => 1,
                'name' => 'Paket Tour Lengkap',
                'price' => 500000,
                'description' => 'Paket wisata lengkap dengan pemandu dan akomodasi.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'desa_id' => 2,
                'name' => 'Paket Trekking Sawah',
                'price' => 300000,
                'description' => 'Paket trekking melalui terasering sawah yang indah.',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);

        // Seed Event
        $this->db->table('event')->insertBatch([
            [
                'name' => 'Festival Budaya Desa',
                'date' => date('Y-m-d', strtotime('+30 days')),
                'description' => 'Festival budaya tahunan dengan pertunjukan tradisional.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lomba Pertanian',
                'date' => date('Y-m-d', strtotime('+60 days')),
                'description' => 'Lomba hasil pertanian terbaik se-desa.',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}