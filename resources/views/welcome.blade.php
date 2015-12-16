@extends('layouts.master')
@section('title')
    Climb Keeper - Please Sign In
@stop

@section('head')
    <link href="../dist/css/offcanvas.css" rel="stylesheet">
@stop

@section('content')
    @if(Auth::check())
        <div class="jumbotron">
            <h1 class="page-header">Climb Keeper</h1>
                <p>Welcome, <strong>{{$user->username}}</strong></p>
        </div>
        <div class="row">
            <div class="col-xs-6 col-lg-4">
                <h2><a href="/climbs">Browse Climb Keeper</a></h2>
                <p>See what others are climbing and find climbs to add!</p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
                <h2><a href="/climbs/create">Create a New Climb</a></h2>
                <p>Just completed a first ascent? Add it here!</p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
                <h2><a href="/user/{{$user->id}}">Go To Your Profile</a></h2>
                <p>Browse or edit your completed climbs.</p>
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    @else
        <div class="jumbotron">
            <h1 class="page-header">Climb Keeper</h1>
        </div>
        <div class="row">
            <div class="col-xs-6 col-lg-4">
                <h2><a href="/climbs">Browse Climb Keeper</a></h2>
                <p>See what others are climbing and find climbs to add!</p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
                <h2><a href="/login">Login</a></h2>
                <p>Login to Climb Keeper and start adding climbs!</p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
                <h2><a href="/register">Register</a></h2>
                <p>No account? No problem. Register here.</p>
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    @endif

@stop
