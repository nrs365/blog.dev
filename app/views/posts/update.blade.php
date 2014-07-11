@extends('layouts.master')

@section('content')
    <h1>Form post</h1>
    @if ($errors->has('title'))
        {{ $errors->first('title', '<span class="help-block">:message</span>') }}
        {{ $errors->first('body', '<span class="help-block">:message</span>') }}
    @endif    
    
    {{ Form::open(array('action'=>'PostsController@store')) }}
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title') }}
        <div>
            {{ Form::label('body', 'Body') }}<br>
            {{ Form:: textarea('body') }}<br>
            {{ $errors->first('body', '<span class="help-block">:message</span><br>') }}
        </div>
            {{ Form::submit('Save Post') }}    
    {{ Form::close() }}    
@stop