@extends('layouts.app')

@section('content')
    <div class="login-logo">
        Dashboard
    </div>
    <div class="login-box-body">
    @if($twofactor_enabled)
        @if(!empty($success))
            <div class="alert alert-success">{{$success}}</div>
        @endif
        <form method="POST" action="{{url('auth/twofactor/disable')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-6"><br>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Disable 2-factor Auth</button>
                </div>
                <div class="col-xs-3"></div>
            </div>
        </form>
    @else
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @include('authy::form')
    @endif
    <a class="btn btn-block btn-social" href="{{url('logout')}}" class="text-center">Logout of your account</a>
    </div>
@endsection
