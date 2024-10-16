<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\stature;



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

        // $task = task::with('users',)->orderBy('deadline','desc')->orderBy('users.name','asc')->paginate(6);
        // $task = task::with('users',)->paginate(6)->orderBy('deadline','desc')->orderBy('users.name','asc');
        // $user = User::all();
        // dd([$task,$user]);
        // $task = task::with('users',)->Paginator(6);
        // dd(get_class($task));
        // dd($task);{{ Carbon\Carbon::parse($article->expired_at)->format('Y-m-d') }}


        // $task = task::with('users',)->Paginate(15)->sortByDesc('deadline')->sortBy('users.name');
        $task = task::with('users','stature')->whereHas('stature', function ($query) {
            $query->where('stature', '=', 'Hold!')->orWhere('stature', '=', 'Re-Assign!')
            ->orWhere('stature', '=', 'Created!');
        })->orderByDesc('updated_at','DESC')->paginate(5);
        // dd($task);
        return view('welcome');

        
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

    public function table(Request $request){
        // dd($id);
        // $fill = task::with('users')->find($id);                                                  //calling Model and fetching Data
        // return view('welcome',[task::with('users')->find($id),User::get()]);
        // dd(task::with('users')->find($req));
        // $task = task::with('users',)->get()->sortByDesc('deadline')->sortBy('users.name');paginate(15)->orderBy('users.name')
        // $user = User::get();
        // DB::enableQueryLog();
        // $page = $request->input('page', 1);
        // $perPage = $request->input('per_page', 5);

        // $u = Auth::User();
        // $sender = $u->name;
        if (Gate::allows('isUser')) {
            # code...
            $task = task::with('users','stature')->whereHas('stature', function ($query) {
                $query->where('stature', '=', 'Hold!')->orWhere('stature', '=', 'Re-Assign!')
                ->orWhere('stature', '=', 'Created!');})
                ->whereHas('users',function($query){
                    $query->where('name', '=', Auth::User()->name);
                })
            ->orderByDesc('updated_at','DESC')->paginate(5);
        } else {
            # code...
            $task = task::with('users','stature')->whereHas('stature', function ($query) {
                $query->where('stature', '=', 'Hold!')->orWhere('stature', '=', 'Re-Assign!')
                ->orWhere('stature', '=', 'Created!');
            })->orderByDesc('updated_at','DESC')->paginate(5); 
        }
        
        
        // dd($task);
          

        if($request->ajax()){
            return view('task-table',['tasks'=>$task])->render();
        }  
        return view('welcome',['tasks'=>$task]);

        //  dd( DB::getQueryLog());

        // dd($task->stature->stature);   
        // $task = task::with('users')->get()->sortByDesc('updated_at')->sortBy('users.name');
        // $task->withPath('/welcome');
        // dd($task[0]->stature->stature);  
        // $task = $taskP;
        // dd($task);
        // dd([$task,$user]);
        // dd($task);{{ Carbon\Carbon::parse($article->expired_at)->format('Y-m-d') }}
        // return view('task-table',['tasks'=>$task])->render();
        // return response()->json(['tasks' => $tasks]);
        // return view('task-table',['tasks'=>$task]);
        // return Redirect::back()->with(['tasks'=>$task]);
    }
    public function arch(){
        if (Gate::allows('isUser')) {
            # code...
            $task = task::with('users','stature')->whereHas('stature', function ($query) {
                $query->where('stature', '=', 'Complete!');})
                ->whereHas('users',function($query){
                    $query->where('name', '=', Auth::User()->name);
                })
            ->orderByDesc('updated_at','DESC')->paginate(5);
        } else {
            # code...
            $task = task::with('users','stature')->whereHas('stature', function ($query) {
                $query->where('stature', '=', 'Complete!');
            })->orderByDesc('updated_at','DESC')->paginate(5); 
        }
        // $task = task::with('users','stature')->whereHas('stature', function ($query) {
        //     $query->where('stature', '=', 'Complete!');
        // })->orderByDesc('updated_at','DESC')->paginate();
        
        // dd($task);
        return view("archive",['tasks'=>$task]);
    }
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
        // $task->task_id =$request->taskid;
        $task->task_name =$request->taskname;
        $task->task_description =$request->desc;
        $task->attached_file =$request->file_upload;
        $task->priority =$request->priority;
        $task->current_status = "Assigned";
        // $role->user_id =$request->user_id;
        $enddateString = $request->enddate;
        $date = Carbon::createFromFormat('m/d/Y', $enddateString);
        $task->deadline= $date;
        $now = Carbon::now();
        $task->created_at= $now->setTimezone('Asia/Kolkata');
        $task->updated_at= $now->setTimezone('Asia/Kolkata');

        $task->save();
        $id = $task->task_id;
        // dd($id);
        $usertask = new usertasks();
        $usertask->user_id=$request->Role;           
        $usertask->task_id = $id;

        $stature = new stature();
        $stature->task_id = $id;
        $stature->stature = "Created!";
        $now = Carbon::now();
        $stature->created_at= $now->setTimezone('Asia/Kolkata');
        $stature->updated_at= $now->setTimezone('Asia/Kolkata');
        $stature->save();
        
            $u = Auth::User();
            $sender = $u->id;
            // dd($sender);
            $com = new Comment();
            $com->comment = "THIS TASK IS ASSIGNED TO U!";
            $com->sender = $sender;
            $com->task_id = $id;
            $com->receiver = $request->Role;
            $now = Carbon::now();
            $com->created_at= $now->setTimezone('Asia/Kolkata');            
            $com->updated_at= $now->setTimezone('Asia/Kolkata');
            $com->save();

        // $task->save();
        // return $task->task_name;

        // // $task-> =$request->;

        
        if($usertask->save()){
            return redirect(route("showtask") )->with("success","task created successfully");
        }
        return redirect(route("feedback"))->with("error","failed to create task");
    }
    public function showEmployee(){
        $users = User::with('getrole')->paginate(5);
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
