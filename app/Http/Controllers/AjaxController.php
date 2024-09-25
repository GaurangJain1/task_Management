<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\role;    
use Carbon\Carbon;

use App\Models\User;
use App\Models\usertasks;
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
    public function fillData(Request $id){
        // dd($id);
        $fill = task::with('users')->find($id);                                                  //calling Model and fetching Data
        // return view('welcome',[task::with('users')->find($id),User::get()]);
        // dd(task::with('users')->find($req));
        $task = task::with('users',)->get()->sortByDesc('deadline')->sortBy('users.name');
        $user = User::get();
        // dd([$task,$user]);
        // dd($task);{{ Carbon\Carbon::parse($article->expired_at)->format('Y-m-d') }}
        return view('task-modal',['data'=>$task,'content'=>$user,'fill'=>$fill])->render();
    }

    public function editData(Request $request){
        dd($request);
        $request->validate([
            // "taskname"=>"required",
            // "desc"=>"required",
            // "file_upload"=>"required",
            // "priority"=>"required",
            // "enddate"=>"required"
        ]);
        $task = new task();                                          //calling object of Model for saving data
        $usertask = new usertasks();                                 //calling object of Model for saving data
        $task->task_name =$request->taskname;
        $task->task_description =$request->desc;
        $task->attached_file =$request->file_upload;
        $task->priority =$request->priority;
        // $enddateString = $request->enddate;
        // $date = Carbon::createFromFormat('m/d/Y', $enddateString);
        // $task->deadline= $date;
        $now = Carbon::now();
        $task->updated_at= $now;
        $task->save();
        $id = $request->taskid;
        $usertask->user_id=$request->Role;           
        $usertask->task_id = $id;
        
        
        if($usertask->save()){
            return redirect(route("showtask") )->with("success","task created successfully");
        }
        return redirect(route("feedback"))->with("error","failed to create task");
    }

    
    public function deleteData($req){
        return task::with('users')->where('');
    }
}

