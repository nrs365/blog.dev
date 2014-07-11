<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>From Philosophy to Programming</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/bootstrap-3.2.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="/bootstrap-3.2.0/blog-home/css/bootstrap.min.css">
    <link rel="stylesheet" type="css" href="/bootstrap-3.2.0/css/demo.css"/>
    <link href="/bootstrap-3.2.0/css/carousel.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <style>
        body {
            padding-top: 85px;
            padding-left: 85px;
            padding-right:85px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Navigation Bar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">From Philosophy to Programming</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse pull-right">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('portfolio') ? 'active' : '' }}"><a href="/portfolio">Portfolio</a>
                    </li>
                    <li class="{{ Request::is('resume') ? 'active' : '' }}"><a href="resume">Resume</a>
                    </li>
                    <li class="{{ Request::is('posts') ? 'active' : '' }}"><a href="posts">Blog</a>
                    </li>    
                    <li class="{{ Request::is('contact')  ? 'active' : ''}}"><a href="contact">Contact</a>
                    @if (Auth::check())
                        <li class="right"><a href="{{ action('PostsController@create') }}">Create</a></li>
                        <li class-"right"><a href="{{ action('HomeController@logout') }}">Logout</a></li>
                    @else
                        <li class="right"><a href="{{ action('HomeController@showLogin') }}">Login</a></li>
                    @endif    
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
</nav> 

        

        @if (Session::has('successMessage'))
            <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
        @endif  

    @yield('topscript')

    @yield('content')

    @yield('bottomscript')

</body>
</html>    

    