<?php

namespace Database\Seeders;

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
        User::create([
            'name'      =>  'Caspar Lee',
            'email'     =>  'casplee@yahoo.com',
            'password'  =>  bcrypt('passsword1'),
        ]);

        User::factory(99)->create();
    }
}
