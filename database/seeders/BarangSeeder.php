<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
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
                'nama' => 'Cangkul', 
                'jumlah' => '10',
                'gambar' => 'Cangkul.jpeg',
            ],
            [
                'nama' => 'Sabit', 
                'jumlah' => '10',
                'gambar' => 'SABIT.jpeg',
            ],
            [
                'nama' => 'Alat Pemotong Rumput', 
                'jumlah' => '10',
                'gambar' => 'PEMOTONG RUMPUT.jpg',
            ],
            [
                'nama' => 'Alat Jetor', 
                'jumlah' => '10',
                'gambar' => 'JETOR.jpg',
            ],
            [
                'nama' => 'Alat Semprot Pertanian', 
                'jumlah' => '10',
                'gambar' => 'ALAT SEMPROT.jpg',
            ],
        );
        foreach ($data as $d){
            Barang::create([
                'nama' => $d['nama'],
                'jumlah' => $d['jumlah'],
                'gambar' => $d['gambar']
            ]);
        }
    }
}
