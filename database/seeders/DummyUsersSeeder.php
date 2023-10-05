<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PharIo\Manifest\Email;

class DummyUsersSeeder extends Seeder
{
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Kominfo User',
                'email' => 'user@gmail.com',
                'telephone' => '085726352614',
                'role' => 'user',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'Kominfo Admin',
                'email' => 'admin@gmail.com',
                'telephone' => '082126373214',
                'role' => 'admin',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'Kominfo Super Admin',
                'email' => 'superadmin@gmail.com',
                'telephone' => '087726359179',
                'role' => 'super admin',
                'password' => bcrypt('123')
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
