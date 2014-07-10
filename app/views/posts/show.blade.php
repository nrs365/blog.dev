@extends('layouts.master')

@section('content')
    <h1>{{{ $post->title }}}</h1>
    <h5>{{{ $post->user->email }}}</h5>
    <h5>{{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}}</h5>
    <p>{{ $post->renderBody() }}</p>
    @if ($post->img_path)
        <img src="{{{ $post->img_path }}}" class="responsive" alt="uploaded blog image" alt="User uploaded image" height="400" width="400">    
    @endif 

    @if ($post->canManagePost()) 
        {{ link_to_action('PostsController@edit', 'Edit', array($post->id), array('class' => 'btn btn-default btn-sm')) }}  
        <button class="deletePost btn btn-default btn-sm" data-postid="{{ $post->id }}">Delete</button>
        {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'id' => 'deleteForm', 'method'=> 'DELETE')) }}
        {{ Form::close() }}
    @endif
@stop

@section('bottomscript')
<script type="text/javascript">
   $(".deletePost").click(function() {
       // var postId = $(this).data('postid');
       // $("#deleteForm").attr('action', '/posts/' + postId);
       if(confirm("Are you sure you want to delete post")) {
           $('#deleteForm').submit();
       }
   });
</script>
@stop