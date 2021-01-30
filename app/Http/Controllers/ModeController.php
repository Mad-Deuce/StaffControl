<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Worker;
use App\Models\Mode;
use App\Models\Mode_code;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    //
    public function addOne($worker_id, Request $request){
        $worker = Worker::where('id', $worker_id)->first();
        //$mode_codes = Mode_code::all();
        $mode_codes_non_app = Mode_code::where('category','non-appearance');
        $mode_codes_app = Mode_code::where('category','appearance');
        if ($request->has('mode_add')) {
            $mode = new Mode;
            $mode->worker_id = $worker_id;
            $mode->start_mode = $request->start_mode;
            $mode->end_mode = $request->end_mode;
            $mode->mode_code_id=$request->mode_code;
            $mode->save();
            return redirect('/worker-list');

        } else {
            return view('Modes.addOne', ['worker'=>$worker, 'mode_codes_non_app'=>$mode_codes_non_app, 'mode_codes_app'=>$mode_codes_app]);
        }
    }

}
