@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
<<<<<<< HEAD
                <div class="panel-heading">Авторизация</div>
=======
                <div class="panel-heading">Войти</div>
>>>>>>> JobObject
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<<<<<<< HEAD
                            <label class="col-md-4 control-label">E-Mail адрес</label>
=======
                            <label class="col-md-4 control-label">Электронная почта</label>
>>>>>>> JobObject

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Запомнить меня
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Войти
                                </button>

<<<<<<< HEAD
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли пароль?</a>
=======
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли пароль</a>
>>>>>>> JobObject
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                                         Ещё не зарегистрированы?<a class="Register--link" href="{{ url('/register') }}">Регистрация</a>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-4">

        Ещё не зарегистрированы? <a href="/register">Регистрация</a>
        </div>
     </div>
@endsection
