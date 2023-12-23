<?php

namespace Database\Seeders;

use App\Models\ProyekTani;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyekTaniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'judul' => 'PEMBANGUNAN DAM PARIT DESA SIPITUHUTA KECAMATAN POLLUNG', 
                'gambar' => 'Proyek Dam.jpeg',
                'deskripsi' => 'Pada Hari Selasa,25 Mei 2021 bertempat di kantor Dinas Pertanian Kabupaten Humbang Hasundutan, yang bertanda tangan dibawah ini:

                1.
                
                Nama : Ir. Junter Marbun, MM
                
                Jabatan : Kepala Dinas Pertanian Selaku Pengguna Anggaran
                
                NIP : 19670409.199320.1.001
                
                Alamat : Kantor Dinas Pertanian Kabupaten Humbang Hasundutan Disebut Sebagai PIHAK PERTAMA
                
                2.
                
                Nama : Edy Jodi Lumbang Gaol
                
                NIK : 1216021608630001
                
                Jabatan : Pimpinan Maduma Tani SK Kelompok Tani : 401/2011/Sk/VI/2016 Akte Notaris : No.11 Tahun 2019 Notaris Anggiat Mikael Pasribu,SH.M.Kn
                
                Alamat : Dusun III Desa SIPITUHUTA
                
                Disebut Sebagai PIHAK KEDUA Berdasarkan rencana kerja dinas pertanian kabupaten Humbang Hasundutan untuk Tahun Anggaran 2021 merencanakan kegiatan swakelola berupa Pembangunan Dam Parit dengan kelompok Masyarakat yang memiliki kompetensi dalam melaksanakan kegiatan dan sanggup menerima, melaksanakan pengadaan barang/jasa melalui swakelola. Dalam hal melakukan kerjasama pelaksanaan kegiatan swakelola Tipe IV sesuai Rencana Kerja Dinas Pertanian Kabupaten Humbang Hasundutan, atas dasar pertimbangan yang diuraikan tesebut, Para Pihak menerangkan dengan ini telah sepakat dan setuju untuk mengadakan Nota kesepahaman yang saling menguntungkan kedua belah pihak dengan ketentuan-ketentuan dan syarat-syarat sebagai berikut : PASAL 1 Nota kesepahaman ini adalah Langkah awal dalam rangka usaha Kerjasama yang saling menguntungkan dengan memanfaatkan potensi, keahlian dan fasilitas yang dimiliki masing-masing pihak dalam Pembangunan Dam Parit Desa Sipituhuta Kecamatan Pollung PASAL 2 Ruang lingkup Pekerjaaan yang disepakati dalam Nota Kesepahaman ini adalah sebagai berikut:
                
                1. Pekerjaan persiapan
                
                2. Pembanguna Dam Parit
                
                3. Pekerjaan Saluran
                
                4. Pemeliharaan Bangunan Dam Parit
                
                untuk selanjutnya PASAL 3 Untuk melaksanakan satuan pekerjaan pada pasal 2 diatas, Para PIHAK menindaklanjuti dengan membuat Kontrak/Perjanjian Kerjasama yang dilakukan oleh Pejabat Pembuat Komitmen(PKK) penanggung jawab anggaran dari pihak pertama dengan ketua Tim Pelakasana Swakelola Tipe IV yakni ketua kelompok Maduma Tani dari pihak kedua,yang membuat hak dan kewajiban, kedudukan tugas serta peran dari fungsi dari PKK penganggung jawab anggaran dan ketua Tim Pelaksana Swakelola Tipe IV Kelompok Tani dari Pihak Kedua. PASAL 4 Biaya yang timbul atas Nota kesepahaman ini akan ditanggung masing-masing oleh Para PIHAK Demikian surat pernyataan mengenai Proyek Pembangunan DAM PARIT berdasarkan Rencana Kerja Dinas Pertanian Kabupaten Humbang Hasundutan Tahun Anggaran 2021, Surat tersebut tertanda tangan oleh Pihak PERTAMA dan PIhak KEDUA.',
            ],
            [
                'judul' => 'PEMELIHARAAN TERNAK KERBAU DESA SIPITUHUTA KECAMATAN POLLUNG', 
                'gambar' => 'Proyek Kerbau.jpeg',
                'deskripsi' => 'Berdasarkan Rencana kerja dinas pertanian Kabupaten Humbang Hasundutan untuk Tahun Anggaran 2021 rencana kegiatan Pemeliharaan ternak kerbau dengan kelompok masyarakat yang memiliki kompetensi dalam pemeliharaaan Ternak dan menerima, melaksanakan pemeliharaan ternak Dalam hal melakukan Kerjasama Pemeliharaan ternak,Dinas Pertanian Kabupaten 
                Humbang Hasundutan memberikan sumbangan ternak berupa 5 ekor kerbau yang dipelihara ,dimana hewan ternak tersebut d
                ipercayakan dipelihara kepada pihak-pihak yang dipastikan memiliki kompetensi dan berbobot dalam pada bidang ini. 
                Hasil pemeliharaan ternak kerbau tersebut nantinya akan dibagi setara/sebanding, dengan ketentuan jika ternak tersebut berproduksi maka anak dari inang ternak tersebut akan diberikan kepada pihak yang merawat ternak. Hal ini disetujui oleh semua pihak anggota dan pengurus kelompok tani.',
            ],
            [
                'judul' => 'PENANAMAN BIBIT BAWANG DESA SIPITUHUTA KECAMATAN POLLUNG', 
                'gambar' => 'Proyek Bawang.jpeg',
                'deskripsi' => 'Berdasarkan Rencana kerja dinas pertanian Kabupaten Humbang Hasundutan untuk Tahun Anggaran 2021 rencana kegiatan penanaman bibit 
                bawang sebanyak 150kg dengan kelompok masyarakat yang memiliki kompetensi dalam Pengembangan sumber daya bawang dari 
                desa sipituhuta Dengan adanya penanaman bawang di wilayah desa sipituhuta sekaligus sebagai wadah percobaan penanaman dan 
                pengembangan bawang,berdasarkan uji coba penanaman tani tersebut diperoleh hasil yang memuaskan dimana pada awalnya bantuan 
                bibit yang diberikan sebanyak 150 kg dan memperoleh hasil sebanyak 500kg bawang Lahan yang digunakan sebagai media penanaman 
                bawang yaitu lahan dari Bpk. Lamsihar Lumban Gaol, dengan percobaan penanaman bawang tersebut dapat dipastikan bahwa di Desa 
                Sipituhuta bawang dapat tumbuh dan berkembang.',
            ],
        );
        foreach ($data as $d){
            ProyekTani::create([
                'judul' => $d['judul'],
                'gambar' => $d['gambar'],
                'deskripsi' => $d['deskripsi']
            ]);
        }
    }
}
