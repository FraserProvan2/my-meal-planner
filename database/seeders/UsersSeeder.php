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
                'name' => 'tig',
                'email' => 'rockchik31@aol.net',
                'password' => Hash::make('123123123')
            ],
            [
                'name' => 'jer',
                'email' => 'pophunk31@aol.net',
                'password' => Hash::make('123123123')
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
