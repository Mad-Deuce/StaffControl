<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

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
        if ($request->has('worker-tab_number')) {
            $findWorker=Worker::where('tab_number', $request->worker-tab_number)->first();
            if (isset($findWorker)){
                $request->session()->flash('status', 'Работник с таким табельным номером существует');
                return view ('Workers.addOne');
            } else {
                $worker = new Worker;
                $worker->name=$request->worker-name;
                $worker->surname=$request->worker-surname;
                $worker->patronymic=$request->worker-patronymic;
                $worker->birthday=$request->worker-birthday;
                $worker->gender=$request->worker-gender;
                $worker->tab_number=$request->worker-tab_number;
                $worker->start_working=$request->worker-start_working;
                $worker->save();

                $request->session()->flash('status', 'Работник добавлен');
                return redirect('/worker-list');
            }
            echo $request->session()->get('status');
        }
        return view ('Workers.addOne');
    }
}
