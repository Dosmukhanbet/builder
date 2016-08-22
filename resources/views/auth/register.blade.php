@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-1 Registations__info__block">
            <div class="Registations__info">
                <div class="Registations__info__header">
                    <i class="fa fa-briefcase briefcase" aria-hidden="true"></i>
                    <h4>
                         Станьте мастером
                    </h4>
                </div>
                <p>
                Станьте мастером sheber.club и зарабатывайте хорошие деньги в качестве независимого подрядчика.
                 <br>Получайте еженедельный гонорар лишь за то, что помогаете пользователям решать их бытовые проблемы.
                 <br>Будьте сами себе начальником и получайте оплату за работу, придерживаясь собственного графика.
                </p>
            </div>

            <div class="Registations__info">
                            <div class="Registations__info__header">
                                <i class="fa fa-money money" aria-hidden="true"></i>
                                <h4>
                                     Зарабатывайте хорошие деньги
                                </h4>
                            </div>
                            <p>
                                У вас золотые руки, вы профессионал своего дела? Превратите это в источник заработка!
                                <br>Начать работать можно уже сегодня.
                            </p>
            </div>

            <div class="Registations__info">
                              <div class="Registations__info__header">
                                        <i class="fa fa-clock-o clock" aria-hidden="true"></i>
                                        <h4>
                                             Работайте, когда захотите.
                                        </h4>
                              </div>
                                        <p>
                                            Есть дела до 9 или после 17? Как независимый подрядчик sheber.club, вы можете работать только тогда, когда вам удобно.
                                            <br>Самостоятельно составьте свой график работы и не пропускайте ни одного важного события вашей жизни.
                                        </p>
            </div>

        </div>
        <div class="col-md-5">
                   <h4 class="form_header">Регистрация мастера</h4>
                   <form @keyup.enter="onEnter" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                                           <input type="hidden" name="type" value="master">

                                            <div class="form-group">
                                                   <label class="col-md-12 control-label">Специальность
                                                   </label>
                                                   <div class="col-md-12">
                                                       <select
                                                       name="category_id"
                                                       id="category_id"
                                                       class="form-control"
                                                       data-toggle="popover"
                                                       data-placement="top"
                                                       data-trigger="focus"
                                                       data-content="Выберите Вашу специализацию"
                                                       required
                                                       >
                                                            <option value="" selected disabled>Выберите Вашу специализацию</option>
                                                           @foreach($categories as $id => $name)
                                                                <option value="{{ $id }}"> {{ $name }} </option>
                                                           @endforeach

                                                       </select>
                                                   </div>
                                               </div>




                                            <div class="form-group">
                                                 <label class="col-md-12 control-label">Город </label>
                                                  <div class="col-md-12">
                                                        <select
                                                        name="city_id"
                                                        id="city_id"
                                                        data-toggle="popover"
                                                        data-placement="top"
                                                        data-trigger="focus"
                                                        data-content="Выберите Ваш город, Вам будут доступны все заявки Вашего города по Вашей специальности"
                                                        class="form-control" required>
                                                        <option value="" selected disabled> Выберите Ваш город из списка
                                                                        </option>
                                                            @foreach($cities as $id => $name)
                                                              <option value="{{ $id }}"> {{ $name }} </option>
                                                            @endforeach
                                                        </select>
                                                  </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-12 control-label">Имя</label>

                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                               <label class="col-md-12 control-label">Email адрес</label>

                                                <div class="col-md-12">
                                                    <input
                                                            type="email"
                                                            placeholder="Например: aman@mail.ru"
                                                            class="form-control"
                                                            name="email"
                                                            data-toggle="popover"
                                                            data-placement="top"
                                                            data-trigger="focus"
                                                            data-content="Адрес электронной почты, который будет использоваться как логин для входа в личный кабинет. На этот адрес будут отсылаться уведомления"
                                                            value="{{ old('email') }}"
                                                            required>

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label class="col-md-12 control-label">Пароль (не менее 6-и символов)</label>

                                                <div class="col-md-12">
                                                    <input type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label class="col-md-12 control-label">Повторите пароль</label>

                                                <div class="col-md-12">
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

                                                    <div class="col-md-12">
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

@stop
@section('footer')
    <script src="/js/all.js"></script>
    <script>
                jQuery('#datetimepicker').datetimepicker({
                  format:'Y-m-d H:i',
                //  inline:true,
                  lang:'ru'
                });

                $(function () {
                  $('[data-toggle="popover"]').popover()
                });


    </script>
@stop
