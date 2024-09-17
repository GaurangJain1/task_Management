<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\role; 
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

        $task = task::with('users.getrole')->get()->sortBy('deadline')->sortBy('users.name');
        // dd($task);->sortBy('task_name')
        return view('welcome',['data'=>$task]);

        
        // dd($task->users);with('role')->
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
    public function feedbackShow($id){
        $task = Task::find($id);
        return view('', compact('task'));
    }
    public function feedbackUpdate(Request $request){
        $request->validate([

        ]);
    }
    public function history(){
        // return view('history');
        $data = task::all();
        return view('history',['data'=>$data]);
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
        $users = User::with('getrole')->get();
        // dd($users);
        return view('showEmployee',['data'=>$users]);
    }
    public function comment(){
        $comment = Comment::all();
        return view('comment',['data'=>$comment]);

        // $role = $comment->user->roles->first()->name;
        // dd('$role');
        // dd($comment);

    }
   
}
