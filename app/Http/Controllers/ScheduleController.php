<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function showAll(){
        $workers=Worker::all();
        return view('Schedule.showAll', ['workers'=>$workers]);
    }
}
