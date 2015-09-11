<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    if (view()->exists('testtest')) {
        echo 'Yes, the view was found!<br/><br/>';
        echo '<pre>';print_r(view('testtest'));
    }
    return view('testtest');
});
