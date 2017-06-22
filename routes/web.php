<?php

use App\Events\MessagePosted;
use App\Events\MessagePrivatePosted;

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

Route::get('/chat', function () {
    return view('chat');
//});
})->middleware('auth');

Route::get('/test', function () {

    return Redis::set('test1', 2);
});



Route::get('/messages', function () {
    return App\Message::with('user')->get();
});


Route::post('/messages', function () {
    // Store the new message
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    // Announce that a new message has been posted
    $t = event(new MessagePrivatePosted($message, $user));
//    $y = broadcast(new MessagePrivatePosted($message, $user));

    broadcast(new MessagePosted($message, $user))->toOthers();
//    broadcast(new MessagePosted($message, $user));

    return ['status' => 'OK'];
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
