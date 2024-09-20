<?php

namespace App\Http\Controllers;

use App\Models\task;
use Carbon\Carbon;

use App\Models\User; 


use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // public function handleRequest(Request $request)
    // {
    //     // Process request
    //     return response()->json(['success' => true]);
    // }
    // public function savedata(Request $request){
    //     echo "hellooooo";
    // }
    public function saveData(Request $request){
        // dd($request);
    // if($request->ajax()){
    //     return "Request is of Ajax Type";
    // }
    // return "Request is of Http type";
    $task = new task();
    parse_str($request->input('data'),$formData);

    $task->task_name =$request->taskname;
    $task->task_description =$request->desc;
    $task->attached_file =$request->file_upload;
    $task->priority =$request->priority;
    $dateString = $request->enddate;
    $date = Carbon::createFromFormat('m/d/Y', $dateString);
    $task->deadline= $date;
    if($task->save()){
        echo "SAVED!";
    }
    else{
        echo "NOT SAVED!!";
    }
}
}

