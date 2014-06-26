<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/home', function (){
    return 'This is my homepage.';
});

Route::get('/resume', function () {
    return 'This is my resume.';
});

Route::get('/portfolio', function () {
    return 'This is my portfolio.';
});


// Route::get('/sayHello/{name}', function($name)
// {
//     if ($name == "Chris")
//     {
//         return Redirect::to('/');
//     }
//     else
//     {
//         return "Hello, $name!";
//     }
// });
