@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Регистрация</div>
                <div class="panel-body">

                   <form @keyup.enter="onEnter"  class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                         <div class="form-group">
                             <label class="col-md-4 control-label"></label>
                                 <div class="col-md-6">
                                       <select name="type" id="type" class="form-control">
                                              <option value="master"> Мастер </option>
                                              <option value="client"> Клиент </option>
                                        </select>
                                  </div>
                          </div>

                        <div class="form-group">
                             <label class="col-md-4 control-label">Город</label>
                              <div class="col-md-6">
                                    <select name="city_id" id="city_id" class="form-control">
                                        @foreach($cities as $id => $name)
                                          <option value="{{ $id }}"> {{ $name }} </option>
                                        @endforeach
                                    </select>
                              </div>
                         </div>


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Имя</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <label class="col-md-4 control-label">Email адрес</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Подтверждение пароля</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <sendsms code="{{ json_encode(mt_rand('999', '10000')) }}"></sendsms>

                            @if ($errors->has('phone_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
