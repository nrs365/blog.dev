@extends('layouts.master')

@section('content')
    <h1>Form post</h1>
    <form method="POST" action="{{{ action('PostsController@store') }}}">
        <p>
            <label for="new_title">New Post Title: </label>
                <input type="text" id="new_title" name="new_title" value="{{{ Input::old('new_title') }}}">
        </p>        
        <br>
        <p>
            <label for="new_post">New Post: </label>
                <textarea type="textbox" id="new_post" name="new_post">{{{ Input::old('new_post') }}}</textarea>
        </p> 
        <p>
            <input type="submit">       
    </form>
@stop