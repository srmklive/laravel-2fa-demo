@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Two-factor Authentication</div>
                    <div class="panel-body">
                        @if($twofactor_enabled)
                            @if(!empty($success))
                                <div class="alert alert-success">{{$success}}</div>
                            @endif
                            <form method="POST" action="{{url('auth/two-factor')}}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
