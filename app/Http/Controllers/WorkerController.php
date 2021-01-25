<?php


namespace App\Http\Controllers;
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
}
