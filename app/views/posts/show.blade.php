@extends('layouts.master')

@section('content')
    <h1>{{{ $post->title }}}</h1>
    <p>{{{ $post->created_at }}}</p>
    <p>{{{ $post->body }}}</p>
@stop
