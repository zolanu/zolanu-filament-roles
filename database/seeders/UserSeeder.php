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
            $dc_user = User::create([
                'name' => $district->name . ' DC',
                'email' => strtolower($district->name) . '@example.email',
                'district_id' => $district->id,
                'password' => bcrypt(strtolower($district->name) . '@example.email'),
            ]);
            $dc_user->assignRole('district_council');
            $lc_user = User::create([
                'name' => $district->name . ' LC',
                'email' => strtolower($district->name) . 'lc@example.email',
                'district_id' => $district->id,
                'password' => bcrypt(strtolower($district->name) . 'lc@example.email'),
            ]);
            $lc_user->assignRole('local_council');
            // array_push($users,  [
            //     'name' => $district->name . ' DC',
            //     'email' => strtolower($district->name) . '@example.email',
            //     'district_id' => $district->id,
            //     'password' => bcrypt(strtolower($district->name) . '@example.email'),
            // ]);
        }
        // $data = User::insert($users);

    }
}
