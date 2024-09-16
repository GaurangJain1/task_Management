<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\task;
use App\Models\Usertasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class PageController extends Controller
{
    public function index(){
        
        return "INDEXX";
        //return view('welcome');
    }
    // public function login(){
    //     return view ('login'); 
    // }
    // public function reg(){
    //     return view ('register'); 
    // }
    public function check(){
        $progress = \App\Models\Progress::all();
        return view('about',['data'=>$progress]);
    }

    public function go(){
        // $task = task::find(6);
        // return $task->users;
        $task = task::all();
        return view('welcome',['data'=>$task]);

        
        // dd($task->users);
        //  return $task->users;
        //  with('users')->get();
        // $task1 = \App\Models\User::all();,'data1'=>$task1
        // return view('welcome',['data'=>$task]);
        // $students = DB::table('')
    }

    public function feedback(){
        $users = User::all()->toArray();
        return view ("feedback",compact("users"));
        //return view ('feedback'); 
    }
    public function history(){
        // $users = \App\Models\task::all()->toArray();
        // return view ("history",compact("users"));
        // $tasks = ::all();
        // dd($tasks[0]->priority);


        // $data = task::with('employee')->where('task_id',1)->get();
        $data = task::all();
        $phn = User::find(1)->phn;
        return view ('history',['tasks'=> $data]); 
    }
    public function task(){
        return view('task');
    }
    public function taskPost(Request $request){
        $request->validate([
            "taskname"=>"required",
            "desc"=>"required",
            // "file_upload"=>"required",
            "priority"=>"required",
            // "enddate"=>"required"
        ]);
        // return $request->enddate;
        
        $task = new task();
        $task->task_id =$request->taskid;
        $task->task_name =$request->taskname;
        $task->task_description =$request->desc;
        $task->attached_file =$request->file_upload;
        $task->priority =$request->priority;
        $dateString = $request->enddate;
        $date = Carbon::createFromFormat('m/d/Y', $dateString);
        $task->deadline= $date;

        // $task->save();
        // return $task->task_name;

        // // $task-> =$request->;

        
        if($task->save()){
            return redirect(route("showtask") )->with("success","task created successfully");
        }
        return redirect(route("feedback"))->with("error","failed to create task");
    }
    public function showEmployee(){
        $users = User::all();
        return view('showEmployee',['data'=>$users]);
    }

   
}
