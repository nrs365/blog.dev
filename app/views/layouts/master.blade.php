<!doctype html>
<html lang="en">
<head>
    <title>{{{ $title or "My Site Title" }}}</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/bootstrap-3.2.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="/bootstrap-3.2.0/blog-home/css/bootstrap.min.css">
    <link rel="stylesheet" type="css" href="/bootstrap-3.2.0/css/demo.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        @if (Auth::check())
             {{{ Auth::user()->email }}}<br>
             {{ link_to_action('PostsController@create', 'Create Post') }}<br>
             {{ link_to_action('HomeController@logout', 'Log out') }}<br>
        @else
             {{ link_to_action('HomeController@showLogin', 'Login') }}<br>
        @endif

        @if (Session::has('successMessage'))
            <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
        @endif        
            
        @yield('content')
        
        @yield('bottomscript')
   </div> 

</body>
</html>