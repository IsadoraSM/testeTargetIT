<?php

use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sector = [
            'name' => 'Diretor'
        ];

        Sector::create($sector);
    }
}
