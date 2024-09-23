<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\role; 
use App\Models\task;
use App\Models\usertasks;
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
        // $task = role::all();

        // $sortColumn1 = 'deadline'; 
        // $direction1 = 'asc';
        // $sortColumn2 = 'users.name'; 
        // $direction2 = 'asc';
        
        // $task = task::with('users.getrole')->orderBy($sortColumn1, $direction1)
        //                 ->orderBy($sortColumn2, $direction2)
        //                 ->get();

        // $task = task::select('tasks.*')
        //         ->with('users')
        //         ->join('user_task', 'user_task.task_id', '=', 'tasks.id')
        //         ->join('users', 'user_task.user_id', '=', 'tasks.id')
        //         ->orderBy($sortColumn1, $direction1)
        //          ->orderBy($sortColumn2, $direction2)
        //         ->get();

        $task = task::with('users','comments')->get()->sortByDesc('deadline')->sortBy('users.name');
        // dd($task);
        // dd($task);{{ Carbon\Carbon::parse($article->expired_at)->format('Y-m-d') }}
        return view('welcome',['data'=>$task]);

        
        // dd($task->users);with('role')->
        //  return $task->users;
        //  with('users')->get();
        // $task1 = \App\Models\User::all();,'data1'=>$task1
        // return view('welcome',['data'=>$task]);
        // $students = DB::table('')
    }
    // public function feedback(){
    //     $users = User::all()->toArray();
    //     return view ("feedback",compact("users"));
    //     //return view ('feedback'); 
    // }
    public function feedbackShow($id){
        // dd("value sent=",$id);
        $task = task::find($id);
        // dd($task);
        return view("feedback", compact('task'));
    }
    // public function feedbackUpdate(Request $request){
    //     $request->validate([

    //     ]);
    // }

    public function history(){
        // return view('history');
        $data = task::all();
        return view('history',['data'=>$data]);
    }
    public function task(){
        $user = User::all()->toArray();
        // dd($user);
        return view('task',['data'=>$user]);
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
        $usertask = new usertasks();
        $task->task_id =$request->taskid;
        $task->task_name =$request->taskname;
        $task->task_description =$request->desc;
        $task->attached_file =$request->file_upload;
        $task->priority =$request->priority;
        // $role->user_id =$request->user_id;
        $enddateString = $request->enddate;
        $date = Carbon::createFromFormat('m/d/Y', $enddateString);
        $task->deadline= $date;
        $now = Carbon::now();
        $task->created_at= $now;
        $now = Carbon::now();
        $task->updated_at= $now;

        $task->save();
        $id = $request->taskid;
        // dd($id);

        $usertask->user_id=$request->Role;           
        $usertask->task_id = $id;
        
        

        // $task->save();
        // return $task->task_name;

        // // $task-> =$request->;

        
        if($usertask->save()){
            return redirect(route("showtask") )->with("success","task created successfully");
        }
        return redirect(route("feedback"))->with("error","failed to create task");
    }
    public function showEmployee(){
        $users = User::with('getrole')->get();
        // dd($users);
        return view('showEmployee',['data'=>$users]);
    }
    public function comment($id){
        $comment = task::with('comments')->where('task_id',$id)->get();
        // dd($comment);

        return view('comment',['data'=>$comment]);

        // $role = $comment->user->roles->first()->name;
        // dd('$role');

    }
   
}
