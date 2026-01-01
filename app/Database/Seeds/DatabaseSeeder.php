<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ==========================================
        // SEED USERS TABLE
        // ==========================================
        
        // Password: password123 (di-hash dengan bcrypt)
        $hashedPassword = password_hash('password123', PASSWORD_DEFAULT);
        
        $users = [
            [
                'name'       => 'Admin Wisata',
                'email'      => 'admin@wisatadesa.com',
                'password'   => $hashedPassword,
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'User Wisata',
                'email'      => 'user@wisatadesa.com',
                'password'   => $hashedPassword,
                'role'       => 'user',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Cek apakah user sudah ada untuk mencegah duplikat
        $this->db->table('users')->emptyTable();
        
        foreach ($users as $user) {
            $this->db->table('users')->insert($user);
        }

        echo "✅ Users berhasil di-seed!\n";

        // ==========================================
        // SEED DESA TABLE
        // ==========================================
        
        $desa = [
            [
                'name'        => 'Desa Wisata Penglipuran',
                'location'    => 'Bali, Indonesia',
                'description' => 'Desa wisata tradisional dengan arsitektur Bali yang masih kental. Jelajahi rumah-rumah bersejarah dan tradisi lokal yang masih dilestarikan.',
                'photo'       => 'penglipuran.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Desa Wisata Ubud',
                'location'    => 'Ubud, Bali',
                'description' => 'Desa seni dan budaya dengan terasering sawah yang indah. Nikmati keindahan alam dan seniman lokal yang bekerja di desa ini.',
                'photo'       => 'ubud.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('desa')->emptyTable();
        
        foreach ($desa as $item) {
            $this->db->table('desa')->insert($item);
        }

        echo "✅ Desa berhasil di-seed!\n";

        // ==========================================
        // SEED PAKET TABLE
        // ==========================================
        
        $paket = [
            [
                'desa_id'     => 1,
                'name'        => 'Paket Tour Lengkap',
                'price'       => 500000,
                'description' => 'Paket wisata lengkap dengan pemandu berpengalaman dan akomodasi bintang tiga. Durasi 3 hari 2 malam dengan semua fasilitas lengkap.',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'desa_id'     => 2,
                'name'        => 'Paket Trekking Sawah',
                'price'       => 300000,
                'description' => 'Paket trekking melalui terasering sawah yang indah. Jelajahi keindahan alam sambil belajar tentang pertanian lokal. Termasuk makan siang tradisional.',
                'created_at'  => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('paket')->emptyTable();
        
        foreach ($paket as $item) {
            $this->db->table('paket')->insert($item);
        }

        echo "✅ Paket berhasil di-seed!\n";

        // ==========================================
        // SEED EVENT TABLE
        // ==========================================
        
        $event = [
            [
                'name'        => 'Festival Budaya Desa',
                'date'        => date('Y-m-d', strtotime('+30 days')),
                'description' => 'Festival budaya tahunan dengan pertunjukan tradisional, pameran kerajinan lokal, dan hidangan kuliner khas desa. Jangan lewatkan event terbesar tahun ini!',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Lomba Pertanian',
                'date'        => date('Y-m-d', strtotime('+60 days')),
                'description' => 'Lomba hasil pertanian terbaik se-desa dengan hadiah menarik. Menampilkan hasil panen terbaik dan produk olahan pertanian lokal.',
                'created_at'  => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('event')->emptyTable();
        
        foreach ($event as $item) {
            $this->db->table('event')->insert($item);
        }

        echo "✅ Event berhasil di-seed!\n";

        // ==========================================
        // SUMMARY
        // ==========================================
        
        echo "\n";
        echo "========================================\n";
        echo "✅ DATABASE SEEDING SELESAI!\n";
        echo "========================================\n";
        echo "\n";
        echo "📊 Data yang di-seed:\n";
        echo "   • Users: 2 akun (admin & user)\n";
        echo "   • Desa: 2 desa wisata\n";
        echo "   • Paket: 2 paket wisata\n";
        echo "   • Event: 2 event mendatang\n";
        echo "\n";
        echo "🔑 Kredensial Login:\n";
        echo "   Email    : admin@wisatadesa.com\n";
        echo "   Password : password123\n";
        echo "   Role     : admin\n";
        echo "\n";
        echo "   atau\n";
        echo "\n";
        echo "   Email    : user@wisatadesa.com\n";
        echo "   Password : password123\n";
        echo "   Role     : user\n";
        echo "\n";
    }
}