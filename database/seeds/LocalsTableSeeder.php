<?php

use Illuminate\Database\Seeder;
use App\Models\Local;

class LocalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locals = [
            [
                'name' => 'Bloco A'
            ],
            [
                'name' => 'Bloco B'
            ],
            [
                'name' => 'Bloco C'
            ],
        ];

        foreach($locals as $local) {
            Local::create($local);
        }
    }
}
