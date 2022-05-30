<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $device = new Device();
        $device->room_id = Room::where("name", "209")->first()->id;
        $device->status = "ok";
        $device->
            */
        $room_id = Room::where("name", "209")->first()->id;
        //MassAsignment
        //DB::table('devices')->insert(..);
        Device::insert([
            ['room_id'=>$room_id, 'name'=>'BOT209-001', 'status'=>'ok', 'width'=>100, 'height'=>50, 'x'=>100, 'y'=>100,
                'created_at'=>date('Y-m-d h:i:s'), 'updated_at'=>date('Y-m-d h:i:s')],
            ['room_id'=>$room_id, 'name'=>'BOT209-002', 'status'=>'need_repair', 'width'=>100, 'height'=>50, 'x'=>300, 'y'=>100,
                'created_at'=>date('Y-m-d h:i:s'), 'updated_at'=>date('Y-m-d h:i:s')],
            ['room_id'=>$room_id, 'name'=>'BOT209-003', 'status'=>'repair', 'width'=>100, 'height'=>50, 'x'=>500, 'y'=>100,
                'created_at'=>date('Y-m-d h:i:s'), 'updated_at'=>date('Y-m-d h:i:s')],
        ]);

        $room_id = Room::where("name", "101")->first()->id;
        Device::insert([
            ['room_id'=>$room_id, 'name'=>'PC_Zoli', 'status'=>'ok', 'width'=>100, 'height'=>50, 'x'=>100, 'y'=>100,
                'created_at'=>date('Y-m-d h:i:s'), 'updated_at'=>date('Y-m-d h:i:s')],
        ]);

    }
}
