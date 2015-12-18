@extends('layouts.master')
@section('title')
    Climb Keeper - Edit Profile
@stop

@section('head')
@stop

@section('content')
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method='POST' action='/user/edit' enctype='multipart/form-data'>
        {!! csrf_field() !!}
        <input type='hidden' name='id' value='{{ $user->id }}'>
        <div class="form-group">
            <label for="climbing_style">Preffered Climbing Style</label>
            <select class="form-control" name='climbing_style' id="climbing_style">
                <option value="Bouldering">Bouldering</option>
                <option value="DWS">DWS (Deep Water Solo)</option>
                <option value="Free Solo">Free Solo</option>
                <option value="Sport">Sport</option>
                <option value="Trad">Traditional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="location">Choose a region that you climb in the most. </label>
            <select class="form-control" name ='location' id="location">
                <option value="NorthWest">NW</option>
                <option value="SouthWest">SW</option>
                <option value="South">South</option>
                <option value="MidWest">Midwest</option>
                <option value="NorthEast">NorthEast</option>
            </select>
        </div>
        <div class="form-group">
            <label for="profile">Upload a new profile picture</label>
            <input type="file" name='profile' id="profile">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@stop
