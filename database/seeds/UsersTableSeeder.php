<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'phone' => '(27)99999-9999',
            'password' => Hash::make('admin123456'),
            'profile_id' => 1,
            'sector_id' => 1,
        ];

        User::create($user);
    }
}
