<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/tasks', 'TodoController');
Route::get('tasks', 'TodoController@index');
Route::post('tasks', 'TodoController@store');

Route::get('tasks/{task}/edit', 'TodoController@edit');
Route::put('tasks/{task}', 'TodoController@update');

Route::delete('tasks/{task}', 'TodoController@destroy');

Route::get('tasks/search/{term?}', 'TodoController@index');


// vue chat
Route::get('/chat', function () {
    return view('chat');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/messages', function () {
    return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function () {
    //store the new message
    $user = Auth::user();

    $user->message()->create([
    	'message' => request()->get('message') 
    ]);

    return ['status'=>'OK'];
})->middleware('auth');

