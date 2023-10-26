<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Perjalanan;

class PerjalananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perjalanan = [
            [
                'keterangan'          => 'Kunjungan rutin',
                'tanggalberangkat'    => '2023-08-10',
                'tanggalpulang'       => '2023-08-15',
                'kotaasal'            => 'Surabaya',
                'kotatujuan'          => 'Jakarta',
                'durasi'              => '5',
                'id_user'             => '2',
                'status'              => 'Pending',
                'jarak'               => '720',
                'uangsaku'            => '1500000',
            ],
            [
                'keterangan'          => 'Nego Program Kemitraan',
                'tanggalberangkat'    => '2023-08-10',
                'tanggalpulang'       => '2023-08-12',
                'kotaasal'            => 'Ponorogo',
                'kotatujuan'          => 'Surabaya',
                'durasi'              => '2',
                'id_user'             => '3',
                'status'              => 'Pending',
                'jarak'               => '60',
                'uangsaku'            => '500000',
            ],
        ];

        foreach ($perjalanan as $key => $value) {
            Perjalanan::create($value);
        }
    }
}
