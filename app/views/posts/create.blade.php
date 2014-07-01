@extends('layouts.master')

@section('content')
    <h1>Form post</h1>
    @if ($errors->has('title'))
        {{ $errors->first('title', '<span class="help-block">:message</span>') }}
    @endif    
    <form method="POST" action="{{{ action('PostsController@store') }}}">
        <p>
            <label for="title">New Post Title: </label>
                <input type="text" id="title" name="title" value="{{{ Input::old('new_title') }}}">
        </p>        
        <br>
        <p>
            <label for="body">New Post: </label>
                <textarea type="textbox" id="body" name="body">{{{ Input::old('new_post') }}}</textarea>
        </p> 
        <p>
            <input type="submit">       
    </form>
@stop