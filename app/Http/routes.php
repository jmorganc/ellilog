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
    $res = Requests::get('http://api.ellilog.com/api/v0/users?active=1', array('Accept' => 'application/json'));
    $users = json_decode($res->body);
    $users = $users->data;

    $res = Requests::get('http://api.ellilog.com/api/v0/babies?active=1&id=1', array('Accept' => 'application/json'));
    $babies = json_decode($res->body);
    $babies = $babies->data;

    $res = Requests::get('http://api.ellilog.com/api/v0/things?active=1', array('Accept' => 'application/json'));
    $things = json_decode($res->body);
    $things = $things->data;

    return view('dashboard', [
        'data' => 'Here\'s some welcome data.',
        'users' => $users,
        'babies' => $babies,
        'things' => $things
    ]);
});
