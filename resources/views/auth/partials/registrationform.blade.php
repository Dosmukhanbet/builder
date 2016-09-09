 <h4>Регистрация мастера</h4>
                   <p><i class="fa fa-info-circle" aria-hidden="true"></i> Регистрация позволит вам получать заявки и управлять ими.<br> Это займет не более одной минуты</p>
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
                                                    <input 
                                                    type="password" 
                                                    class="form-control" 
                                                    name="password"
                                                    data-toggle="popover"
                                                    data-placement="top"
                                                    data-trigger="focus"
                                                    data-content="Придумайте пароль. Хороший пароль должен быть не менее 6-и символов."
                                                    required>

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