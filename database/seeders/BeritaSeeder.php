<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::factory()->count(100)->create();

        /*
        Berita::create([
            'title' => 'Universitas Dr. Nugroho Menggelar Wisuda Periode I Tahun 2025',
            'content' => 'Universitas Dr. Nugroho telah menyelenggarakan wisuda periode pertama tahun 2025 dengan meluluskan 450 mahasiswa dari berbagai program studi. Acara wisuda berlangsung meriah di Auditorium Utama kampus dengan menerapkan protokol kesehatan yang ketat.',
            'author' => 'Tim Humas UDN',
            'published_at' => now()->subDays(5),
            'image' => 'wisuda-2025.jpg',
            'keterangan_gambar' => 'Suasana wisuda periode I tahun 2025 di Auditorium Utama Universitas Dr. Nugroho',
        ]);

        Berita::create([
            'title' => 'Kerjasama Internasional dengan Universitas Malaysia',
            'content' => 'Universitas Dr. Nugroho menandatangani MoU kerjasama dengan Universitas Teknologi Malaysia dalam bidang penelitian dan pertukaran mahasiswa. Kerjasama ini diharapkan dapat meningkatkan kualitas pendidikan dan penelitian.',
            'author' => 'Prof. Dr. Ahmad Surya',
            'published_at' => now()->subDays(10),
            'image' => 'kerjasama-malaysia.jpg',
            'keterangan_gambar' => 'Penandatanganan MoU antara UDN dan Universitas Teknologi Malaysia',
        ]);

        Berita::create([
            'title' => 'Prestasi Mahasiswa UDN di Kompetisi Nasional',
            'content' => 'Tim mahasiswa Fakultas Teknik Universitas Dr. Nugroho berhasil meraih juara pertama dalam Kompetisi Robotika Nasional 2025. Prestasi ini membanggakan dan menunjukkan kualitas mahasiswa UDN di tingkat nasional.',
            'author' => 'Dr. Siti Aminah',
            'published_at' => now()->subDays(15),
            'image' => 'prestasi-robotika.jpg',
            'keterangan_gambar' => 'Tim robotika UDN saat menerima piala juara pertama',
        ]);

        Berita::create([
            'title' => 'Program Beasiswa Unggulan untuk Mahasiswa Berprestasi',
            'content' => 'Universitas Dr. Nugroho membuka program beasiswa unggulan untuk mahasiswa berprestasi dengan total dana 2 miliar rupiah. Program ini bertujuan untuk mendukung mahasiswa yang memiliki prestasi akademik dan non-akademik.',
            'author' => 'Biro Kemahasiswaan',
            'published_at' => now()->subDays(20),
            'image' => 'beasiswa-unggulan.jpg',
            'keterangan_gambar' => 'Pengumuman program beasiswa unggulan UDN',
        ]);

        Berita::create([
            'title' => 'Fasilitas Laboratorium Baru di Fakultas Kedokteran',
            'content' => 'Fakultas Kedokteran Universitas Dr. Nugroho meresmikan laboratorium anatomi dan patologi dengan teknologi terkini. Fasilitas ini dilengkapi dengan peralatan modern untuk mendukung pembelajaran mahasiswa kedokteran.',
            'author' => 'Dr. Budi Santoso, Sp.PA',
            'published_at' => now()->subDays(25),
            'image' => 'lab-kedokteran.jpg',
            'keterangan_gambar' => 'Suasana laboratorium anatomi yang baru diresmikan',
        ]);
        */
    }
}
