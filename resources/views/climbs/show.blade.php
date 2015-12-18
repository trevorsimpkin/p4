@extends('layouts.master')
@section('title')
    Climb Keeper - Show Climb
@stop

@section('head')
@stop

@section('content')
    <h2>{{$climb->title}}</h2>
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(!$exists)
        <p><a href =/user/addclimb/{{$climb->id}} '#'> + Add this to your climbs</a></p>
    @endif
            <label>Title of Climb: </label>
            <p>{{ $climb->title }}</p>
            <label>Difficulty: </label>
            <p>{{$climb->difficulty }}</p>
            <label>Safety Rating: </label>
            <p>{{$climb->safety_rating}}</p>
            <label>Date Climbed: </label>
            <p>{{ $climb->date_climbed }}</p>
            <label>Location</label>
            <p>{{ $climb->location}}</p>
            <label>Description: </label>
            <p>{{ $climb->description }}</p>
            <label>Climb Type: </label>
            <p>{{ $climb->type}}</p>
            <label>Mountain Project Link:  </label>
            <p><a href='{{ $climb->mountain_project_link }}'>Mountain Project</a></p>
@stop
