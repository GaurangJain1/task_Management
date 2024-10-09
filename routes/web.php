<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Check;
use App\Http\Middleware\Checkifin;


Route::post('/ajax/request', [AjaxController::class, 'handleRequest']);

Route::post('/',[AuthController::class,'loginPost'])->name("loginPost");
Route::get('/',[AuthController::class,'login'])->name("login");

Route::get('/comment/{id}',[PageController::class,'comment'])->name("comment");
// ->middleware(Checkifin::class)

Route::get('/register',[AuthController::class,'reg'])->name("register")->middleware(Check::class);
Route::post('/register',[AuthController::class,'regPost'])->name("registerPost")->middleware(Check::class);

Route::get('/show_employee',[PageController::class,'showEmployee'])->name('showEmp')->middleware(Check::class);

Route::get('/logout',[AuthController::class,'logout'])->middleware(Check::class);

Route::get('/create_task',[PageController::class,'task'])->name('task')->middleware(Check::class);
Route::post('/create_task',[PageController::class,'taskPost'])->name('taskPost')->middleware(Check::class);


Route::post('/update_progress',[AuthController::class,'updateprogressPost'])->name("updateprogressPost")->middleware(Check::class);
// Route::get('/update_progress',[AuthController::class,'updateprogress'])->name("updateprogress");



Route::get('/welcome',[PageController::class,'go'])->name("showtask")->middleware(Check::class);
Route::get('/archive',[PageController::class,'arch'])->name("showarchivetask")->middleware(Check::class);
Route::get('show-tasktable',[PageController::class,'table'])->name("showtasktable")->middleware(Check::class);
Route::get('getData',[AjaxController::class,'viewData'])
->middleware(Check::class);
Route::get('fill',[AjaxController::class,'fillData']);
Route::post('edit/task',[AjaxController::class,'editData'])->name('taskEdit');    //to edit  from modal
// Route::post('plzchlja',[AjaxController::class,'editData']);
// Route::post('vdata',[AjaxController::class,'viewData']);
Route::get('/about',[PageController::class,'check'])->middleware(Check::class);
Route::get('/contact',[PageController::class,'feedback'])->name('feedback')->middleware(Check::class);
Route::get('/contact/{id}', [PageController::class,'feedbackShow'])->name('feedbackShow')->middleware(Check::class);;
Route::patch('/contact/{id}', [PageController::class,'feedbackUpdate'])->name('feedbackUpdate')->middleware(Check::class);;
Route::get('/history',[PageController::class,'history'])->middleware(Check::class);

 



















//Route::resource('/', '/var/www/html/travellist/app/Http/Controllers/PageController@index' );
// Route::get('/check', function () {
//     return view('check');
// });
//Route::resource('/', 'App\Http\Controllers\PageController');
//Route::get('/user', [EmployeeController::class, 'index']); 
//['except' => ['create', 'edit']]


//Route::get('/',[PageController::class,'index']);
// Route::get('/about',function(){
//     return view('about');
// });
// Route::get('/contact',function(){
//     return view('contact');
// });