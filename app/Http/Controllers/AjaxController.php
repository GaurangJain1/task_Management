<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\role;    
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
    public function saveData(Request $req){
        // dd($req);
    // if($request->ajax()){
    //     return "Request is of Ajax Type";
    // }
    // return "Request is of Http type";
    $task = new task();
    // $role = new role();
    parse_str($req->input('data'),$request);
    // dd($request);
    $task->task_name =$request['taskname'];
    $task->task_description =$request['desc'];
    $task->current_status = $request['taskstatus'];
    // $role->user_id = $request['assignedto'];
    // $role->Role = $request['role'];
    $task->attached_file =$request['file_upload'];
    $task->priority =$request['priority'];
    $dateString = $request['enddate'];
    $date = Carbon::createFromFormat('m/d/Y', $dateString);
    $task->deadline= $date;
    $now = Carbon::now();
    $task->updated_at= $now;
    if($task->save()){
        echo "SAVED!";
    }
    else{
        echo "NOT SAVED!!";
    }
}

    public function viewData(){
        $data = task::all();
        // $data = task::with('users','comments')->get()->sortByDesc('deadline')->sortBy('users.name');

        // dd($data);  
        return $data;
    }
    public function editData(Request $id){
        // dd($id);
        return(task::with('users')->find($id));
        // dd(task::with('users')->find($req));

    }

    
    public function deleteData($req){
        return task::with('users')->where('');
    }
}

