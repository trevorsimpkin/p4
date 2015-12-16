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
        <h3><a href =/climbs/add/{{$climb->id}} '#'>Would you Like to Add This Climb?</a></h3>
    @endif
    <form method='POST' action=''>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $climb->id }}'>

        <div class="form-group">
            <label for="title">Title of Climb</label>
            <input type="text" name='title'class="form-control" id="title" value='{{ $climb->title }}'>
        </div>
        <div class="form-group">
            <label for="difficulty">Difficulty(e.g. V6, 5.10a, etc. )</label>
            <input type="text" name='difficulty' class="form-control" id="difficulty" value='{{ $climb->difficulty }}'>
        </div>
        <div class="form-group">
            <label for='safety_rating'>Safety Rating</label>
            <select class="form-control" name='safety_rating' id="safety_rating">
                <option value="G">G</option>
                <option value="PG">PG</option>
                <option value="PG13">PG13</option>
                <option value="R">R</option>
                <option value="X">X</option>
                <option value="NA">N/A</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_climbed">Date Climbed</label>
            <input type="date" name='date_climbed'class="form-control" id="date_climbed" value='{{ $climb->date_climbed }}'>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name='location'class="form-control" id="location" value='{{ $climb->location }}'>
        </div>
        <div class="form-group">
            <label for="description">Description (e.g. Best climb in the area, Filled with trash) </label>
            <input type="text" name='description'class="form-control" id="description" value='{{ $climb->description }}'>
        </div>
        <div class="form-group">
            <label for="type">Climb Style</label>
            <select class="form-control" name='type' id="type">
                <option value="bouldering">Bouldering</option>
                <option value="dwfs">DWFS (Deep Water Free Solo)</option>
                <option value="free solo">Free Solo</option>
                <option value="sport">Sport</option>
                <option value="trad">Traditional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mountain_project_link">Paste the link to Mountain Project here if it exists </label>
            <input type="text" name='mountain_project_link'class="form-control" id="mountain_project_link" value='{{ $climb->mountain_project_link }}'>
        </div>
        <div class="form-group">
            <label for="pic">Upload a picture of the climb</label>
            <input type="file" name='pic' id="pic">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@stop
