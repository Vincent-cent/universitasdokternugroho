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

        $beritas = [
            [
                'title' => 'Universitas Dr. Nugroho Raih Akreditasi A dari BAN-PT',
                'content' => 'Universitas Dr. Nugroho berhasil meraih akreditasi A dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) untuk periode 2025-2030. Pencapaian ini merupakan hasil dari peningkatan kualitas pendidikan, penelitian, dan pengabdian masyarakat yang terus dilakukan oleh seluruh civitas akademika. Rektor menyampaikan bahwa akreditasi A ini menjadi bukti komitmen universitas dalam memberikan pendidikan berkualitas tinggi.',
                'author' => 'Prof. Dr. Ahmad Nugroho, M.Sc',
                'published_at' => now()->subDays(2),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'Mahasiswa UDN Juara 1 Kompetisi Startup Nasional 2025',
                'content' => 'Tim mahasiswa dari Fakultas Ekonomi dan Bisnis Universitas Dr. Nugroho berhasil meraih juara pertama dalam Kompetisi Startup Nasional 2025 yang diikuti oleh 150 tim dari berbagai universitas di Indonesia. Startup mereka yang bernama "EduTech Solution" menawarkan platform pembelajaran digital berbasis AI yang inovatif. Mereka mendapatkan hadiah uang tunai sebesar 100 juta rupiah dan kesempatan inkubasi bisnis.',
                'author' => 'Dr. Siti Rahayu, M.M',
                'published_at' => now()->subDays(5),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'Peluncuran Program Studi Baru: Teknik Kecerdasan Buatan',
                'content' => 'Universitas Dr. Nugroho resmi meluncurkan program studi baru Teknik Kecerdasan Buatan (Artificial Intelligence) untuk jenjang S1 yang akan mulai menerima mahasiswa baru pada tahun akademik 2025/2026. Program studi ini dirancang untuk memenuhi kebutuhan industri 4.0 dan mencetak lulusan yang kompeten di bidang AI, machine learning, dan data science. Kurikulum disusun bersama dengan praktisi industri teknologi terkemuka.',
                'author' => 'Prof. Ir. Bambang Suryanto, Ph.D',
                'published_at' => now()->subDays(7),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'UDN Gelar Seminar Internasional tentang Sustainable Development',
                'content' => 'Universitas Dr. Nugroho menyelenggarakan Seminar Internasional dengan tema "Sustainable Development Goals: Challenges and Opportunities" yang dihadiri oleh 500 peserta dari 15 negara. Seminar ini menghadirkan pembicara dari UNESCO, World Bank, dan berbagai universitas ternama dunia. Acara berlangsung selama 3 hari dan membahas isu-isu pembangunan berkelanjutan, perubahan iklim, dan inovasi teknologi hijau.',
                'author' => 'Dr. Maya Kusuma, M.Si',
                'published_at' => now()->subDays(10),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'Kerjasama dengan Industri: Program Magang untuk 200 Mahasiswa',
                'content' => 'Universitas Dr. Nugroho menandatangani kerjasama dengan 25 perusahaan multinasional untuk program magang mahasiswa. Sebanyak 200 mahasiswa dari berbagai fakultas akan mendapatkan kesempatan magang selama 6 bulan di perusahaan-perusahaan terkemuka seperti Google Indonesia, Tokopedia, Bank Mandiri, dan Unilever. Program ini bertujuan untuk meningkatkan daya saing lulusan dan memberikan pengalaman kerja nyata.',
                'author' => 'Drs. Agus Widodo, M.M',
                'published_at' => now()->subDays(12),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'Dosen UDN Raih Hibah Penelitian Internasional Rp 2 Miliar',
                'content' => 'Dr. Rina Safitri, dosen Fakultas Sains dan Teknologi, berhasil mendapatkan hibah penelitian dari European Research Council senilai 2 miliar rupiah untuk penelitian tentang nanoteknologi dalam pengobatan kanker. Penelitian ini akan dilakukan bersama dengan tim peneliti dari University of Oxford dan akan berlangsung selama 3 tahun. Ini merupakan pencapaian luar biasa yang mengangkat nama UDN di kancah internasional.',
                'author' => 'Prof. Dr. Hendra Gunawan',
                'published_at' => now()->subDays(15),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'Pembangunan Gedung Perpustakaan Modern Senilai Rp 50 Miliar',
                'content' => 'Universitas Dr. Nugroho memulai pembangunan gedung perpustakaan modern 8 lantai dengan investasi 50 miliar rupiah. Perpustakaan baru ini akan dilengkapi dengan teknologi digital library, ruang baca yang nyaman dengan kapasitas 1000 orang, area diskusi, cafe, dan fasilitas multimedia. Diharapkan perpustakaan ini akan menjadi pusat pembelajaran dan riset yang mendukung kegiatan akademik mahasiswa dan dosen. Target penyelesaian adalah Desember 2025.',
                'author' => 'Ir. Sudirman, M.T',
                'published_at' => now()->subDays(18),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'Festival Seni dan Budaya: Pameran Karya Mahasiswa UDN',
                'content' => 'Fakultas Seni dan Desain Universitas Dr. Nugroho menggelar Festival Seni dan Budaya tahunan yang menampilkan lebih dari 200 karya mahasiswa meliputi lukisan, patung, fotografi, desain grafis, dan instalasi seni. Acara ini dibuka untuk umum secara gratis dan berlangsung selama seminggu. Festival ini juga dimeriahkan dengan pertunjukan musik, tari, dan teater dari mahasiswa. Diharapkan acara ini dapat menjadi ajang apresiasi seni sekaligus promosi talenta mahasiswa.',
                'author' => 'Dr. Anindita Putri, S.Sn, M.Sn',
                'published_at' => now()->subDays(20),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'Program Beasiswa Penuh untuk 50 Mahasiswa Kurang Mampu',
                'content' => 'Yayasan Pendidikan Dr. Nugroho mengumumkan program beasiswa penuh untuk 50 mahasiswa baru yang berasal dari keluarga kurang mampu namun memiliki prestasi akademik yang baik. Beasiswa ini mencakup biaya kuliah, uang saku bulanan, biaya buku, dan biaya hidup selama 4 tahun masa studi. Pendaftaran beasiswa dibuka mulai 1 Februari hingga 31 Maret 2025. Program ini merupakan wujud komitmen universitas dalam pemerataan akses pendidikan berkualitas.',
                'author' => 'Dra. Fitria Handayani, M.Pd',
                'published_at' => now()->subDays(23),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
            [
                'title' => 'Tim Robotika UDN Wakili Indonesia di Kompetisi Internasional',
                'content' => 'Tim Robotika Universitas Dr. Nugroho berhasil lolos seleksi nasional dan akan mewakili Indonesia dalam RoboCup 2025 yang akan diselenggarakan di Tokyo, Jepang. Tim yang beranggotakan 8 mahasiswa dari Fakultas Teknik ini akan berkompetisi dengan 100 tim dari 40 negara. Mereka telah mempersiapkan robot humanoid yang mampu bermain sepak bola secara otonom. Universitas memberikan dukungan penuh untuk persiapan dan biaya perjalanan tim.',
                'author' => 'Prof. Dr. Eng. Taufik Rahman',
                'published_at' => now()->subDays(28),
                'image' => null,
                'keterangan_gambar' => null,
                'show' => true,
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
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
