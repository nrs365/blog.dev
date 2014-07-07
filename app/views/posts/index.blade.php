@extends('layouts.master')

@section('content')
    <h1>Posts</h1>
    {{ link_to_action('PostsController@create', 'Create', null, array('class' => 'btn btn-success btn-lrg pull-right')) }}
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Author Email</th>
            <th>Creation Date</th>
            <th>Actions</th>
        </tr>    
        @foreach ($posts as $post)
        <tr>
            <td>{{ link_to_action('PostsController@show', $post->title, array($post->id)) }}</td>
            <td>{{ $post->user->email }}
            <td>{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}</td>
            <td>{{ link_to_action('PostsController@edit', 'Edit', array($post->id), array('class' => 'btn btn-default btn-sm')) }}</td>
        </tr>
        <br>       
        @endforeach
    </table>
    {{ $posts->appends(['search' => Input::get('search')])->links() }}
    <div>
        {{ Form::open(array('action'=>'PostsController@index', 'class' => 'form-inline', 'method' => 'GET', 'files' => true)) }}
            {{ Form::label('search') }}
            {{ Form::text('search', null, array('placeholder' => 'Search Query', 'class' => 'form-control col-lg-4')) }}
            {{ Form::submit('Search', array('class' => 'btn btn-success')) }} 
        {{ Form::close() }} 
        {{-- $posts->appends(['search' => Input::get('search')]) --}}
    </div><br>

@stop