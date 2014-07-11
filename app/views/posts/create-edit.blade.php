@extends('layouts.blog_master')

@section('content')
    
    @if(isset($post))
        <h1>Edit Post</h1>
        {{ Form::model($post, array('action'=>array('PostsController@update', $post->id), 'method' => 'PUT')) }}
    @else    
        <h1>Create a new post</h1>
        {{ Form::open(array('action'=>'PostsController@store', 'files' => true)) }}
    @endif<br>

        <div>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title')) }}
            {{ $errors->first('title', '<span class="help-block">:message</span>') }}
        </div>
        <br>
        <div>
            {{ Form::label('image', 'Add image') }}
            {{ Form::file('image') }}
        </div> 
        <br>   
        <div>
            <label for="wmd-input">Body</label><br>
            <div class="wmd-panel">
                <div id="wmd-button-bar"></div>
                {{ Form::textarea('body', null, array('class'=>'wmd-input', 'id'=>'wmd-input')) }}<br>
            </div>        
            {{ $errors->first('body', '<span class="help-block">:message</span><br>') }}
        </div>
           <p> {{ Form::submit('Save Post', array('class' => 'btn btn-default')) }}  </p>

        <br> <br>

        <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
        


        <div class="wmd-panel">
            <div id="wmd-button-bar-second"></div>
            <!-- <textarea class="wmd-input" id="wmd-input-second"></textarea>  --> 
        </div>     


    {{ Form::close() }}    

@stop

@section('bottomscript')
    <script type="text/javascript" src="/js/Markdown.Converter.js"></script>
    <script type="text/javascript" src="/js/Markdown.Sanitizer.js"></script>
    <script type="text/javascript" src="/js/Markdown.Editor.js"></script>
    <script type="text/javascript">
        var converter = Markdown.getSanitizingConverter();
        var editor = new Markdown.Editor(converter);
        editor.run();
    </script>    
@stop        