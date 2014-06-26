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
Route::get('/', function (){
    return View::make('temp.my_first_view');
});

Route::get('/resume', function () {
    return 'This is my resume.';
});

Route::get('/portfolio', function () {
    return 'This is my portfolio.';
});

Route::get('/sayhello/{name}', function($name)
{
    if ($name == "Chris")
    {
        return Redirect::to('/');
    }
    else
    {
        $data = array('name' => $name);
        return View::make('my_first_view')->with($data);
    }
});

Route::get('/roll_dice/{guess}', function($guess) {
    $random = rand(1,6);
    $data = array (
        'random' => $random,
        'guess' => $guess    
        );
    return View::make('temp.roll_dice')->with($data);
});

// Route::get('/sayHello/{named}', function($name)
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
