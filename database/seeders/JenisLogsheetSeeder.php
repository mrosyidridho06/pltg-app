<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\JenisLogsheet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisLogsheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = [
            [
                'jenis_logsheet' => 'Logsheet HMI TM#1',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'jenis_logsheet' => 'Logsheet HMI TM#2',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'jenis_logsheet' => 'Logsheet Patrol Check',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'jenis_logsheet' => 'Checklist Start Mesin',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'jenis_logsheet' => 'Checklist Stop Mesin',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

        ];

        JenisLogsheet::insert($jenis);
    }
}
