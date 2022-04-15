<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'johndoe',
                'email' => 'johndoe@aol.net',
                'password' => Hash::make('123')
            ],
            [
                'name' => 'helloworld',
                'email' => 'helloworld@aol.net',
                'password' => Hash::make('123')
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
