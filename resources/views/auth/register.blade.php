@extends('layouts.app')

@section('content')
    <div class="register-logo">
        Register
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form method="POST" action="{{url('register')}}">
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
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8"></div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div><!-- /.col -->
            </div>
        </form><br>

        <a class="btn btn-block btn-social" href="{{url('login')}}" class="text-center">Login into your account</a><br>
        <a class="btn btn-block btn-social" href="{{url('password/reset')}}">I forgot my password</a>
    </div><!-- /.form-box -->
@endsection
