<?php

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'name' => 'Sala 330',
                'local_id' => 1
            ],
            [
                'name' => 'Sala 335',
                'local_id' => 1
            ],
            [
                'name' => 'Sala 331',
                'local_id' => 1
            ],
            [
                'name' => 'Sala 338',
                'local_id' => 1
            ],
            [
                'name' => 'Sala 502',
                'local_id' => 2
            ],
            [
                'name' => 'Sala 510',
                'local_id' => 2
            ],
            [
                'name' => 'Sala 516',
                'local_id' => 2
            ],
            [
                'name' => 'Sala 101',
                'local_id' => 3
            ],
            [
                'name' => 'Sala 112',
                'local_id' => 3
            ],
            [
                'name' => 'Sala 120',
                'local_id' => 3
            ],
        ];

        foreach($rooms as $room) {
            Room::create($room);
        }
    }
}
