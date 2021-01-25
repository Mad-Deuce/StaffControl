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
        if ($request->has('tab_number')) {
            $findWorker=Worker::where('tab_number', $request->tab_number)->first();
            if (isset($findWorker)){
                $request->session()->flash('status', 'Работник с таким табельным номером существует');
                return view ('Workers.addOne');
            } else {
                $worker = new Worker;
                $worker->name=$request->name;
                $worker->surname=$request->surname;
                $worker->patronymic=$request->patronymic;
                $worker->birthday=$request->birthday;
                $worker->gender=$request->gender;
                $worker->tab_number=$request->tab_number;
                $worker->start_working=$request->start_working;
                $worker->save();

                $request->session()->flash('status', 'Работник добавлен');
                return redirect('/worker-list');
            }
            echo $request->session()->get('status');
        }
        return view ('Workers.addOne');
    }
}
