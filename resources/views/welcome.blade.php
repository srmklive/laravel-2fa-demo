@extends('layouts.app')

@section('content')
    <div class="login-logo">
        Home Page
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <a class="btn btn-block btn-social" href="{{url('login')}}" class="text-center">Login into your account</a><br>
        <a class="btn btn-block btn-social" href="{{url('password/reset')}}">I forgot my password</a><br>
        <a class="btn btn-block btn-social" href="{{url('register')}}" class="text-center">Register a new membership</a>
    </div>
@endsection
