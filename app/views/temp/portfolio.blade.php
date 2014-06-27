@extends('layouts.master')

@section('topscript')
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
@stop

@section('content')
<body>
    <!--fixed navigation bar at the top of the page -->
    <div id="wrap">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar">Icon</span>
                        <span class="icon-bar">Icon</span>
                        <span class="icon-bar">Icon</span>
                        <span class="icon-bar">Icon</span>
                    </button>
                    <a class="navbar-brand" href="/">My Blog</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class>
                            <a href="/">Home</a>
                        </li>   
                        <li class="active">
                            <a href="/portfolio">Portfolio</a>
                        </li>   
                        <li class>
                        <a href="/resume">Resume</a>
                        </li>
                    <ul>
                </div>
            </div>
        </div>
    </div>  
                        

    <!--First container row for larger picture and description -->
    <div class="row">
        <div class="col-lg-7 col-md-7">
            <a href="#">
                <img class="img_portfolio1" src="/700x300">
            </a>
        </div>
        <div class='col-lg-5 col-md-5'>
        <h3>Most recent projects</h3>
        <h4>Work at Codeup</h4>
        <p>Here's a description of my most recent project at Codeup</p>
            <a class="button_project1" href="#">View Project<span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>          
    </div>
    <!-- Second container for smaller pictures and decriptions -->
    <div class="col-lg-12 col-md-12">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" data-scr="holder.js/100x100" alt="100x100" style="width: 100px; height: 100px;" src="">
            </a>    
            <div class="media-body">
                <h4 class="media-heading">Other projects</h4>
                <p>Description of other projects</p>
            </div>
        </div>
    </div>      

        <!-- Third container for smaller picture and description-->
    <div class="col-lg-12 col-md-12">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" data-scr="holder.js/100x100" alt="100x100" style="width: 100px; height: 100px;" src="">
            </a>    
            <div class="media-body">
                <h4 class="media-heading">Other projects</h4>
                <p>Description of other projects</p>
            </div>
        </div>
    </div>      
@stop
</body>
</html>