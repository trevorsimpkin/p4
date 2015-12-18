@extends('layouts.master')
@section('title')
    Climb Keeper - Give Admin Privileges to Other User
@stop

@section('head')
@stop

@section('content')
    <h1>Designate new administrator of {{$climb->title}}</h1><br>
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method='POST' action='/climbs/admin'>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $climb->id }}'>

        <div class="form-group">
            <label for="administrator">Please Enter Climb Keeper username of new administrator</label>
            <input type="text" name='administrator'class="form-control" id="administrator">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@stop