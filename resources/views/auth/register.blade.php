@extends('layouts.master')
@section('title')
    Climb Keeper - Register
@stop

@section('head')
@stop

@section('content')
    <p>Already have an account? <a href='/login'>Login here...</a></p>
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method='POST' action='/register'>
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name='email'class="form-control" id="email" value='{{ old('email') }}'>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name='password' class="form-control" id="password" value='{{ old('password') }}'>
        </div>
        <div class="form-group">
            <label for='password_confirmation'>Confirm Password</label>
            <input type="password" name='password_confirmation' id='password_confirmation' class="form-control">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name='username'class="form-control" id="username" value='{{old('username')}}'>
        </div>
        <div class="form-group">
            <label for="climbing_style">Preffered Climbing Style</label>
            <select class="form-control" name='climbing_style' id="climbing_style">
                <option value="bouldering">Bouldering</option>
                <option value="dwfs">DWFS (Deep Water Free Solo)</option>
                <option value="free solo">Free Solo</option>
                <option value="sport">Sport</option>
                <option value="trad">Traditional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="location">Choose a region that you climb in the most. </label>
            <select class="form-control" name ='location' id="location">
                <option value="nw">NW</option>
                <option value="sw">SW</option>
                <option value="s">South</option>
                <option value="mw">Midwest</option>
                <option value="ne">NorthEast</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image_file">Upload a profile picture</label>
            <input type="file" name='image_file' id="image_file">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@stop
