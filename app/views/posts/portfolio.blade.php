@extends('layouts.blog_master')

@section('content')
    <body>
          
                            
    <div class="container">    
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