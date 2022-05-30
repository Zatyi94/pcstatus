<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new Room();
        $room->name = "209";
        $room->width = 800;
        $room->height = 1000;
        $room->save();

        $r2 = new Room();
        $r2->name = "101";
        $r2->width = 800;
        $r2->height = 600;
        $r2->save();
    }
}
