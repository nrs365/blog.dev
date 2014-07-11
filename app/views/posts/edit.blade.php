@extends('layouts.master')

@section('content')
    <h1>Form post</h1>   
    
    {{ Form::model($post, array('action'=>'PostsController@update', $post->id), 'method' => 'PUT' ) }}
        <div>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title')) }}
            {{ $errors->first('title', '<span class="help-block">:message</span><br>') }}
        </div>
        <div>
            {{ Form::label('body', 'Body') }}<br>
            {{ Form:: textarea('body') }}<br>
            {{ $errors->first('body', '<span class="help-block">:message</span><br>') }}
        </div>
            {{ Form::submit('Save Post') }}           
    {{ Form::close() }}    
@stop