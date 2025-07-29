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
        User::factory(10)->create();
        $user = User::create([
                'name' => 'Daniel',
                'email' =>'danielpmensah926@gmail.com',
                'password' => 1234,
                'phone' => '1222222112',
                'type' => User::USER_TYPE_ADMIN
            ]);
    }
}
