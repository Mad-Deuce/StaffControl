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

        $firstDayOfMonth =  date_create('2021-01-01');
        $lastDayOfMonth  =  date_create('2021-01-31');

        print_r ($firstDayOfMonth);
        echo ('<BR>');
        print_r ($lastDayOfMonth);
        echo ('<BR>');

        //start
        $findModes1 = Mode:: where('start_mode','>=', $firstDayOfMonth)->
                             where('end_mode','<=', $lastDayOfMonth)->get();
        $findModes2 = Mode:: where('start_mode','<', $firstDayOfMonth)->
                             where('end_mode','>', $lastDayOfMonth)->get();
        $findModes3 = Mode:: where('start_mode','<', $firstDayOfMonth)->
                             where('end_mode','<=', $lastDayOfMonth)->
                             where('end_mode','>=', $firstDayOfMonth)->get();
        $findModes4 = Mode:: where('start_mode','>=', $firstDayOfMonth)->
                             where('start_mode','<=', $lastDayOfMonth)->
                             where('end_mode','>', $lastDayOfMonth)->get();
        $findModes=$findModes1->merge($findModes2)->merge($findModes3)->merge($findModes4);
        print_r($findModes->toArray());
        echo ('<BR>');

        if (isset($findModes)) {
            foreach ($findModes as $findMode) {
                echo ('foreach');
                print_r ($firstDayOfMonth);
                echo ('<BR>');
                print_r($findMode->start_mode);
                echo ('<BR>');

                if (date_create($findMode->start_mode) < $firstDayOfMonth){
                    $i = ($firstDayOfMonth); //Блять, пиздец, нихуя не пойму
                } else {
                    $i = date_create($findMode->start_mode);
                }

                if (date_create($findMode->end_mode) > $lastDayOfMonth){
                    $k = ($lastDayOfMonth);  //Блять, пиздец, нихуя не пойму
                } else {
                    $k = date_create($findMode->end_mode);
                }
                echo ('<BR>');
                print_r ($i);
                echo ('<BR>');
                print_r ($k);
                echo ('<BR>');

                for ($i; $i<=$k; $i=date_add($i, date_interval_create_from_date_string("1 day"))) {
                    $findSchedule=Schedule::where('worker_id', $findMode->worker_id)->
                                            where('day_of_month', $i)->
                                            where('mode_code_id', $findMode->mode_code_id)->first();

                    if (!isset($findSchedule)) {
                        $schedule = new Schedule();
                        $schedule->worker_id = $findMode->worker_id;
                        $schedule->day_of_month = $i;
                        $schedule->mode_code_id = $findMode->mode_code_id;
                        $schedule->save();
                    }
                }
                echo ('OK');
                echo ('<BR>');
            }
        }
        //end
    }

}
