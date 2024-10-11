<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\task;
use App\Models\role;    
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\usertasks;
use App\Models\stature;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use DB;

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
    public function fillData(Request $id){                  //function to fill the modal
        // dd($id);
        $fill = task::with('users','stature','comments')->whereHas('stature', function ($query) {
            $query->where('stature', '=', 'Hold!')->orWhere('stature', '=', 'Re-Assign!')
            ->orWhere('stature', '=', 'Created!');
        })->orderByDesc('updated_at','DESC')->find($id);                         //calling Model and fetching Data
        // dd(count($fill[0]->comments));
        // dd(isset($fill[0]->comments[0]));
        // dd(isset($fill[0]->comments,$fill[0]));,$fill[0]
        // dd($fill[0]->comments);
        // dd($fill[0]->stature->stature);
        // dd($fill[0]->users[0]->id);
        // return view('welcome',[task::with('users')->find($id),User::get()]);
        // dd(task::with('users')->find($req));
        // $task = task::with('users',)->get()->sortByDesc('deadline')->sortBy('users.name');'tasks'=>$task,
        $allUsers = User::get();
        // $userAssigned = usertasks::get()->find($id,$fill->task_id); 
        // dd([$task,$user]);
        // dd($task);{{ Carbon\Carbon::parse($article->expired_at)->format('Y-m-d') }}
        return view('task-modal',['getAllUser'=>$allUsers,'taskDetail'=>$fill])->render();
    }

    public function editData(Request $request){
        // dd(isset($request->data_comment));
        // dd(Auth::user());
        // dd($request->data_comment);

        $request->validate([
            // "taskname"=>"required",
            // "desc"=>"required",
            // "file_upload"=>"required",
            // "priority"=>"required",
            // "enddate"=>"required"
        ]);

        //SAVING COMMENT
        if (isset($request->data_comment)) {
            $u = Auth::User();
            $sender = $u->id;
            // dd($sender);
            $com = new Comment();
            $com->comment = $request->data_comment;
            $com->sender = $sender;
            $com->task_id = $request->data_id;
            $com->receiver = $request->user_role;
            $com->save();
        }
        
        $task = task::find($request->data_id);                       //calling object of Model for saving data
        
        // $task->task_id =$request->data_id;
        $task->task_name =$request->data_name;
        $task->task_description =$request->data_desc;
        $task->current_status = $request->data_status;
        // $task->attached_file =$request->file_upload;
        $task->priority =$request->data_priority;
        // $enddateString = $request->enddate;
        // $date = Carbon::createFromFormat('m/d/Y', $enddateString);
        // $task->deadline= $date;
        $now = Carbon::now();
        $task->updated_at= $now->setTimezone('Asia/Kolkata');
        // $id = $request->task_id;
        // $usertask->user_id=$request->user_role; 
        // $usertask->task_id = $id;$usertask->save()->users[0]->id
        $task->save();
        // $f = task::with('usertasks')->find($request->data_id);
        
        // dd();                  
        // dd(isset($fill->users));
        // dd($fill->users[0]->pivot->id);
        // DB::enableQueryLog();
       
            // dd($pivotId);
            // dd( DB::getQueryLog());
        
        $statureId = DB::table('statures')
        ->where('task_id', $request->data_id)
        ->first()->id;
        $stature_check = stature::find($statureId);
        if($request->data_stature != $stature_check->stature){
            // dd("correct");
            // DB::enableQueryLog();
            $t_stature = stature::find($statureId);
            // dd( DB::getQueryLog());
            $t_stature->stature = $request->data_stature;
            $now = Carbon::now();
            $t_stature->updated_at= $now->setTimezone('Asia/Kolkata');
            $t_stature->save();
            // exit;
        }
        // else{
            
        // }
        
        //SAVING USER!!!
        $fill = task::with('users')->find($request->data_id);
        if($fill->users->count() == 0){                     //u can also use exists() and isnotEmpty()
            // dd("correct");
            if(isset($request->user_role)){
                $usertask = new usertasks();
                $usertask->task_id = $request->data_id;
                $usertask->user_id = $request->user_role;
                $usertask->save();
                return;
            }
            else{
                // dd('empty');
                return;
            }
        }
        // elseif( $a == $b){
        //     return;
        // }
        else{                                       
            $a=$request->user_role;
            $b=$fill->users[0]->id; 
            if( $a == $b){                             //Dodging attempt
                // dd("c2");
                return;
            }
            else{                                   //updation of user
                // dd("c3");
                $pivotId = DB::table('usertasks')
                ->where('task_id', $request->data_id)
                ->where('user_id', $fill->users[0]->id)
                ->first()->id;
                $usertask = usertasks::find($pivotId);                                 //calling object of Model for saving data
                // $usertask->task_id = $request->data_id;
                $usertask->user_id = $request->user_role;
                $usertask->save();
                return;
            }
        }
        
        return;
        
        // if($task->save()){
        //     return redirect(route("task") )->with("success","task created successfully");
        // }
        // return redirect(route("showEmp"))->with("error","failed to create task");
    }

    
    public function deleteData($req){
        return task::with('users')->where('');
    }
}

