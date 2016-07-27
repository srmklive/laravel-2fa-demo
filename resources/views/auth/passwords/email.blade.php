@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="login-logo">
        Forgot Password
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Type your email to reset your password</p>
        <form method="POST" action="{{url('password/email')}}">
            {!! csrf_field() !!}

            @if (count($errors) > 0)
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group has-feedback">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4"></div><!-- /.col -->
                <div class="col-xs-8">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="{{url('login')}}">Login into your account</a><br>
        <a href="{{url('register')}}" class="text-center">Register a new membership</a>

    </div><!-- /.login-box-body -->
@endsection
