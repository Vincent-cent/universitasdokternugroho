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
            [
                'name' => 'Linda Wijayanti, S.Farm, Apt',
                'angkatan' => 'Angkatan 2017',
                'year_range' => '2017-2021',
                'photo' => null,
                'work_main' => 'Clinical Pharmacist',
                'work_main_address' => 'RS Siloam, Surabaya',
                'work_secondary' => 'Health Blogger',
                'work_secondary_desc' => 'Menulis artikel kesehatan dan edukasi penggunaan obat',
                'about' => 'Apoteker klinis yang memberikan konsultasi penggunaan obat yang tepat kepada pasien di rumah sakit.',
            ],
            [
                'name' => 'Eko Prasetyo, S.Ds, M.Ds',
                'angkatan' => 'Angkatan 2018',
                'year_range' => '2018-2022',
                'photo' => null,
                'work_main' => 'UI/UX Designer',
                'work_main_address' => 'Gojek Indonesia, Jakarta',
                'work_secondary' => 'Freelance Designer',
                'work_secondary_desc' => 'Mengerjakan project design untuk berbagai startup',
                'about' => 'Desainer UI/UX yang telah membuat berbagai interface aplikasi mobile yang user-friendly dan menarik.',
            ],
            [
                'name' => 'Ratna Sari, S.Pd, M.Pd',
                'angkatan' => 'Angkatan 2014',
                'year_range' => '2014-2018',
                'photo' => null,
                'work_main' => 'Kepala Sekolah',
                'work_main_address' => 'SMAN 1 Surabaya',
                'work_secondary' => 'Education Consultant',
                'work_secondary_desc' => 'Konsultan pendidikan untuk sekolah-sekolah',
                'about' => 'Pendidik berdedikasi yang kini menjabat sebagai kepala sekolah dan aktif dalam pengembangan kurikulum pendidikan.',
            ],
        ];

        foreach ($alumnis as $alumni) {
            Alumni::create($alumni);
        }
    }
}