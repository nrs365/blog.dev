@extends('layouts.master')

@section('content')
    The random dice roll was: <?= $random; ?><br>
    Your guess was: <?= $guess; ?><br>
    @if ($random == $guess)
        <p style="color:green;">Your guess was correct!</p>
    @else
        <p style="color:red;">Sorry, please try again!</p>
    @endif 
@stop