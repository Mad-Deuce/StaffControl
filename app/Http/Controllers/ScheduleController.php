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

        //Вариант 1 - есть возможность осортировать по табельному номеру
        $schedules = DB::select('SELECT * FROM public.view_schedules');

        $schedulesArray[] = array (
            array(  'id'=>"",
                    'name'=>"",
                    'position'=>"",
                    'modes'=>array(),
                    'sum'=>"",
                )
        );

        foreach ($schedules as $schedule) {

            //Вариант 1
            $arrID=     ($schedule->wid);
            $arrName=   ($schedule->wsurname).' '.
                        mb_substr($schedule->wname,0,1,'UTF-8').'.'.
                        mb_substr($schedule->wpatronymic,0,1,'UTF-8').'.';
            $arrPosition=($schedule->wposition);

            $arrDOM=($schedule->dofmonth);
            $arrCode=($schedule->mcodes);

            if (!array_key_exists($arrID,$schedulesArray)) {
                $arrSum=0;
                if ($arrCode==='Р'){
                    $arrCode=8;
                    $arrSum=$arrSum+$arrCode;
                }
                $schedulesArray[$arrID]['id']=$arrID;
                $schedulesArray[$arrID]['name']=$arrName;
                $schedulesArray[$arrID]['position']=$arrPosition;
                $schedulesArray[$arrID]['modes'][$arrDOM]=$arrCode;
                $schedulesArray[$arrID]['sum']=$arrSum;
            } else {
                if ($arrCode==='Р'){
                    $arrCode=8;
                    $arrSum=$arrSum+$arrCode;
                }
                $schedulesArray[$arrID]['modes'][$arrDOM]=$arrCode;
                $schedulesArray[$arrID]['sum']=$arrSum;
            }

        }

        unset($schedulesArray[0]);          //Удаляет элемент с индексом "0", остальные индексы не меняются

        return view('Schedule.showAll', ['schedulesArray'=>$schedulesArray]);
    }






    public function add_from_modes(){

        $firstDayOfMonth =  date_create('2021-01-01');
        $lastDayOfMonth  =  date_create('2021-01-31');

        print_r ($firstDayOfMonth);
        echo ('<BR>');
        print_r ($lastDayOfMonth);
        echo ('<BR>');

        $findModes = Mode::  where('start_mode','<=', $lastDayOfMonth)->
                             where('end_mode','>=',  $firstDayOfMonth)->get();

        if (isset($findModes)) {
            foreach ($findModes as $findMode) {

                if (date_create($findMode->start_mode) < $firstDayOfMonth){
                    $stDate = $firstDayOfMonth; //Блять, пиздец, нихуя не пойму
                } else {
                    $stDate = date_create($findMode->start_mode);
                }

                if (date_create($findMode->end_mode) > $lastDayOfMonth){
                    $endDate = $lastDayOfMonth;  //Блять, пиздец, нихуя не пойму
                } else {
                    $endDate = date_create($findMode->end_mode);
                }

                for ($curDate=clone $stDate; $curDate<=$endDate; $curDate=date_add($curDate, date_interval_create_from_date_string("1 day"))) {
                    $findSchedule=Schedule::where('worker_id', $findMode->worker_id)->
                                            where('day_of_month', $curDate)->
                                            where('mode_code_id', $findMode->mode_code_id)->first();

                    if (!isset($findSchedule)) {
                        $schedule = new Schedule();
                        $schedule->worker_id = $findMode->worker_id;
                        $schedule->day_of_month = $curDate;
                        $schedule->mode_code_id = $findMode->mode_code_id;
                        $schedule->save();
                    }
                }
                echo ('OK');
                echo ('<BR>');
            }
        }
        return redirect('/schedule');
    }

    public function add_from_system_calendar(){
        $firstDayOfMonth =  date_create('2021-01-01');
        $lastDayOfMonth  =  date_create('2021-01-31');

        $allWorkers=Worker::all();

        foreach ($allWorkers as $worker){
            for ($curDate=clone $firstDayOfMonth; $curDate<=$lastDayOfMonth; $curDate=date_add($curDate, date_interval_create_from_date_string("1 day"))) {
                $findSchedule=Schedule::where('worker_id', $worker->id)->
                                        where('day_of_month', $curDate)->first();

                print_r(isset($findSchedule));
                echo ('<BR>');

                if (!isset($findSchedule)) {
                    $schedule = new Schedule();
                    $schedule->worker_id = $worker->id;
                    $schedule->day_of_month = $curDate;

                    if ( (date_format($curDate,'N')=='6')  ||
                         (date_format($curDate,'N')=='7') )     {
                        $schedule->mode_code_id = 31;
                    } else {
                        $schedule->mode_code_id = 1;
                    }
                    $schedule->save();
                }
            }
        }

        return redirect('/schedule');
    }

    public function delete(){
        $deleted = DB::delete('delete from schedules');
        return redirect('/schedule');
    }

}
