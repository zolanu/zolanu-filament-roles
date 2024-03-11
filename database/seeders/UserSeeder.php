<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = District::all();
        $users = [];
        foreach ($districts as $district) {
            array_push($users,  [
                'name' => $district->name,
                'email' => strtolower($district->name) . '@example.email',
                'district_id' => $district->id,
                'password' => bcrypt(strtolower($district->name) . '@example.email'),
            ]);
        }
        $data = User::insert($users);
        logger($data);
    }
}
