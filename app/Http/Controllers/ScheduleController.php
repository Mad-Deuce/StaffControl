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
        $firstDayOfMonth=date_create('2021-01-01');
        $lastDayOfMonth=date_create('2021-01-31');

        $findModes1 = Mode:: where('start_mode','>=', $firstDayOfMonth)->
                            where('end_mode','<=', $lastDayOfMonth)->get();
        if (isset($findModes1)) {
            foreach ($findModes1 as $findMode) {
                $i = date_create($findMode->start_mode);
                $k = date_create($findMode->end_mode);
                for ($i; $i<=$k; $i=date_add($i, date_interval_create_from_date_string("1 day"))) {
                    $findSchedule=Schedule::where('worker_id','=',$findMode->worker_id)->
                                            where('day_of_month','=',$i)->
                                            where('mode_code_id','=',$findMode->mode_code_id)->first();
                    if (isset($findSchedule)==false) {
                        $schedule = new Schedule();
                        $schedule->worker_id = $findMode->worker_id;
                        $schedule->day_of_month = $i;
                        $schedule->mode_code_id = $findMode->mode_code_id;
                        $schedule->save();
                    }
                }
                echo ('OK');
            }
        }

        $findModes2 = Mode:: where('start_mode','<', $firstDayOfMonth)->
                            where('end_mode','<=', $lastDayOfMonth)->get();
        if (isset($findModes2)) {
            foreach ($findModes2 as $findMode) {
                $i = $firstDayOfMonth;
                $k = date_create($findMode->end_mode);
                for ($i; $i<=$k; $i=date_add($i, date_interval_create_from_date_string("1 day"))) {
                    $findSchedule=Schedule::where('worker_id','=',$findMode->worker_id)->
                                            where('day_of_month','=',$i)->
                                            where('mode_code_id','=',$findMode->mode_code_id)->first();
                    if (isset($findSchedule)==false) {
                        $schedule = new Schedule();
                        $schedule->worker_id = $findMode->worker_id;
                        $schedule->day_of_month = $i;
                        $schedule->mode_code_id = $findMode->mode_code_id;
                        $schedule->save();
                    }
                }
                echo ('OK');
            }
        }

        $findModes3 = Mode:: where('start_mode','>=', $firstDayOfMonth)->
                            where('end_mode','>', $lastDayOfMonth)->get();
        if (isset($findModes3)) {
            foreach ($findModes3 as $findMode) {
                $i = date_create($findMode->start_mode);
                $k = $lastDayOfMonth;
                for ($i; $i<=$k; $i=date_add($i, date_interval_create_from_date_string("1 day"))) {
                    $findSchedule=Schedule::where('worker_id','=',$findMode->worker_id)->
                                            where('day_of_month','=',$i)->
                                            where('mode_code_id','=',$findMode->mode_code_id)->first();
                    if (isset($findSchedule)==false) {
                        $schedule = new Schedule();
                        $schedule->worker_id = $findMode->worker_id;
                        $schedule->day_of_month = $i;
                        $schedule->mode_code_id = $findMode->mode_code_id;
                        $schedule->save();
                    }
                }
                echo ('OK');
            }
        }

        $findModes4 = Mode:: where('start_mode','<', $firstDayOfMonth)->
                            where('end_mode','>', $lastDayOfMonth)->get();
        if (isset($findModes4)) {
            foreach ($findModes4 as $findMode) {
                $i = $firstDayOfMonth;
                $k = $lastDayOfMonth;
                for ($i; $i<=$k; $i=date_add($i, date_interval_create_from_date_string("1 day"))) {
                    $findSchedule=Schedule::where('worker_id','=',$findMode->worker_id)->
                                            where('day_of_month','=',$i)->
                                            where('mode_code_id','=',$findMode->mode_code_id)->first();
                    if (isset($findSchedule)==false) {
                        $schedule = new Schedule();
                        $schedule->worker_id = $findMode->worker_id;
                        $schedule->day_of_month = $i;
                        $schedule->mode_code_id = $findMode->mode_code_id;
                        $schedule->save();
                    }
                }
                echo ('OK');
            }
        }
        print_r($findModes1);
        echo ('<BR>');
        print_r($findModes2);
        echo ('<BR>');
        print_r($findModes3);
        echo ('<BR>');
        print_r($findModes4);
    }

}
