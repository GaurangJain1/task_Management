<?php

namespace App\Http\Controllers;
use App\Models\User;  
use App\Models\Comment; 
use App\Models\emp_role;    
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \App\Models\role;
use Illuminate\Http\Request;
use App\Models\Progress;
use function Laravel\Prompts\info;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    // protected function authenticated($request, $user){

    //     if($user->isRole('admin')){
    //         return redirect('/admin');
    //     }else{
    //         return redirect('/');
    //     }
    // }
    public function loginPost(Request $request){
    //     if($request->rolep == "Assioner"){
    //         $credentials = $request->only("name","password","rolep");
    //     if(Auth::attempt($credentials)){
    //              return redirect()->route("showtask");
    //     }
    //    else{
    //     return redirect()->route("login");
    //    }
    // }
    //     elseif($request->rolem == "Assignee"){
    //         $credentials = $request->only("name","password","rolem");
    //          if(Auth::attempt($credentials)){
    //              return redirect()->route("showtask");
    //          }
    //          else{
    //          return redirect()->route("login");
    //         }
    //     }
        // dd($request);
        $credentials = $request->only("name","password");
        
        if(Auth::attempt($credentials)){
            return redirect()->route("showtask");
        }
        else{
        return redirect()->route("login");
       }
    }


    public function reg(){
        return view ('register'); 
    }


    public function regPost(Request $request){
        $request->validate([
            "uname"=>"required",
            "pw"=>"required",
            "em"=>"required|email"
            // "rolep"=>"",
            // "rolem"=>""

        ]);
        // return $request;
        $user = new User();
        $roles = new role();
        $user->name = $request->uname;
        $user->password = Hash::make($request->pw);
        $user->email = $request->em;
        $user->save();

        $userId = $user->id;
        $c= False;
        // return $request->rolep == "Assignee";
        // 
        if($request->rolep == "Assioner"){
            $roles->user_id = $userId;
            $roles->Role = $request->rolep;
            $roles->save();
            $c = True;
        }

        if($request->rolem == "Assignee"){
            $roles->user_id = $userId;
            $roles->Role = $request->rolem;
            $roles->save();
            $c = True;
        }
        
        
        
        // $roles->Role = $request->rolem;

        if($c == True){
            return redirect(route("login") )->with("success","user created successfully");
        }
        return redirect(route("register"))->with("error","failed to create user");
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }
    public function updateprogressPost(Request $request){

            // return $request;
            $request->validate([
                "percentage"=>"required"
            ]);
            $progress = new Progress();
            $progress->percentage_done=$request->percentage;
            if($progress->save()){
                info('% updated.');
            }
    }
    public function comment(){
        $comment = Comment::all();
        // $role = $comment->user->roles->first()->name;
        // dd('$role');
        dd($comment);

    }


}





// public function login(){
//     return view ('login'); 
// }

    // public function updateprogress(){
    //     return view("updateProgress");

    // }
    