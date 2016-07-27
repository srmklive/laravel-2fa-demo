@extends('layouts.app')

@section('content')
    <div class="register-logo">
        Password Reset
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Reset your account password</p>
        <form method="POST" action="{{url('password/reset')}}">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">

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
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-6"></div><!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                </div><!-- /.col -->
            </div>
        </form><br>

        <a class="btn btn-block btn-social" href="{{url('login')}}" class="text-center">Login into your account</a><br>
        <a class="btn btn-block btn-social" href="{{url('register')}}" class="text-center">Register a new membership</a>
    </div><!-- /.form-box -->
@endsection
