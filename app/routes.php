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
    return View::make('posts.carousel');
});

Route::resource('/posts', 'PostsController');
Route::get('/login', 'HomeController@showLogin');
Route::post('/login', 'HomeController@doLogin');
Route::get('/logout', 'HomeController@logout');

route::get('/carousel', function () {
    return View::make('temp.carousel');
});

Route::get('/resume', 'HomeController@showResume');
Route::get('/portfolio', 'HomeController@showPortfolio');


// Route::get('/', 'HomeControllers@showWelcome');
Route::get('/sayhello/{name}', 'HomeController@sayHello');

// Route::get('/orm-test', function() {
//     $post2 = new Post();
//     $post2->title = "Newer Blog Post";
//     $post2->body = "Eloquent uses PDO";
//     $post2->save();
//     return "Eloquent ORM is Eloquent";
// });

// Route::get('/orm-test', function () {
//     $posts = Post::all();

//     foreach($posts as $post) {
//         echo $post->title . "<br>";
//         echo $post->body . "<br>";
//     }
// });

// Route::get('/orm-test', function() {
//     $post = Post::find(1);

//     echo $post->title . "<br>";
//     echo $post->body . "<br>";
//     $post->title = "This is a new title";
//     $post->save();

// });

// Route::get('/orm-test', function() {
//     $post = Post::find(1); // can use findOrFail as an alternative to find
//     $post->delete();
//     return "Eloquent ORM is eloquent";
// });

//Route::resource('create', 'PostsController');

// Route::get('/sayhello/{name}', function($name)
// {
//     if ($name == "Chris")
//     {
//         return Redirect::to('/');
//     }
//     else
//     {
//         $data = array('name' => $name);
//         return View::make('temp.my_first_view')->with($data);
//     }
// });

// Route::get('/roll_dice/{guess}', function($guess) {
//     $random = rand(1,6);
//     $data = array (
//         'random' => $random,
//         'guess' => $guess    
//     );
//     return View::make('temp.roll_dice')->with($data);
// });

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
