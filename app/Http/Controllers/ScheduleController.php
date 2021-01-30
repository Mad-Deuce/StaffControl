<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function showAll(){
        //$workers=Worker::all();
        $workers = DB::select(' select  workers.id,
                                        surname, (substring (name,1,1)||\'.\'|| substring (patronymic,1,1)||\'.\') as initials,
                                        positions.short_title as position
                                from workers
                                join positions
                                on workers.position_id=positions.id
                                where workers.deleted_at IS NULL');
        return view('Schedule.showAll', ['workers'=>$workers]);
    }
}
