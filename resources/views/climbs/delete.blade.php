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
        <a href='/climb/delete/{{$climb->id}}'>Yes.</a>
    </p>
    <p>
        <a href='/'>WAIT! I made a HUGE mistake.</a>
    </p>

@stop