<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function showAll(){
        //$workers=Worker::all();
        $workers = DB::select('select id, surname, (substring (name,1,1)||\'.\'|| substring (patronymic,1,1)||\'.\') as initials from workers');
        return view('Schedule.showAll', ['workers'=>$workers]);
    }
}
