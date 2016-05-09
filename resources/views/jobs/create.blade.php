@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Публикация заявки</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/job/create') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('Кратко_о_работе') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Кратко о работе</label>

                            <div class="col-md-6">
                                <input type="name" class="form-control" name="Кратко_о_работе" value="{{ old('Кратко_о_работе') }}">

                                @if ($errors->has('Кратко_о_работе'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Кратко_о_работе') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Описание') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Описание</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="Описание" value="{{ old('Описание') }}"></textarea>
                                 @if ($errors->has('Описание'))
                                     <span class="help-block">
                                     <strong>{{ $errors->first('Описание') }}</strong>
                                  @endif
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

                        <jobstype></jobstype>

                         <div class="form-group{{ $errors->has('Дата_Исполнения') ? ' has-error' : '' }}">
                             <label class="col-md-4 control-label">Дата и Время исполнения</label>

                                                    <div class="col-md-6">
                                                        <input type="datetime" class="form-control" name="Дата_Исполнения" value="{{ date('Y-m-d H:i') }}">

                                                        @if ($errors->has('Дата_Исполнения'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('Дата_Исполнения') }}</strong>
                                                            </span>
                                                        @endif



                                                    </div>
                                                </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Опубликовать
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection