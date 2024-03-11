<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $districtNames = [
        [
            'name' => 'Aizawl',
        ],
        [
            'name' => 'Hnahthial',
        ],
        [
            'name' => 'Kolasib',
        ],
        [
            'name' => 'Lunglei',
        ],
        [
            'name' => 'Saiha',
        ],
        [
            'name' => 'Serchhip',
        ],
        [
            'name' => 'Champhai',
        ],
        [
            'name' => 'Khawzawl',
        ],
        [
            'name' => 'Lawngtlai',
        ],
        [
            'name' => 'Mamit',
        ],
        [
            'name' => 'Saitual',
        ],
    ];
    public function run(): void
    {
        District::insert($this->districtNames);
        // foreach ($this->districtNames as $district) {
        //     District::create(['name' => $district]);
        // }
    }
}
