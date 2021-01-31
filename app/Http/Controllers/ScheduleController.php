<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\Schedule;
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

    public function add_from_modes(){
        //$schedule=new Schedule();
        $findModes = Mode::where('start_mode','>=', '2021-01-01')->where('end_mode','<=', '2021-01-31')->get()->toArray();
        print_r($findModes);
        echo ('<BR>');
        if (isset($findModes)) {
            foreach ($findModes as $findMode) {
                print_r($findMode);
                echo ('<BR>');
                $i = date_create($findMode['start_mode']);
                $k = date_create($findMode['end_mode']);
                print_r ($i);
                echo ('<BR>');
                print_r ($k);
                echo ('<BR>');
                $z=date_diff($i,$k)->d;
                print_r ($z);
                echo ('<BR>');
                //echo ($i=$findMode['end_mode']);
                for ($h= 1; $h<=7; $h++) {
                    $schedule=new Schedule();
                    $schedule->worker_id = $findMode['worker_id'];
                    $schedule->day_of_month = $i;
                    $schedule->mode_code_id = $findMode['mode_code_id'];
                    $schedule->save();
                    return ('OK');
                    $i=date_add($i, date_interval_create_from_date_string("1 day"));
                }
            }
        } else {
            return ('$findModes is null');
        }

    }

}
