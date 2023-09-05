<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shift = [
            [
                'nama_shift' => "Shift 1",
                'shift_awal' => new Carbon('08:00:00'),
                'shift_akhir' => new Carbon('15:00:00'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'nama_shift' => "Shift 2",
                'shift_awal' => new Carbon('15:00:00'),
                'shift_akhir' => new Carbon('22:00:00'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'nama_shift' => "Shift 3",
                'shift_awal' => new Carbon('22:00:00'),
                'shift_akhir' => new Carbon('08:00:00'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]
        ];

        Shift::insert($shift);
    }
}
