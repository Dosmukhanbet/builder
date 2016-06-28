<div class="Offer__block">
    <h6 class="editjob__header">Редактироание заявки: {{$job->name}}</h6>
    <form class="create__form" role="form" method="POST" action="{{ url('/job/'.$job->id ) }}">
                            {{ method_field('PATCH') }}
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('Кратко_о_работе') ? ' has-error' : '' }}">
                                <label class="col-md-8 control-label">Кратко о работе</label>

                                <div class="col-md-8">
                                    <input type="name" class="form-control" name="Кратко_о_работе" value="{{ old('Кратко_о_работе') }}" required>

                                    @if ($errors->has('Кратко_о_работе'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Кратко_о_работе') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Описание') ? ' has-error' : '' }}">
                                <label class="col-md-8 control-label">Описание</label>

                                <div class="col-md-8">
                                    <textarea class="form-control" rows="3" name="Описание" value="{{ old('Описание') }}" required></textarea>
                                     @if ($errors->has('Описание'))
                                         <span class="help-block">
                                         <strong>{{ $errors->first('Описание') }}</strong>
                                      @endif
                                </div>

                            </div>

                             <jobstype></jobstype>

                             <div class="form-group{{ $errors->has('Дата_Исполнения') ? ' has-error' : '' }}">
                                 <label class="col-md-8 control-label">Дата и Время исполнения</label>
                                      <div class="col-md-8">
                                           <input id="datetimepicker" type="text" class="form-control" name="dateOfMake">
                                                            @if ($errors->has('dateOfMake'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('dateOfMake') }}</strong>
                                                                </span>
                                                            @endif
                                      </div>
                              </div>

                             <div class="form-group">
                                 <label class="col-md-8 control-label">Бюджет</label>
                                      <div class="col-md-8">
                                           <input type="text" placeholder="в тенге" class="form-control" v-model="price | currency 'KZT '"   name="price" value="{{ old('price') }}">
                                      </div>
                              </div>




                            <div class="form-group">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-warning __button">
                                       Редактировать
                                    </button>

                                </div>
                            </div>
                        </form>


</div>