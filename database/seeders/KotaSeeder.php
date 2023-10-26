<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kota;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kota = [
            [
                'namakota'          => 'Surabaya',
                'provinsi'          => 'Jawa Timur',
                'pulau'             => 'Jawa',
                'luarnegeri'        => 'Tidak',
                'latitude'          => '-7.250445',
                'longitude'         => '112.768845',
            ],
            [
                'namakota'          => 'Jakarta',
                'provinsi'          => 'DKi Jakarta',
                'pulau'             => 'Jawa',
                'luarnegeri'        => 'Tidak',
                'latitude'          => '-6.200000',
                'longitude'         => '106.816666',
            ],
            [
                'namakota'          => 'Trenggalek',
                'provinsi'          => 'Jawa Timur',
                'pulau'             => 'Jawa',
                'luarnegeri'        => 'Tidak',
                'latitude'          => '-8.086410',
                'longitude'         => '111.713127',
            ],
            [
                'namakota'          => 'Singapore',
                'provinsi'          => 'Singapore',
                'luarnegeri'        => 'Ya',
                'latitude'          => '1.29027',
                'longitude'         => '103.851959',
            ],
        ];
        foreach ($kota as $key => $value) {
            Kota::create($value);
        }
    }
}
