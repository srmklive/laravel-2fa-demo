@extends('layouts.app')

@section('content')
    <div class="register-logo">
        2-factor Authentication
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Validate your 2-factor authentication token</p>
        <form method="POST" action="{{url('auth/token')}}">
            {!! csrf_field() !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group has-feedback">
                <input type="type" name="token" class="form-control" placeholder="Token">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7"></div><!-- /.col -->
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Verify Token</button>
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.form-box -->
@endsection
