<?php

class PostsController extends \BaseController {

	public function __construct()
	{
    	// call base controller constructor
    	parent::__construct();

    	// run auth filter before all methods on this controller except index and show
    	$this->beforeFilter('auth', array('except' => array('index', 'show', 'destroy')));
	}

	public function index()
	{
		$posts = Post::with('user')->paginate(4);

		if(Input::has('search')) 
		{
			$search = Input::get('search');
			$posts = Post::where('title', 'LIKE', "%$search%")->paginate(4);

		} else {
			$posts = Post::orderBy('created_at', 'asc')->paginate(4);
		}	
		
		return View::make('posts.index')->with('posts', $posts);
		//return View::make('posts.index')->with('posts', Post::all());
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create-edit');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		if($validator->fails())
		{
			Session::flash('errorMessage', 'There were errors submitting your form');
			return Redirect::back()->withInput()->withErrors($validator);
		
		} else {
			$post = new Post();
			$post->user_id = Auth::user()->id;
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			// $post->image = Input::file('img');
			$post->save();

			if (input::hasFile('image') && Input::file('image')->isValid()) {
				$post->addUploadedImage(Input::file('image'));
				$post->save();
			}
			Session::flash('successMessage', 'Post created successfully.');
			return Redirect::action('PostsController@index');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		return View::make('posts.show')->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);

		if ($post->canManagePost()) {
			$post = Post::findOrFail($id);
			return View::make('posts.create-edit')->with('post', $post);
		} else {	
			Session::flash('errorMessage', 'You cannot update this post');
			return Redirect::action('PostsController@index');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::findOrFail($id);

		if ($post->canManagePost()) {
			$validator = Validator::make(Input::all(), Post::$rules);
			if($validator->fails())
			{
				Session::flash('errorMessage', 'There was an error updating this post.');
				return Redirect::back()->withInput()->withErrors($validator);
			
			} else {
				$post = new Post();
				$post->user_id = Auth::user()->id;
				$post->title = Input::get('title');
				$post->body = Input::get('body');
				$post->save();
				Session::flash('successMessage', 'Post updated successfully.');
				return Redirect::action('PostsController@index');
			}			
		} else {
			Session::flash('errorMessage', 'You cannot update this post');
			return Redirect::action('PostController@index');
		}
	}	


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);

		if ($post->canManagePost()) {

			$post->delete();
			Session::flash('successMessage', 'Post deleted successfully.');
			return Redirect::action('PostsController@index');
		
		} else {
			Session::flash('errorMessage', 'You cannot delete this post');
			return Redirect::action('PostController@index');
		}	
	}
}
