<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
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
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password' => Hash::make('password'),
            ],
            [
                'id'             => 2,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password' => Hash::make('password'),
            ],
        ];

        User::insert($users);

    }
}
