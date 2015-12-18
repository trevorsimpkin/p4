@extends('layouts.master')
@section('title')
    Climb Keeper - Create a new Climb
@stop

@section('head')
@stop

@section('content')
    <h2>Create a New Climb!</h2>
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method='POST' action='/climbs/create'>
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Title of Climb</label>
            <input type="text" name='title'class="form-control" id="title" value='{{ old('title') }}'>
        </div>
        <div class="form-group">
            <label for="difficulty">Difficulty(e.g. V6, 5.10a, etc. )</label>
            <select class = "form-control" name="difficulty" id="difficulty">
                <optgroup label="YDS (USA)">
                    <option value="5.5" {{old('difficulty') == '5.5' ? 'selected="selected"': ''}}>5.5</option>
                    <option value="5.6" {{old('difficulty') == '5.6' ? 'selected="selected"': ''}}>5.6</option>
                    <option value="5.7" {{old('difficulty') == '5.7' ? 'selected="selected"': ''}}>5.7</option>
                    <option value="5.8" {{old('difficulty') == '5.8' ? 'selected="selected"': ''}}>5.8</option>
                    <option value="5.9" {{old('difficulty') == '5.9' ? 'selected="selected"': ''}}>5.9</option>
                    <option value="5.10a" {{old('difficulty') == '5.10a' ? 'selected="selected"': ''}}>5.10a</option>
                    <option value="5.10b" {{old('difficulty') == '5.10b' ? 'selected="selected"': ''}}>5.10b</option>
                    <option value="5.10c" {{old('difficulty') == '5.10c' ? 'selected="selected"': ''}}>5.10c</option>
                    <option value="5.10d" {{old('difficulty') == '5.10d' ? 'selected="selected"': ''}}>5.10d</option>
                    <option value="5.11a" {{old('difficulty') == '5.11a' ? 'selected="selected"': ''}}>5.11a</option>
                    <option value="5.11b" {{old('difficulty') == '5.11b' ? 'selected="selected"': ''}}>5.11b</option>
                    <option value="5.11c" {{old('difficulty') == '5.11c' ? 'selected="selected"': ''}}>5.11c</option>
                    <option value="5.11d" {{old('difficulty') == '5.11d' ? 'selected="selected"': ''}}>5.11d</option>
                    <option value="5.12a" {{old('difficulty') == '5.12a' ? 'selected="selected"': ''}}>5.12a</option>
                    <option value="5.12b" {{old('difficulty') == '5.12b' ? 'selected="selected"': ''}}>5.12b</option>
                    <option value="5.12c" {{old('difficulty') == '5.12c' ? 'selected="selected"': ''}}>5.12c</option>
                    <option value="5.12d" {{old('difficulty') == '5.12d' ? 'selected="selected"': ''}}>5.12d</option>
                    <option value="5.13a" {{old('difficulty') == '5.13a' ? 'selected="selected"': ''}}>5.13a</option>
                    <option value="5.13b" {{old('difficulty') == '5.13b' ? 'selected="selected"': ''}}>5.13b</option>
                    <option value="5.13c" {{old('difficulty') == '5.13c' ? 'selected="selected"': ''}}>5.13c</option>
                    <option value="5.13d" {{old('difficulty') == '5.13d' ? 'selected="selected"': ''}}>5.13d</option>
                    <option value="5.14a" {{old('difficulty') == '5.14a' ? 'selected="selected"': ''}}>5.14a</option>
                    <option value="5.14b" {{old('difficulty') == '5.14b' ? 'selected="selected"': ''}}>5.14b</option>
                    <option value="5.14c" {{old('difficulty') == '5.14c' ? 'selected="selected"': ''}}>5.14c</option>
                    <option value="5.14d" {{old('difficulty') == '5.14d' ? 'selected="selected"': ''}}>5.14d</option>
                    <option value="5.15a" {{old('difficulty') == '5.15a' ? 'selected="selected"': ''}}>5.15a</option>
                    <option value="5.15b" {{old('difficulty') == '5.15b' ? 'selected="selected"': ''}}>5.15b</option>
                </optgroup>
                <optgroup label="Bouldering-Hueco">
                    <option value="V0" {{old('difficulty') == 'V0' ? 'selected="selected"': ''}}>V0</option>
                    <option value="V1" {{old('difficulty') == 'V1' ? 'selected="selected"': ''}}>V1</option>
                    <option value="V2" {{old('difficulty') == 'V2' ? 'selected="selected"': ''}}>V2</option>
                    <option value="V3" {{old('difficulty') == 'V3' ? 'selected="selected"': ''}}>V3</option>
                    <option value="V4" {{old('difficulty') == 'V4' ? 'selected="selected"': ''}}>V4</option>
                    <option value="V5" {{old('difficulty') == 'V5' ? 'selected="selected"': ''}}>V5</option>
                    <option value="V6" {{old('difficulty') == 'V6' ? 'selected="selected"': ''}}>V6</option>
                    <option value="V7" {{old('difficulty') == 'V7' ? 'selected="selected"': ''}}>V7</option>
                    <option value="V8" {{old('difficulty') == 'V8' ? 'selected="selected"': ''}}>V8</option>
                    <option value="V9" {{old('difficulty') == 'V9' ? 'selected="selected"': ''}}>V9</option>
                    <option value="V10" {{old('difficulty') == 'V10' ? 'selected="selected"': ''}}>V10</option>
                    <option value="V11" {{old('difficulty') == 'V11' ? 'selected="selected"': ''}}>V11</option>
                    <option value="V12" {{old('difficulty') == 'V12' ? 'selected="selected"': ''}}>V12</option>
                    <option value="V13" {{old('difficulty') == 'V13' ? 'selected="selected"': ''}}>V13</option>
                    <option value="V14" {{old('difficulty') == 'V14' ? 'selected="selected"': ''}}>V14</option>
                    <option value="V15"{{old('difficulty') == 'V15' ? 'selected="selected"': ''}}>V15</option>
                    <option value="V16"{{old('difficulty') == 'V16' ? 'selected="selected"': ''}}>V16</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group">
            <label for='safety_rating'>Safety Rating</label>
            <select class="form-control" name='safety_rating' id="safety_rating">
                <option value="G"{{old('safety_rating') == 'G' ? 'selected="selected"':''}}>G</option>
                <option value="PG" {{old('safety_rating') == 'PG' ? 'selected="selected"':''}}>PG</option>
                <option value="PG13" {{old('safety_rating') == 'PG13' ? 'selected="selected"':''}}>PG13</option>
                <option value="R" {{old('safety_rating') == 'R' ? 'selected="selected"':''}}>R</option>
                <option value="X" {{old('safety_rating') == 'X' ? 'selected="selected"':''}}>X</option>
                <option value="NA" {{old('safety_rating') == 'NA' ? 'selected="selected"':''}}>N/A</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_climbed">Date Climbed</label>
            <input type="date" name='date_climbed'class="form-control" id="date_climbed" value='{{old('date_climbed')}}'>
        </div>
        <div class="form-group">
            <label for="location">Choose a region that you climb in the most. </label>
            <select class="form-control" name ='location' id="location">
                <option value="Northwest" {{old('location') == 'Northwest' ? 'selected="selected"': ''}}> Northwest</option>
                <option value="Southwest" {{old('location') == 'Southwest' ? 'selected="selected"': ''}}>Sothwest</option>
                <option value="South" {{old('location') == 'South' ? 'selected="selected"': ''}}>South</option>
                <option value="Midwest" {{old('location') == 'Midwest' ? 'selected="selected"': ''}}>Midwest</option>
                <option value="Northeast" {{old('location') == 'Northeast' ? 'selected="selected"': ''}}>Northeast</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description (e.g. Best climb in the area, Filled with trash) </label>
            <textarea name='description'class="form-control" id="description" rows="5">{{ $climb->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="type">Climb Style</label>
            <select class="form-control" name='type' id="type">
                <option value="Bouldering" {{old('type') == 'Bouldering' ? 'selected="selected"':''}}>Bouldering</option>
                <option value="DWS" {{old('type') == 'DWS' ? 'selected="selected"':''}}>DWS (Deep Water Solo)</option>
                <option value="Free Solo" {{old('type') == 'Free Solo' ? 'selected="selected"':''}}>Free Solo</option>
                <option value="Sport" {{old('type') == 'Sport' ? 'selected="selected"':''}}>Sport</option>
                <option value="Trad" {{old('type') == 'Trad' ? 'selected="selected"':''}}>Traditional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mountain_project_link">Paste the link to Mountain Project here if it exists </label>
            <input type="text" name='mountain_project_link'class="form-control" id="mountain_project_link" value='{{old('mountain_project_link')}}'>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@stop
