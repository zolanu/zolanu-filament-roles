<?php

namespace Database\Seeders;


use App\Models\Vegetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VegetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $vegetables = [
        [
            'name' => 'Sawhthing',
            'default_measurement_unit_id' => 1,
        ],

        [
            'name' => 'Hmunphiah',
            'default_measurement_unit_id' => 1,
        ],

        [
            'name' => 'Hmarcha',
            'default_measurement_unit_id' => 1,
        ],

        [
            'name' => 'Aieng',
            'default_measurement_unit_id' => 1,
        ],
    ];
    public function run(): void
    {
        Vegetable::insert($this->vegetables);
    }
}
