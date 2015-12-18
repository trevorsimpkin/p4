@extends('layouts.master')
@section('title')
    Climb Keeper - Please Sign In
@stop

@section('head')

@stop

@section('content')
    <h2 class="sub-header">Climbs</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><a href="/climbs?sort=title">Title</a></th>
                <th><a href="/climbs?sort=difficulty">Difficulty</a></th>
                <th><a href="/climbs?sort=type">Type of Climb</a></th>
                <th><a href="/climbs?sort=location">Location</a></th>
                <th><a href="/climbs?sort=safety_rating">Safety Rating</a></th>
                <th><a href="/climbs?sort=date_climbed">Date Climbed</a></th>
                <th>Add To your Climb?</th>
                <th>Mountain Project Link</th>
            </tr>
            </thead>
            <tbody>
            @foreach($climbs as $climb)
            <tr>
                    <td><a href = "/climbs/show/{{$climb->id}}">{{$climb->title}}</a></td>
                    <td>{{$climb->difficulty}}</td>
                    <td>{{$climb->type}}</td>
                    <td>{{$climb->location}}</td>
                    <td>{{$climb->safety_rating}}</td>
                    <td>{{$climb->date_climbed}}</td>
                    <td><a href ="/user/addclimb/{{$climb->id}}">+</a></td>
                <td><a href ="{{$climb->mountain_project_link != '' ? $climb->mountain_project_link: '#'}}">MP</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! $climbs->render() !!}
@stop
