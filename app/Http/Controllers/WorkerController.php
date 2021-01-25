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
        Worker::destroy($id);
        return redirect('/worker-list');
    }
}
