<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\role;    
use Carbon\Carbon;

use App\Models\User;
use App\Models\usertasks;
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
        $fill = task::with('users')->find($id);                         //calling Model and fetching Data
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
        //dd("hi");
        // dd($request->data_name);

        $request->validate([
            // "taskname"=>"required",
            // "desc"=>"required",
            // "file_upload"=>"required",
            // "priority"=>"required",
            // "enddate"=>"required"
        ]);
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
        $fill = task::with('users')->find($request->data_id);
        // $f = task::with('usertasks')->find($request->data_id);
        
        
        // dd();                  
        // dd(isset($fill->users));
        // dd($fill->users[0]->pivot->id);
        // DB::enableQueryLog();
       
            // dd($pivotId);
            // dd( DB::getQueryLog());
        
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
        // $usertask->save();
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

