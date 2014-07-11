@extends('layouts.blog_master')

@section('topscript')

@stop
       

@section('content')
<div class="container-fluid"> 
    <div class="row">
        <div class="col-md-8">   
            <!-- add some padding somewhere around here -->
            <h1>Blog Posts</h1>
            @if (Auth::check())
                {{ link_to_action('PostsController@create', 'Create', null, array('class' => 'btn btn-default btn-md')) }}
            @endif
                @foreach ($posts as $post)
                
                    <h2>{{ link_to_action('PostsController@show', $post->title, $post->slug) }}
                    </h2>
                    <p> By: {{ $post->user->first_name }} {{ $post->user->last_name}}</p>
                    {{ $post->user->email }}
                    <p>
                    <span class="glyphicon glyphicon-time"></span>{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}
                    </p>
                    <p>{{ $post->body }}</p>
                    <hr>    
                @endforeach
                {{ $posts->appends(['search' => Input::get('search')])->links() }}
        </div>            
        <div class="col-md-4">
            <div class="well">
            <h4>Search</h4>
                {{ Form::open(array('action'=>'PostsController@index', 'class' => 'form-inline', 'method' => 'GET', 'files' => true)) }}
                <div class="input-group">
                    {{-- Form::label('search', 'Search', array('class' => 'form-label')) --}}
                    {{ Form::text('search', Input::get('search'), array('placeholder' => 'Search Query', 'class' => 'form-control')) }}
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                    {{ Form::close() }} 
                </div>
                {{-- $posts->appends(['search' => Input::get('search')]) --}}
            </div><br> 
        </div>
    </div>           

@stop