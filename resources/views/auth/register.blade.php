@extends('layouts.master')
@section('title')
    Climb Keeper - Register
@stop

@section('head')
@stop

@section('content')
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input type="username" class="form-control" id="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="climbing_style">Preffered Climbing Style</label>
            <select class="form-control" id="climbing_style">
                <option>Bouldering</option>
                <option>DWFS (Deep Water Free Solo)</option>
                <option>Free Solo</option>
                <option>Sport</option>
                <option>Traditional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="location">Choose a region that you climb in the most. </label>
            <select class="form-control" id="location">
                <option>NW</option>
                <option>SW</option>
                <option>South</option>
                <option>Midwest</option>
                <option>NorthEast</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image_file">Upload a profile picture</label>
            <input type="file" id="image_file">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@stop