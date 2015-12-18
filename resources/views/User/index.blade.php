@extends('layouts.master')
@section('title')
    Climb Keeper - Your Climbs
@stop

@section('head')
@stop

@section('content')
        <h1 class="page-header">Welcome, {{$user->username}}!</h1>

        <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src='/uploads/{{$user->profile}}' width="100" height="100" class="img-responsive" alt="Profile Picture">
                <h4>Climbing Style:  {{$user->climbing_style}}</h4>
                <p class="text-muted">Location: {{$user->location}}</p>
                <p><a href="/user/edit/{{$user->id}}}">EDIT PROFILE</a></p>
            </div>
        </div>
    <h2 class="sub-header">Your Climbs</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title (Click to Edit)</th>
                <th>Difficulty</th>
                <th>Type of Climb</th>
                <th>Location</th>
                <th>Safety Rating</th>
                <th>Date Climbed</th>
                <th>Administrator?</th>
                <th>    </th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->climbs as $climb)
                <tr>
                    <td><a href="/climbs/edit/{{$climb->id}}">{{$climb->title}}</a></td>
                    <td>{{$climb->difficulty}}</td>
                    <td>{{$climb->type}}</td>
                    <td>{{$climb->location}}</td>
                    <td>{{$climb->safety_rating}}</td>
                    <td>{{$climb->date_climbed}}</td>
                    @if($user->id == $climb->administrator)
                        <td>Yes</td>
                    @else
                        <td>No</td>
                    @endif
                    <td><a href ="/user/removeclimb/{{$climb->id}}">Remove?</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
