<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Worker;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    //
    public function addOne(Request $request){
        $positions = Position::all();
        if ($request->has('worker_add')) {
            if (isset($request->tab_number)) {
                $findWorker = Worker::where('tab_number', $request->tab_number)->first();
                if (isset($findWorker)) {
                    $request->session()->flash('status', 'Работник с таким табельным номером существует');
                    echo $request->session()->get('status');
                    return view('Workers.addOne', ['positions'=>$positions]);
                } else {
                    $worker = new Worker;
                    $worker->name = $request->name;
                    $worker->surname = $request->surname;
                    $worker->patronymic = $request->patronymic;
                    $worker->birthday = $request->birthday;
                    $worker->gender = $request->gender;
                    $worker->tab_number = $request->tab_number;
                    $worker->start_working = $request->start_working;
                    //
                    //$worker->position
                    $positionId=Position::where('full_title', $request->position)->first();
                    $worker->position_id=$positionId->id;
                    $worker->save();

                    $request->session()->flash('status', 'Работник добавлен');
                    echo $request->session()->get('status');
                    return redirect('/worker-list');
                }

            } else {
                $request->session()->flash('status', 'ВВедите табельный номер и остальные данные');
                echo $request->session()->get('status');
                return view('Workers.addOne', ['positions'=>$positions]);
            }
        } else {
            return view('Workers.addOne', ['positions'=>$positions]);
        }
    }

}
