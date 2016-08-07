@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
                   <h3 class="form_header">Регистрация</h3>
                   <form @keyup.enter="onEnter" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                                           <types></types>

                                            <div class="form-group">
                                                 <label class="col-md-8 control-label">Город</label>
                                                  <div class="col-md-8">
                                                        <select name="city_id" id="city_id" class="form-control" required>
                                                            @foreach($cities as $id => $name)
                                                              <option value="{{ $id }}"> {{ $name }} </option>
                                                            @endforeach
                                                        </select>
                                                  </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-8 control-label">Имя</label>

                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                               <label class="col-md-8 control-label">Email адрес</label>

                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                                    <input type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label class="col-md-8 control-label">Подтверждение пароля</label>

                                                <div class="col-md-8">
                                                    <input type="password" class="form-control" name="password_confirmation" required>

                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>




                                             <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                                    <sendsms></sendsms>

                                                    <div class="col-md-6">
                                                        @if($errors->has('phone_number'))
                                                            <span class="help-block">
                                                             <strong>{{ $errors->first('phone_number') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                             </div>







                    </form>

        </div>
    </div>

@endsection
@section('scripts.footer')
    <script src="/js/all.js"></script>
@endsection
