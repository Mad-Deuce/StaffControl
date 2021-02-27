<?php


namespace App\Http\Controllers;


use App\Models\Mode;
use App\Models\Schedule;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;

class TimeSheetController extends Controller
{
    public function showAll(){

        $schedules = DB::select('SELECT * FROM "public"."view_timeSheets";');

        $schedulesArray[] = array (
            array(  'id'=>"",
                'tab_number'=>"",
                'gender'=>"",
                'name'=>"",
                'position'=>"",
                'modes'=>array(
                    'm_date'=>"",
                    'm_hour'=>"",
                    'm_code'=>"",
                    'm_ato_hour'=>"",
                    'm_ato_code'=>"",

                ),
                'sum_w_day'=>"",
                'sum_w_hour'=>"",
                'sum_w_ato_hour'=>"",
                'sum_r_day'=>"",
                'sum_r_hour'=>"",
                'sum_r_day1'=>"",
                'sum_r_hour1'=>"",
                'sum_r_day2'=>"",
                'sum_r_hour2'=>"",
                'sum_r_day3'=>"",
                'sum_r_hour3'=>"",
                'sum_r_day4'=>"",
                'sum_r_hour4'=>"",
                'sum_r_day5'=>"",
                'sum_r_hour5'=>"",
                'sum_r_day6'=>"",
                'sum_r_hour6'=>"",
                'sum_r_day7'=>"",
                'sum_r_hour7'=>"",
                'sum_r_day8'=>"",
                'sum_r_hour8'=>"",
                'sum_r_day9'=>"",
                'sum_r_hour9'=>"",
                'sum_r_day10'=>"",
                'sum_r_hour11'=>"",
            )
        );

        foreach ($schedules as $schedule) {

            //Вариант 1
            $arrID=     ($schedule->wid);
            $arrTNumber=($schedule->wtab_number);
            $arrGender= ($schedule->wgender);
            $arrName=   ($schedule->wsurname).' '.
                        ($schedule->wname).' '.
                        ($schedule->wpatronymic);
            $arrPosition=($schedule->wposition);

            $arrDOM=($schedule->dofmonth);
            $arrMHour=($schedule->hour);
            $arrMCode=($schedule->mcodes);
            $arrMAtoHour=null;
            $arrMAtoCode=null;

            if (!array_key_exists($arrID,$schedulesArray)) {
                $Arr_sum_w_day=0;
                $Arr_sum_w_hour=0;
                $Arr_sum_w_ato_hour=0;
                $Arr_sum_r_day=0;
                $Arr_sum_r_hour=0;
                $Arr_sum_r_day1=0;
                $Arr_sum_r_hour1=0;
                $Arr_sum_r_day2=0;
                $Arr_sum_r_hour2=0;
                $Arr_sum_r_day3=0;
                $Arr_sum_r_hour3=0;
                $Arr_sum_r_day4=0;
                $Arr_sum_r_hour4=0;
                $Arr_sum_r_day5=0;
                $Arr_sum_r_hour5=0;
                $Arr_sum_r_day6=0;
                $Arr_sum_r_hour6=0;
                $Arr_sum_r_day7=0;
                $Arr_sum_r_hour7=0;
                $Arr_sum_r_day8=0;
                $Arr_sum_r_hour8=0;
                $Arr_sum_r_day9=0;
                $Arr_sum_r_hour9=0;
                $Arr_sum_r_day10=0;
                $Arr_sum_r_hour11=0;

                if ($arrMCode==='Р'){
                    $Arr_sum_w_day=$Arr_sum_w_day+1;
                    $Arr_sum_w_hour=$Arr_sum_w_hour+$arrMHour;
                    $Arr_sum_w_ato_hour=$Arr_sum_w_ato_hour+$arrMHour;
                    $arrMAtoHour=$arrMHour;
                    $arrMAtoCode='АТО';
                }
                $schedulesArray[$arrID]['id']=$arrID;
                $schedulesArray[$arrID]['name']=$arrName;
                $schedulesArray[$arrID]['position']=$arrPosition;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_date']=$arrDOM;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_hour']=$arrMHour;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_code']=$arrMCode;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_ato_hour']=$arrMAtoHour;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_ato_code']=$arrMAtoCode;
                $schedulesArray[$arrID]['sum_w_day']=$Arr_sum_w_day;
                $schedulesArray[$arrID]['sum_w_hour']=$Arr_sum_w_hour;
                $schedulesArray[$arrID]['sum_w_ato_hour']=$Arr_sum_w_ato_hour;

                //$schedulesArray[$arrID]['sum']=$arrSum;
                //print_r($schedulesArray);





            } else {
                if ($arrMCode==='Р'){
                    $Arr_sum_w_day=$Arr_sum_w_day+1;
                    $Arr_sum_w_hour=$Arr_sum_w_hour+$arrMHour;
                    $Arr_sum_w_ato_hour=$Arr_sum_w_ato_hour+$arrMHour;
                    $arrMAtoHour=$arrMHour;
                    $arrMAtoCode='АТО';
                }
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_date']=$arrDOM;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_hour']=$arrMHour;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_code']=$arrMCode;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_ato_hour']=$arrMAtoHour;
                $schedulesArray[$arrID]['modes'][$arrDOM]['m_ato_code']=$arrMAtoCode;
                $schedulesArray[$arrID]['sum_w_day']=$Arr_sum_w_day;
                $schedulesArray[$arrID]['sum_w_hour']=$Arr_sum_w_hour;
                $schedulesArray[$arrID]['sum_w_ato_hour']=$Arr_sum_w_ato_hour;
            }

        }

        unset($schedulesArray[0]);          //Удаляет элемент с индексом "0", остальные индексы не меняются

        return view('TimeSheet.showAll', ['schedulesArray'=>$schedulesArray]);

    }

    public function add_from_modes(){

        $firstDayOfMonth =  date_create('2021-01-01');
        $lastDayOfMonth  =  date_create('2021-01-31');

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
}
