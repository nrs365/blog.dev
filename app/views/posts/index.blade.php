@extends('layouts.master')

@section('content')
    <h1>Posts</h1>
    {{ link_to_action('PostsController@create', 'Create', array('class' => 'btn btn-default btn-lrg')) }}
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Creation Date</th>
            <th>Actions</th>
        </tr>    
        @foreach ($posts as $post)
        <tr>
            <td>{{ link_to_action('PostsController@show', $post->title, array($post->id)) }}</td>
            <td>{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}</td>
            <td>{{ link_to_action('PostsController@edit', 'Edit', array($post->id), array('class' => 'btn btn-default btn-sm')) }}</td>
        </tr>
        <br>       
        @endforeach
    </table>
    {{ $posts->links() }}
    <div>
        {{ Form::open(array('action'=>'PostsController@index', 'class' => 'form-inline', 'method' => 'GET')) }}
            {{ Form::label('search', 'Search') }}
            {{ Form::text('search', null, array('placeholder' => 'Search Query', 'class' => 'form-control col-lg-4')) }}
            {{ Form::submit('Search') }} 
        {{ Form::close() }} 
    </div><br>

@stop