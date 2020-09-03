<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [
                'name' => 'Master'
            ],
            [
                'name' => 'Usuário'
            ],
        ];

        foreach($profiles as $profile) {
            Profile::create($profile);
        }
    }
}
