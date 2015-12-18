@extends('layouts.master')
@section('title')
    Climb Keeper - Edit the climb
@stop

@section('head')
@stop

@section('content')
    <h2>Edit The Climb!</h2>
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <h4><a href = '/climbs/confirm-delete/{{$climb->id}}'>Would you Like to Delete This Climb?</a></h4>
    <h4><a href = '/climbs/admin/{{$climb->id}}'>Or give administrator privileges to another user?</a></h4>
    <form method='POST' action='/climbs/edit'>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $climb->id }}'>

        <div class="form-group">
            <label for="title">Title of Climb</label>
            <input type="text" name='title' class="form-control" id="title" value='{{ $climb->title }}'>
        </div>
        <div class="form-group">
            <label for="difficulty">Difficulty(e.g. V6, 5.10a, etc. )</label>
            <select class = "form-control" name="difficulty" id="difficulty">
                <optgroup label="YDS (USA)">
                    <option value="5.5" {{$climb->difficulty == '5.5' ? 'selected="selected"': ''}}>5.5</option>
                    <option value="5.6" {{$climb->difficulty== '5.6' ? 'selected="selected"': ''}}>5.6</option>
                    <option value="5.7" {{$climb->difficulty== '5.7' ? 'selected="selected"': ''}}>5.7</option>
                    <option value="5.8" {{$climb->difficulty== '5.8' ? 'selected="selected"': ''}}>5.8</option>
                    <option value="5.9" {{$climb->difficulty== '5.9' ? 'selected="selected"': ''}}>5.9</option>
                    <option value="5.10a" {{$climb->difficulty== '5.10a' ? 'selected="selected"': ''}}>5.10a</option>
                    <option value="5.10b" {{$climb->difficulty== '5.10b' ? 'selected="selected"': ''}}>5.10b</option>
                    <option value="5.10c" {{$climb->difficulty== '5.10c' ? 'selected="selected"': ''}}>5.10c</option>
                    <option value="5.10d" {{$climb->difficulty== '5.10d' ? 'selected="selected"': ''}}>5.10d</option>
                    <option value="5.11a" {{$climb->difficulty== '5.11a' ? 'selected="selected"': ''}}>5.11a</option>
                    <option value="5.11b" {{$climb->difficulty== '5.11b' ? 'selected="selected"': ''}}>5.11b</option>
                    <option value="5.11c" {{$climb->difficulty== '5.11c' ? 'selected="selected"': ''}}>5.11c</option>
                    <option value="5.11d" {{$climb->difficulty== '5.11d' ? 'selected="selected"': ''}}>5.11d</option>
                    <option value="5.12a" {{$climb->difficulty== '5.12a' ? 'selected="selected"': ''}}>5.12a</option>
                    <option value="5.12b" {{$climb->difficulty== '5.12b' ? 'selected="selected"': ''}}>5.12b</option>
                    <option value="5.12c" {{$climb->difficulty== '5.12c' ? 'selected="selected"': ''}}>5.12c</option>
                    <option value="5.12d" {{$climb->difficulty== '5.12d' ? 'selected="selected"': ''}}>5.12d</option>
                    <option value="5.13a" {{$climb->difficulty== '5.13a' ? 'selected="selected"': ''}}>5.13a</option>
                    <option value="5.13b" {{$climb->difficulty== '5.13b' ? 'selected="selected"': ''}}>5.13b</option>
                    <option value="5.13c" {{$climb->difficulty== '5.13c' ? 'selected="selected"': ''}}>5.13c</option>
                    <option value="5.13d" {{$climb->difficulty== '5.13d' ? 'selected="selected"': ''}}>5.13d</option>
                    <option value="5.14a" {{$climb->difficulty== '5.14a' ? 'selected="selected"': ''}}>5.14a</option>
                    <option value="5.14b" {{$climb->difficulty== '5.14b' ? 'selected="selected"': ''}}>5.14b</option>
                    <option value="5.14c" {{$climb->difficulty== '5.14c' ? 'selected="selected"': ''}}>5.14c</option>
                    <option value="5.14d" {{$climb->difficulty== '5.14d' ? 'selected="selected"': ''}}>5.14d</option>
                    <option value="5.15a" {{$climb->difficulty== '5.15a' ? 'selected="selected"': ''}}>5.15a</option>
                    <option value="5.15b" {{$climb->difficulty== '5.15b' ? 'selected="selected"': ''}}>5.15b</option>
                </optgroup>
                <optgroup label="Bouldering-Hueco">
                    <option value="V0" {{$climb->difficulty== 'V0' ? 'selected="selected"': ''}}>V0</option>
                    <option value="V1" {{$climb->difficulty== 'V1' ? 'selected="selected"': ''}}>V1</option>
                    <option value="V2" {{$climb->difficulty== 'V2' ? 'selected="selected"': ''}}>V2</option>
                    <option value="V3" {{$climb->difficulty== 'V3' ? 'selected="selected"': ''}}>V3</option>
                    <option value="V4" {{$climb->difficulty== 'V4' ? 'selected="selected"': ''}}>V4</option>
                    <option value="V5" {{$climb->difficulty== 'V5' ? 'selected="selected"': ''}}>V5</option>
                    <option value="V6" {{$climb->difficulty== 'V6' ? 'selected="selected"': ''}}>V6</option>
                    <option value="V7" {{$climb->difficulty== 'V7' ? 'selected="selected"': ''}}>V7</option>
                    <option value="V8" {{$climb->difficulty== 'V8' ? 'selected="selected"': ''}}>V8</option>
                    <option value="V9" {{$climb->difficulty== 'V9' ? 'selected="selected"': ''}}>V9</option>
                    <option value="V10" {{$climb->difficulty== 'V10' ? 'selected="selected"': ''}}>V10</option>
                    <option value="V11" {{$climb->difficulty== 'V11' ? 'selected="selected"': ''}}>V11</option>
                    <option value="V12" {{$climb->difficulty== 'V12' ? 'selected="selected"': ''}}>V12</option>
                    <option value="V13" {{$climb->difficulty== 'V13' ? 'selected="selected"': ''}}>V13</option>
                    <option value="V14" {{$climb->difficulty== 'V14' ? 'selected="selected"': ''}}>V14</option>
                    <option value="V15"{{$climb->difficulty== 'V15' ? 'selected="selected"': ''}}>V15</option>
                    <option value="V16"{{$climb->difficulty== 'V16' ? 'selected="selected"': ''}}>V16</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group">
            <label for='safety_rating'>Safety Rating</label>
            <select class="form-control" name='safety_rating' id="safety_rating">
                <option value="G"{{$climb->safety_rating == 'G' ? 'selected="selected"':''}}>G</option>
                <option value="PG" {{$climb->safety_rating == 'PG' ? 'selected="selected"':''}}>PG</option>
                <option value="PG13" {{$climb->safety_rating == 'PG13' ? 'selected="selected"':''}}>PG13</option>
                <option value="R" {{$climb->safety_rating == 'R' ? 'selected="selected"':''}}>R</option>
                <option value="X" {{$climb->safety_rating == 'X' ? 'selected="selected"':''}}>X</option>
                <option value="NA" {{$climb->safety_rating == 'NA' ? 'selected="selected"':''}}>N/A</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_climbed">Date Climbed</label>
            <input type="date" name='date_climbed' class="form-control" id="date_climbed" value='{{ $climb->date_climbed }}'>
        </div>
        <div class="form-group">
            <label for="location">Choose a region that you climb in the most. </label>
            <select class="form-control" name ='location' id="location">
                <option value="Northwest" {{$climb->location == 'Northwest' ? 'selected="selected"': ''}}> Northwest</option>
                <option value="Southwest" {{$climb->location == 'Southwest' ? 'selected="selected"': ''}}>Sothwest</option>
                <option value="South" {{$climb->location == 'South' ? 'selected="selected"': ''}}>South</option>
                <option value="Midwest" {{$climb->location == 'Midwest' ? 'selected="selected"': ''}}>Midwest</option>
                <option value="Northeast" {{$climb->location == 'Northeast' ? 'selected="selected"': ''}}>Northeast</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description (e.g. Best climb in the area, Filled with trash) </label>
            <textarea name='description' class="form-control" id="description" rows="5">{{ $climb->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="type">Climb Type</label>
            <select class="form-control" name='type' id="type">
                <option value="Bouldering" {{$climb->type == 'Bouldering' ? 'selected="selected"':''}}>Bouldering</option>
                <option value="DWS" {{$climb->type == 'DWS' ? 'selected="selected"':''}}>DWS (Deep Water Solo)</option>
                <option value="Free Solo" {{$climb->type == 'Free Solo' ? 'selected="selected"':''}}>Free Solo</option>
                <option value="Sport" {{$climb->type == 'Sport' ? 'selected="selected"':''}}>Sport</option>
                <option value="Trad" {{$climb->type == 'Trad' ? 'selected="selected"':''}}>Traditional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mountain_project_link">Paste the link to Mountain Project here if it exists </label>
            <input type="text" name='mountain_project_link' class="form-control" id="mountain_project_link" value='{{ $climb->mountain_project_link }}'>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@stop
