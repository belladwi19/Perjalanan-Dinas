<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Pegawai = [
            [
                'JenisKelamin'          => 'Laki-Laki',
                'NIK'                   => '012345678910',
                'NIP'                   => '012345678910',
                'NomorTelepon'          => '08123456789',
                'Alamat'                => 'Indonesia',
                'Foto'                  => 'User.png',
            ],
            [
                'JenisKelamin'          => 'Perempuan',
                'NIK'                   => '012345678910',
                'NIP'                   => '012345678910',
                'NomorTelepon'          => '08123456789',
                'Alamat'                => 'Surabaya',
                'Foto'                  => 'User.png',
            ],
            [
                'JenisKelamin'          => 'Perempuan',
                'NIK'                   => '012345678910',
                'NIP'                   => '012345678910',
                'NomorTelepon'          => '08123456789',
                'Alamat'                => 'Jakarta',
                'Foto'                  => 'User.png',
            ],
        ];

        foreach ($Pegawai as $key => $value) {
            Pegawai::create($value);
        }
    }
}
