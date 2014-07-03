@extends('layouts.master')

@section('content')
    
    @if(isset($post))
        <h1>Edit Post</h1>
        {{ Form::model($post, array('action'=>array('PostsController@update', $post->id), 'method' => 'PUT')) }}
    @else    
        <h1>Create a new post</h1>
        {{ Form::open(array('action'=>'PostsController@store')) }}
    @endif
        
        <div>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title')) }}
            {{ $errors->first('title', '<span class="help-block">:message</span><br>') }}
        </div>
        <div>
            {{ Form::label('body', 'Body') }}<br>
            {{ Form::textarea('body') }}<br>
            {{ $errors->first('body', '<span class="help-block">:message</span><br>') }}
        </div>
            {{ Form::submit('Save Post') }}           
    {{ Form::close() }}    
@stop