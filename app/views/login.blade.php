@extends('layouts.blog_master')

@section('content')
{{ Form::open(array('action'=>'HomeController@doLogin', 'class'=>'form-signing', 'method'=>'POST')) }}
<span class="glyphicon glypicon-lock"></span> Please sign in</h2><br>
{{ Form::text('email') }}<br>
{{ Form::password('password') }}<br>
{{ Form::checkbox('remember', 'remember', false, ['id' => 'remember']) }}
{{ Form::label('remember', ' Remember my login') }}<br>
{{ Form::submit('Log in!', ['class' => 'btn btn-primary btn block']) }}<br>
{{ Form::close() }}
@stop
