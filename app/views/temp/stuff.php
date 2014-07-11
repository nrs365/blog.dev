
this need to be made a topscript
<html>
<head>
    <title>Portfolio page</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/css/g1jquubbld/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
</head>


<html>
<head>
    <title>Portfolio page</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/css/g1jquubbld/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
</head>

<title>{{-- $title --}}</title>
 
 <title>{{{ $title or "My Site Title" }}}</title>

{{{ $post->title . "<br>" }}}
{{{ $post->body . "<br>" }}}
{{{ link_to_action('HomeController@getIndex', $title, $parameters = array(), $attributes = array()) }}}

<form method="POST" action="{{{ action('PostsController@store') }}}">
        <p>
            <label for="title">New Post Title: </label>
                <input type="text" id="title" name="title" value="{{{ Input::old('new_title') }}}">
        </p>        
        <br>
        <p>
            <label for="body">New Post: </label>
                <textarea type="textbox" id="body" name="body">{{{ Input::old('new_post') }}}</textarea>
        </p> 
        <p>
            <input type="submit">       
    </form>