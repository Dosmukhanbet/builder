@extends('layouts.app')

@section('content')
<div class="row">
             <div class="col-md-11 col-md-offset-1">

                    <form role="form" method="POST" action="{{ url('/registerandcreatejob') }}">
                        {!! csrf_field() !!}

                        <div class="col-md-6">
                                            <h4 class="form_header">
                                           <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Создание заявки
                                           </h4>

                                    <div class="form-group{{ $errors->has('Кратко_о_работе') ? ' has-error' : '' }}">
                                        <label class="col-md-12 control-label">Кратко о работе</label>

                                        <div class="col-md-12">
                                            <input
                                                    autofocus
                                                    type="name"
                                                    class="form-control"
                                                    name="Кратко_о_работе"
                                                    value="{{ old('Кратко_о_работе') }}"
                                                    data-toggle="popover"
                                                    data-placement="top"
                                                    data-trigger="focus"
                                                    data-content="Опишите коротко Вашу работу. Например: Поклеить обои"
                                                    required
                                                    >

                                            @if ($errors->has('Кратко_о_работе'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('Кратко_о_работе') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('Описание') ? ' has-error' : '' }}">
                                        <label class="col-md-12 control-label">Описание</label>

                                        <div class="col-md-12">
                                            <textarea
                                             class="form-control"
                                             rows="3"
                                             name="Описание"
                                             value="{{ old('Описание') }}"
                                             data-toggle="popover"
                                             data-placement="top"
                                             data-trigger="focus"
                                             data-content="Опишите детали работы. Например: Поклеить обои. Площадь 25м/кв"
                                             required></textarea>
                                             @if ($errors->has('Описание'))
                                                 <span class="help-block">
                                                 <strong>{{ $errors->first('Описание') }}</strong>
                                              @endif
                                        </div>

                                    </div>

                                     <jobstype></jobstype>

                                     <div class="form-group{{ $errors->has('Дата_Исполнения') ? ' has-error' : '' }}">
                                         <label class="col-md-12 control-label">Дата и Время исполнения <i class="fa fa-angle-down" aria-hidden="true"></i></label>
                                              <div class="col-md-12">
                                                   <input
                                                   id="datetimepicker"
                                                   type="text"
                                                   class="form-control"
                                                   name="dateOfMake"
                                                   data-toggle="popover"
                                                   data-placement="top"
                                                   data-trigger="focus"
                                                   data-content="Выберите удобное для Вас дату и время выполнения работы"
                                                   placeholder="Выберите время выполнения работы"
                                                   >
                                                                    @if ($errors->has('dateOfMake'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('dateOfMake') }}</strong>
                                                                        </span>
                                                                    @endif
                                              </div>
                                      </div>

                                     <div class="form-group">
                                         <label class="col-md-12 control-label">Бюджет</label>
                                              <div class="col-md-12">
                                                   <input type="text"
                                                   placeholder="в тенге"
                                                   class="form-control"
                                                   v-model="price | currency 'KZT '"
                                                   name="price"
                                                   data-toggle="popover"
                                                   data-placement="top"
                                                   data-trigger="focus"
                                                   data-content="Введите сумму, на которую расчитываете выполнить работу"
                                                   value="{{ old('price')
                                                   }}">
                                              </div>
                                      </div>
                          </div>

                          <div class="col-md-5 create__register">
                          <h4  class="form_header"><i class="fa fa-info-circle" aria-hidden="true"></i>Ваши данные:</h4>
                          <div class="form-group">
                               <label class="col-md-12 control-label">Город <i class="fa fa-angle-down" aria-hidden="true"></i></label>
                               <div class="col-md-12">
                                   <select name="city_id" id="city_id" class="form-control" required>
                                         <option value="" selected disabled> Выберите из списка Ваш город
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
                                                    type="text"
                                                    placeholder="Например: aman@mail.ru"
                                                    class="form-control"
                                                    name="email"
                                                    data-toggle="popover"
                                                    data-placement="top"
                                                    data-trigger="focus"
                                                    data-content="Адрес электронной почты, который будет использоваться как логин для входа в личный кабинет. На этот адрес будут отсылаться уведомления"
                                                    value="{{ old('email') }}" required>

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