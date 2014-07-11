@extends('layouts.master')

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
                            <a href="{{{ action('HomeController@showPortfolio') }}}">Home</a>
                        </li>   
                        <li class="">
                            <a href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a>
                        </li>   
                        <li class="active">
                        <a href="{{{ action('HomeController@showResume') }}}">Resume</a>
                        </li>
                    <ul>
                </div>
            </div>
        </div>
    </div>

<!--Name and title container-->
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        Nicole 
        <small>Junior Software Developer</small>
        </h1>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1">
            <h5>CONTACT</h5>
        </div>
        <div class="col-lg-6">
            <address>
                <strong>Nicole S.</strong>
                <br>
                <a href="mailto:#">nrs365@gmail.com</a>
            </address>
        </div>
        <div class="col-lg-3">
            <p>
            <a href="#">LinkedIn</a>
            <br>
            <a href="http://www.github.com/nrs365">GitHub</a>
            </p>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-2 col-lg-offset-1">
                <h5>WORK EXPERIENCE</h5>
            </div>
            <div class="col-lg-6">
                <p>
                    <strong>Best Buy</strong>
                    <br>
                    Wireless Lead; Mobile Sales Consultant
                </p>
            </div>
        <div class="col-lg-3">
            <p>October, 2007 - August, 2010</p>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            <p>
                <strong>Private tutor</strong>
                <br>
                Tutor English Second Language student; 4th and 5th grade
            </p>
            </div>
            <div class="col-lg-3">
                <p>March, 2013 - Present</p>
            </div>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            <p>
                <strong>add</strong>
                <br>
                add
            </p>
            </div>
            <div class="col-lg-3">
                <p>add</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-2 col-lg-offset-1">
                <h5>EDUCATION AND ACADEMICS</h5>
            </div>
            <div class="col-lg-6">
                <p>
                    <strong>Texas A&M Univeristy at San Antonio</strong>
                    <br>
                    Master's of Arts in English Literature
                    Thesis
                </p>
            </div>
        <div class="col-lg-3">
            <p>August, 2010 - August, 2012</p>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            <p>
                <strong>University of Texas at San Antonio</strong>
                <br>
                Bachelor of Art Degree in English, Philosophy (double major)
            </p>
            </div>
            <div class="col-lg-3">
                <p>August, 2004 - 2010</p>
            </div>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            <p>
                <strong>South Atlantic Modern Language Association (SAMLA) Conference, Atlanta, GA</strong>
                <br>
                Title of the paper of HW
            </p>
            </div>
            <div class="col-lg-3">
                <p>November, 2011</p>
            </div>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            <p>
                <strong></strong>
                <br>
            Confrences and academics
            </p>
            </div>
            <div class="col-lg-3">
                <p>March, 2013 - Present</p>
            </div>
        </div>
    </div>
@stop
</body>
</html>