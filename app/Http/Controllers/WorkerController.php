<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Position;

class WorkerController extends Controller
{
    public function showAll(){
        $workers=Worker::all();
        return view('Workers.showAll', ['workers'=>$workers]);
    }

    public function deleteOne($id){
        Worker::destroy($id);
        return redirect('/worker-list');
    }

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
