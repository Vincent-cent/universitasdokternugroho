<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumni;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        $alumnis = [
            [
                'name' => 'Jefrison Laoe',
                'angkatan' => 'Alumni PGSD UDN',
                'year_range' => '2018-2022',
                'photo' => 'Jeffison-Laoe.jpeg',
                'work_main' => 'ASN',
                'work_main_address' => 'Pemerintah Daerah',
                'work_secondary' => null,
                'work_secondary_desc' => null,
                'about' => 'Saya datang dari Kupang dengan harapan dan semangat, dan Universitas Doktor Nugroho Magetan menjadi rumah kedua saya. Ilmu dan pengalaman di UDN mengantarkan saya menjadi ASN seperti sekarang. Terima kasih UDN!',
            ],
            [
                'name' => 'Syukur Dhamiani',
                'angkatan' => 'Alumni Penjaskesrek',
                'year_range' => '2019-2023',
                'photo' => 'Syukur-Dahmiani.jpeg',
                'work_main' => 'Ratu Favorit Jawa Timur 2022',
                'work_main_address' => 'Jawa Timur',
                'work_secondary' => 'Content Creator',
                'work_secondary_desc' => 'Aktif di media sosial dan event-event budaya',
                'about' => 'Penjaskesrek UDN membentuk saya menjadi pribadi yang berani tampil, percaya diri, dan siap bersaing. Prestasi sebagai Ratu Favorit Jawa Timur 2022 tidak lepas dari dukungan kampus tercinta.',
            ],
            [
                'name' => 'Hansi Muler',
                'angkatan' => 'Alumni PGSD UDN',
                'year_range' => '2017-2021',
                'photo' => 'Hansi-Muler.jpeg',
                'work_main' => 'Guru PPPK 2024',
                'work_main_address' => 'SD Negeri',
                'work_secondary' => null,
                'work_secondary_desc' => null,
                'about' => 'Saya bersyukur menjadi bagian dari PGSD UDN. Lolos PPPK Guru 2024 adalah bukti nyata hasil dari pendidikan dan bimbingan terbaik dari para dosen.',
            ],
            [
                'name' => 'Dr. Andi Wijaya, S.Kom, M.T',
                'angkatan' => 'Angkatan 2015',
                'year_range' => '2015-2019',
                'photo' => null,
                'work_main' => 'Senior Software Engineer',
                'work_main_address' => 'Google Indonesia, Jakarta',
                'work_secondary' => 'Tech Consultant',
                'work_secondary_desc' => 'Memberikan konsultasi teknologi untuk startup',
                'about' => 'Alumni berprestasi yang sekarang bekerja di perusahaan teknologi multinasional. Aktif berkontribusi dalam pengembangan teknologi AI dan machine learning.',
            ],
            [
                'name' => 'Siti Nurhaliza, S.E, M.M',
                'angkatan' => 'Angkatan 2016',
                'year_range' => '2016-2020',
                'photo' => null,
                'work_main' => 'Finance Manager',
                'work_main_address' => 'Bank Mandiri, Surabaya',
                'work_secondary' => 'Financial Advisor',
                'work_secondary_desc' => 'Memberikan konsultasi keuangan pribadi dan bisnis',
                'about' => 'Lulusan terbaik fakultas ekonomi yang kini menjadi manajer keuangan di salah satu bank terbesar di Indonesia.',
            ],
            [
                'name' => 'Budi Santoso, S.T, M.Eng',
                'angkatan' => 'Angkatan 2014',
                'year_range' => '2014-2018',
                'photo' => null,
                'work_main' => 'Civil Engineer',
                'work_main_address' => 'PT Adhi Karya, Jakarta',
                'work_secondary' => null,
                'work_secondary_desc' => null,
                'about' => 'Insinyur sipil yang telah terlibat dalam berbagai proyek infrastruktur besar di Indonesia termasuk pembangunan jalan tol dan jembatan.',
            ],
            [
                'name' => 'Maya Putri, S.Psi, M.Psi',
                'angkatan' => 'Angkatan 2017',
                'year_range' => '2017-2021',
                'photo' => null,
                'work_main' => 'Clinical Psychologist',
                'work_main_address' => 'RS Dr. Soetomo, Surabaya',
                'work_secondary' => 'Motivational Speaker',
                'work_secondary_desc' => 'Memberikan seminar dan workshop tentang kesehatan mental',
                'about' => 'Psikolog klinis yang berdedikasi membantu pasien dengan berbagai masalah kesehatan mental. Juga aktif sebagai pembicara motivasi.',
            ],
            [
                'name' => 'Rizki Ramadhan, S.Kom, M.Kom',
                'angkatan' => 'Angkatan 2018',
                'year_range' => '2018-2022',
                'photo' => null,
                'work_main' => 'Data Scientist',
                'work_main_address' => 'Tokopedia, Jakarta',
                'work_secondary' => 'AI Researcher',
                'work_secondary_desc' => 'Penelitian di bidang Natural Language Processing',
                'about' => 'Data scientist muda yang passionate dalam bidang artificial intelligence dan big data analytics.',
            ],
            [
                'name' => 'Dewi Lestari, S.H, M.H',
                'angkatan' => 'Angkatan 2015',
                'year_range' => '2015-2019',
                'photo' => null,
                'work_main' => 'Corporate Lawyer',
                'work_main_address' => 'SSEK Law Firm, Jakarta',
                'work_secondary' => null,
                'work_secondary_desc' => null,
                'about' => 'Pengacara korporat yang menangani berbagai kasus hukum bisnis dan merger & acquisition untuk perusahaan besar.',
            ],
            [
                'name' => 'Ahmad Fauzi, S.Sos, M.Si',
                'angkatan' => 'Angkatan 2016',
                'year_range' => '2016-2020',
                'photo' => null,
                'work_main' => 'Public Relations Manager',
                'work_main_address' => 'PT Unilever Indonesia, Jakarta',
                'work_secondary' => 'Content Creator',
                'work_secondary_desc' => 'Membuat konten edukasi di media sosial',
                'about' => 'PR Manager yang berpengalaman dalam mengelola citra perusahaan dan komunikasi publik di perusahaan multinasional.',
            ],
        ];

        foreach ($alumnis as $alumni) {
            Alumni::create($alumni);
        }
    }
}