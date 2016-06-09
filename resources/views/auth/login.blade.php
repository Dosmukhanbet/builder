@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
                    <h3 class="form_header">Вход в систему</h3>
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-8 control-label">Электронная почта</label>

                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-8 control-label">Пароль</label>

                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary __button">
                                    <i class="fa fa-btn fa-sign-in"></i>Войти
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}" style="margin-left: 15px">Забыли пароль</a>

                            </div>
                        </div>


                    </form>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                    <hr>
                    </div>


        <div class="col-md-6 col-md-offset-4">
        <p class="register__link">Ещё не зарегистрированы? <a href="/register">Регистрация</a></p>
        </div>
     </div>
@endsection
