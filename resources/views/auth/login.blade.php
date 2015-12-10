@extends('layouts.master')
@section('title')
    Climb Keeper - Please Sign In
@stop

@section('head')
@stop

@section('content')
    <div class="container">
        <div class="col-xs-6 col-sm-3">
            <form method='POST' action = '/login' class="form-signin">
                {!! csrf_field() !!}
                <h2 class="form-signin-heading">Please sign in</h2>
                @if(count($errors) > 0)
                    <ul class='errors'>
                        @foreach ($errors->all() as $error)
                            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <label for="email" class="sr-only">Email address</label>
                <input type="email" name = 'email' id="email" class="form-control" value='{{ old('email') }}'>
                <label for="password" class="sr-only">Password</label>
                <input type="password" name = 'password' id="password" class="form-control" value='{{ old('password') }}'>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <input type='checkbox' name='remember' id='remember'>
                <label for='remember' class='checkboxLabel'>Remember me</label>
                <a href="#">Forgot Password?</a>
                <p>Don't have an account? <a href='/register'>Register here...</a></p>
            </form>
        </div>
    </div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
@stop
