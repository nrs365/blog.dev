<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	public function showResume() {
		$data = ['title' => 'resume page'];
		return View::make('temp.resume')->with($data);
	}

	public function showPortfolio() {
		return View::make('temp.portfolio');
	}

	public function showLogin() {
		return View::make('login');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function doLogin() {
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password), Input::has('remember')))
		{
    		Session::flash('info_message', 'You have logged in successfully.');
    		return Redirect::intended(action('PostsController@index'));
		}
		else
		{
    		Session::flash('errorMessage', 'Email or password was not found.');
    		return Redirect::action('HomeController@showLogin')->withInput();
		}
	}

	public function logout() {
		Auth::logout();
		Session::flash('info_message', 'You have logged out.');
		return Redirect::action('PostsController@index');
	}
	

	// public function showWelcome()
	// {
	// 	//return View::make('hello');
	// 	return Redirect::action('HomeController@sayHello', ['Codeup']);
	// }
    
 //    public function sayHello($name) {
 //        $data = array('name' => $name);
 //        	return View::make('temp.my_first_view')->with($data);
 //    	}
	// });
}

