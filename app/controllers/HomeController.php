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

	public function showHome()
	{
		$tweets = Twitter::getUserTimeline(array('screen_name' => '210axs', 'count' => 1, 'format' => 'array'));
		$name = ($tweets[0]['user']['name']);
		$statuses_count = ($tweets[0]['user']['statuses_count']);
		$profile_image = ($tweets[0]['user']['profile_image_url_https']);
		dd($tweets);

		$data = [
			'user' => $user,
			'name' => $name,
			'statuses_count' => $statuses_count,
			'profile_image' => $profile_image
		];
		dd($data);
		//return View::make('index')->with($data);
	}

	// public function oauth() {
	// 	// Reqest tokens
	//     $tokens = PhiloTwitter::oAuthRequestToken();

	//     // Redirect to twitter
	//     PhiloTwitter::oAuthAuthenticate(array_get($tokens, 'oauth_token'));
	//     exit;
	// }

	public function oauth() {
		$sign_in_twitter = TRUE;
	    $force_login = FALSE;
	    $callback_url = 'http://' . $_SERVER['HTTP_HOST'] . '/callback';
	    //dd($callback_url);
	    // Make sure we make this request w/o tokens, overwrite the default values in case of login.
	    Twitter::set_new_config(array('token' => '', 'secret' => ''));
	    $token = Twitter::getRequestToken($callback_url);
	    if( isset( $token['oauth_token_secret'] ) ) {
	        $url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

	        Session::put('oauth_state', 'start');
	        Session::put('oauth_request_token', $token['oauth_token']);
	        Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

	        return Redirect::to($url);
	    }
	    return Redirect::to('twitter/error');
	}    

	// public function callback() {
	// 	//Oauth token
	//     $token = Input::get('oauth_token');

	//     // Verifier token
	//     $verifier = Input::get('oauth_verifier');

	//     // Request access token
	//     $accessToken = PhiloTwitter::oAuthAccessToken($token, $verifier);
	//     dd($accessToken);
	//     $twitterId = $accessToken['user_id'];
	//     $twitterUsername = $accessToken['screen_name'];
	//     $twitterToken = $accessToken['oauth_token'];
	//     $twitterTokenSecret = $accessToken['oauth_token_secret'];

	// }

	public function callback() {
		if(Session::has('oauth_request_token')) {
	        $request_token = array(
	            'token' => Session::get('oauth_request_token'),
	            'secret' => Session::get('oauth_request_token_secret'),
	        );

	        Twitter::set_new_config($request_token);

	        $oauth_verifier = FALSE;
	        if(Input::has('oauth_verifier')) {
	            $oauth_verifier = Input::get('oauth_verifier');
        	}

	        // getAccessToken() will reset the token for you
	        $token = Twitter::getAccessToken( $oauth_verifier );
	        if( !isset( $token['oauth_token_secret'] ) ) {
	            return Redirect::to('/')->with('flash_error', 'We could not log you in on Twitter.');
	        }

        $credentials = Twitter::query('account/verify_credentials');
        if( is_object( $credentials ) && !isset( $credentials->error ) ) {
            // $credentials contains the Twitter user object with all the info about the user.
            // Add here your own user logic, store profiles, create new users on your tables...you name it!
            // Typically you'll want to store at least, user id, name and access tokens
            // if you want to be able to call the API on behalf of your users.

            // This is also the moment to log in your users if you're using Laravel's Auth class
            // Auth::login($user) should do the trick.
            dd($credentials);

            return Redirect::to('/')->with('flash_notice', "Congrats! You've successfully signed in!");
        }
        return Redirect::to('/')->with('flash_error', 'Crab! Something went wrong while signing you up!');
    }
	}

	public function showResume() {
		$data = ['title' => 'resume page'];
		return View::make('posts.resume')->with($data);
	}

	public function showPortfolio() {
		return View::make('posts.portfolio');
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
    		Session::flash('successMessage', 'You have logged in successfully.');
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
		Session::flash('successMessage', 'You have logged out.');
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

