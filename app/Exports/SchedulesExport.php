<?php

namespace App\Exports;

use App\Models\Schedule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class SchedulesExport implements FromView, WithColumnWidths
{

    public function columnWidths(): array
    {
        return [
            'A' => 6,
            'B' => 18,
            'C' => 8,
            'D' => 4, 'E' => 4, 'F' => 4, 'G' => 4, 'H' => 4,
            'I' => 4, 'J' => 4, 'K' => 4, 'L' => 4, 'M' => 4,
            'N' => 4, 'O' => 4, 'P' => 4, 'Q' => 4, 'R' => 4,
            'S' => 4, 'T' => 4, 'U' => 4, 'V' => 4, 'W' => 4,
            'X' => 4, 'Y' => 4, 'Z' => 4, 'AA' => 4, 'AB' => 4,
            'AC' => 4, 'AD' => 4, 'AE' => 4, 'AF' => 4, 'AG' => 4, 'AH' => 4,
            'AI' => 7, 'AJ' => 12,
        ];
    }

    public function view() : View
    {
        //self::add_from_modes();
        //self::add_from_system_calendar();

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

        //return view('Schedule.showAll', ['schedulesArray'=>$schedulesArray]);
        return view('Exports.schedule', ['schedulesArray'=>$schedulesArray]);
    }
}

