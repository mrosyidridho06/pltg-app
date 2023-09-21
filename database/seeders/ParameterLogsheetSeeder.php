<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ParameterLogsheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParameterLogsheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter = [
            [
                'nama_parameter' => 'GENERATOR',
                'jenis_logsheet_id'=> '3',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'nama_parameter' => 'ENGINE SYSTEM',
                'jenis_logsheet_id'=> '3',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'nama_parameter' => 'FUEL SYSTEM',
                'jenis_logsheet_id'=> '3',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'nama_parameter' => 'GLO SYSTEM',
                'jenis_logsheet_id'=> '3',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'nama_parameter' => 'TURBINE LUBE OIL SYSTEM',
                'jenis_logsheet_id'=> '3',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'nama_parameter' => 'VIBRATION SYSTEM',
                'jenis_logsheet_id'=> '3',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'nama_parameter' => 'AIR SYSTEM',
                'jenis_logsheet_id'=> '3',
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ];

        ParameterLogsheet::insert($parameter);
    }
}
