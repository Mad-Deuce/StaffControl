<?php


namespace App\Http\Controllers;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function showAll(){
        $workers=Worker::all();
        return view('Workers.showAll', ['workers'=>$workers]);
    }
}
