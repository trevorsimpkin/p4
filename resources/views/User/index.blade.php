@extends('layouts.master')
@section('title')
    Climb Keeper - Your Climbs
@stop

@section('head')
@stop

@section('content')
    <h1>Welcome, {{$user->username}}!</h1>
    <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="/uploads/{{$user->profile}}" width="200" height="200" class="img-responsive" alt="Profile Picture">
        </div>
    </div>
    <h2 class="sub-header">Your Climbs</h2>
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
                <th>Administrator?</th>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
