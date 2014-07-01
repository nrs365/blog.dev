@extends('layouts.master')

@section('content')
    <h1>Posts</h1>
    @foreach ($posts as $post)
        {{ link_to_action('PostsController@show', $post->title, array($post->id)) }}
        <br>       
    @endforeach
@stop