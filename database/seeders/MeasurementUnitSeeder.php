<?php

namespace Database\Seeders;

use App\Models\MeasurementUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $measurementUnits = [
        [
            'name' => 'Quintal',
            'abbreviation' => 'ql'
        ],
        [
            'name' => 'Tin',
            'abbreviation' => 'tn'
        ],
    ];
    public function run(): void
    {
        MeasurementUnit::insert($this->measurementUnits);
    }
}
