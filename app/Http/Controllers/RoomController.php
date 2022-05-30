<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //index
    public function index(){
        return view('index', [
            'rooms' => Room::all()
        ]);
    }

    public function show($id){
        /*
         {
            id:0,
            name:"209",
            height:0,
            width:0,
            devices:[
                {id:0, name:"", ...},
                {id:0, name:"", ...}
            ]
         }
        */

        $room = Room::find($id);
        $room["devices"] = $room->devices;

        return $room;


    }
}
