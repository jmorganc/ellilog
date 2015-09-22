<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/log', function () {
    $flashMessage = Session::get('flashMessage');
    $flashMessage_status = Session::get('flashMessage_status');

    $res = Requests::get('http://api.ellilog.dev/api/v0/users?active=1', array('Accept' => 'application/json'));
    $users = json_decode($res->body);
    $users = $users->data;

    $res = Requests::get('http://api.ellilog.dev/api/v0/babies?active=1&id=1', array('Accept' => 'application/json'));
    $babies = json_decode($res->body);
    $babies = $babies->data;

    $res = Requests::get('http://api.ellilog.dev/api/v0/things?active=1', array('Accept' => 'application/json'));
    $things = json_decode($res->body);
    $things = $things->data;

    return view('dashboard', [
        'users' => $users,
        'babies' => $babies,
        'things' => $things,
        'flashMessage' => $flashMessage,
        'flashMessage_status' => $flashMessage_status
    ]);
});


Route::post('/log', function () {
    $res = Requests::post('http://api.ellilog.dev/api/v0/log', array(), app('request')->input());
    if ($res->status_code === 200) {
        Session::flash('flashMessage_status', 'good');
        Session::flash('flashMessage', 'Log successfully saved');
    } else {
        Session::flash('flashMessage_status', 'bad');
        Session::flash('flashMessage', 'Log could not be saved');
    }
    // return $res->status_code;
    return redirect('/log');
});
