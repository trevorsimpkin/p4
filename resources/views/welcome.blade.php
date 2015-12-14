@extends('layouts.master')
@section('title')
    Climb Keeper - Please Sign In
@stop

@section('head')
@stop

@section('content')
    <h1 class="page-header">Climb Keeper</h1>
    @if(Auth::check())
        <h2>Welcome, {{Auth::user()->username}}</h2>
        <p>Browse climbs below or Add a new Climb!</p>
    @else
        <h2>Welcome!</h2>
        <p><a href = "/login"> Login</a> to start adding climbs!</p>
        <p>Or browse what others are climbing!</p>
    @endif
    <h3 class="sub-header">Recently added climbs</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Difficulty</th>
                <th>Type of Climb</th>
                <th>Location</th>
                <th>Safety Rating</th>
                <th>Date Climbed</th>
                <th>Administrator Username</th>
            </tr>
            </thead>
            <tbody>
            @foreach($climbs as $climb)
                <tr>
                    <td><a href="/climbs/show/{{$climb->id}}">{{$climb->title}}</a></td>
                    <td>{{$climb->difficulty}}</td>
                    <td>{{$climb->type}}</td>
                    <td>{{$climb->location}}</td>
                    <td>{{$climb->safety_rating}}</td>
                    <td>{{$climb->date_climbed}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! $climbs->render() !!}
@stop
