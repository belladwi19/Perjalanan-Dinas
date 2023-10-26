<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $User = [
            [
                'name'          => 'admin',
                'email'         => 'admin@gmail.com',
                'id_pegawai'    => '1',
                'is_Admin'      => '0',
                'password'      => '12345678',
            ],
            [
                'name'          => 'tiara',
                'email'         => 'tiara@gmail.com',
                'id_pegawai'    => '2',
                'is_Admin'      => '1',
                'password'      => '12345678',
            ],
            [
                'name'          => 'ara',
                'email'         => 'ara@gmail.com',
                'id_pegawai'    => '3',
                'is_Admin'      => '2',
                'password'      => '12345678',
            ],
        ];

        foreach ($User as $key => $value) {
            User::create($value);
        }
    }
}
