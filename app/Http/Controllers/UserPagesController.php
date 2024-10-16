<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPagesController extends Controller
{
    //
    public function userTable(){
        return view('welcome-user');
    }

}
