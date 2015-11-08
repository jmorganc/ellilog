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

Route::get('/', function() {
    return view('welcome');
});

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::get('/log', function() {
    $flashMessage = Session::get('flashMessage');
    $flashMessage_status = Session::get('flashMessage_status');

    $res = Requests::get('http://api.ellilog.com/api/v0/users?active=1', array('Accept' => 'application/json'));
    $users = json_decode($res->body);
    $users = $users->data;

    $res = Requests::get('http://api.ellilog.com/api/v0/babies?active=1&id=1', array('Accept' => 'application/json'));
    $babies = json_decode($res->body);
    $babies = $babies->data;

    $res = Requests::get('http://api.ellilog.com/api/v0/things?active=1', array('Accept' => 'application/json'));
    $things = json_decode($res->body);
    $things = $things->data;

    $res = Requests::get('http://api.ellilog.com/api/v0/logs?baby_id=1', array('Accept' => 'application/json'));
    $logs = json_decode($res->body);
    $logs = $logs->data;

    return view('dashboard', [
        'users' => $users,
        'babies' => $babies,
        'things' => $things,
        'logs' => $logs,
        'flashMessage' => $flashMessage,
        'flashMessage_status' => $flashMessage_status
    ]);
});


Route::post('/log', function() {
    $res = Requests::post('http://api.ellilog.com/api/v0/logs', array(), app('request')->input());
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


Route::post('/log/{id}', function($id) {
    $res = Requests::post('http://api.ellilog.com/api/v0/logs/' . $id, array(), app('request')->input());

    if ($res->status_code === 200) {
        Session::flash('flashMessage_status', 'good');
        Session::flash('flashMessage', 'Log successfully updated');
    } else {        Session::flash('flashMessage_status', 'bad');
        Session::flash('flashMessage', 'Log could not be updated');
    }
    // return $res->status_code;
    return redirect('/log');
});


Route::get('/log/edit/{id}', function($id) {
    $flashMessage = Session::get('flashMessage');
    $flashMessage_status = Session::get('flashMessage_status');

    $res = Requests::get('http://api.ellilog.com/api/v0/users?active=1', array('Accept' => 'application/json'));
    $users = json_decode($res->body);
    $users = $users->data;

    $res = Requests::get('http://api.ellilog.com/api/v0/babies?active=1&id=1', array('Accept' => 'application/json'));
    $babies = json_decode($res->body);
    $babies = $babies->data;

    $res = Requests::get('http://api.ellilog.com/api/v0/things?active=1', array('Accept' => 'application/json'));
    $things = json_decode($res->body);
    $things = $things->data;

    $res = Requests::get('http://api.ellilog.com/api/v0/logs?id=' . $id, array('Accept' => 'application/json'));
    $logs = json_decode($res->body);
    $logs = $logs->data;

    return view('edit', [
        'users' => $users,
        'babies' => $babies,
        'things' => $things,
        'logs' => $logs[0],
        'flashMessage' => $flashMessage,
        'flashMessage_status' => $flashMessage_status
    ]);
});
