<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataAccount = [
            'nama' =>'Dafa Aqila Rabbani',
            'username' => 'Admin',
            'alamat' => 'Saudi Arabia RT01/04',
            'tgl_lahir' => '2024-01-01',
            'jenis_kelamin' => 'Laki-Laki',
            'role' => 'admin',
            'password' => bcrypt('123'),
        ];
        User::create($dataAccount);
    }
}
