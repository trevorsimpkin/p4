@extends('layouts.master')

@section('title')
    Climb Keeper - Delete Confirmation
@stop


@section('content')

    <h1>Delete Climb</h1>

    <p>
        Are you sure you want to delete <em>{{$climb->title}}</em>?
    </p>
    <p>
        You can also <a href = '/climbs/admin/{{$climb->id}}'>give administrator priviliges to another user.</a>
    </p>
    <p>
        <a href='/climbs/delete/{{$climb->id}}'>I want this climb gone FOREVER!</a>
    </p>
    <p>
        <a href='/'>WAIT! I made a HUGE mistake.</a>
    </p>

@stop