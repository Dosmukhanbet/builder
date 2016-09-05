<form method="POST" action="{{ url('/master/addskills') }}">
                    {!! csrf_field() !!} 
 <div class="form-group{{ $errors->has('years') ? ' has-error' : '' }}">
        <label class="col-md-10 control-label">Стаж работы <span class="required">*</span></label>
             <div class="col-md-10">
                                                    <input  autofocus
                                                            type="text" 
                                                            class="form-control" 
                                                            name="years" 
                                                            data-toggle="popover"
                                                            data-placement="top"
                                                            data-trigger="focus"
                                                            data-content="Укажите сколько лет опыта имеете в данной специальности"
                                                            placeholder="сколько лет опыта"
                                                            value="{{ old('years') }}" 
                                                            required>

                                                    @if ($errors->has('years'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('years') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('intro') ? ' has-error' : '' }}">
                                            <label class="col-md-10 control-label">Рекламный текст Вашего профиля <span class="required">*</span></label>

                                            <div class="col-md-10">
                                                <textarea
                                                 class="form-control"
                                                 rows="3"
                                                 name="intro"
                                                 value="{{ old('intro') }}"
                                                 data-toggle="popover"
                                                 data-placement="top"
                                                 data-trigger="focus"
                                                 placeholder="Опишите ваши преимущества и сильные стороны, приведите примеры законченных вами проектов, работ. Не менее 20 символов"
                                                 data-content="Опишите ваши преимущества и сильные стороны, приведите примеры законченных вами проектов, работ. Например: Оказываю все виды сварочных работ, стаж 25лет, работаю своим аппаратом, делаю все качественно и дешево!"
                                                 required></textarea>
                                                 @if ($errors->has('intro'))
                                                     <span class="help-block">
                                                     <strong>{{ $errors->first('intro') }}</strong>
                                                  @endif
                                            </div>
                                            </div>
                                            <div class="form-group">
                               <div class="col-md-10">
                                  <button type="submit" class="btn btn-warning __button">
                                     Сохранить данные
                                  </button>
                            </div>
                            </div>

                </form>       
                                            

                                            


