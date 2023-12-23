<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = array(
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'nomorhp' => '085267816542',
                'alamat' => 'Jln Kampung Kubur',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );
        foreach($data AS $d){
            User::create([
                'name' => $d['name'],
                'username' => $d['username'],
                'email' => $d['email'],
                'nomorhp' => $d['nomorhp'],
                'alamat' => $d['alamat'],
                'password' => $d['password'],
                'role' => $d['role']
            ]);
        }
        $this->call(EdukasiSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(ProyekTaniSeeder::class);
    }


}
