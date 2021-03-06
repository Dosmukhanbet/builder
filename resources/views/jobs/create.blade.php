@extends('layouts.app')

@section('content')

     <div class="row">
            
             <div class="col-md-5 col-md-offset-1 create__formbox">
                    <!-- <div class="col-md-12 alert alert-success">
                        
                    </div> -->
                    <h4 class="form_header">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Добавить объявление
                    </h4>
                    <form class="create__form" role="form" method="POST" action="{{ url('/job/create') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('Кратко_о_работе') ? ' has-error' : '' }}">
                            <label class="col-md-12 control-label">Кратко о работе</label>

                            <div class="col-md-12">
                                <input 
                                type="name" 
                                class="form-control" 
                                name="Кратко_о_работе" 
                                value="{{ old('Кратко_о_работе') }}" data-toggle="popover"
                                data-placement="top"
                                data-trigger="focus"
                                data-content="Опишите коротко Вашу работу. Например: Поклеить обои"
                                required>

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
                             <label class="col-md-12 control-label">Дата и Время исполнения</label>
                                  <div class="col-md-12">
                                       <input id="datetimepicker" type="text" class="form-control" name="dateOfMake"
                                       data-toggle="popover"
                                       data-placement="top"
                                       data-trigger="focus"
                                       data-content="Выберите удобное для Вас дату и время выполнения работы"
                                      placeholder="Выберите время выполнения работы" 
                                      required>
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
                                       <input type="text" placeholder="в тенге"
                                       data-toggle="popover"
                                       data-placement="top"
                                       data-trigger="focus"
                                       data-content="Введите сумму, на которую расчитываете выполнить работу"class="form-control" v-model="price | currency 'KZT '"   name="price" value="{{ old('price') }}">
                                  </div>
                          </div>




                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning __button">
                                   Опубликовать
                                </button>

                            </div>
                        </div>
                    </form>


    </div>


@endsection

@section('footer')
<script src="/js/all.js"></script>
<script>
  jQuery.datetimepicker.setLocale('ru');
  jQuery('#datetimepicker').datetimepicker({
                  i18n:{
  ru:{
   months:[
    'Январь','Февраль','Март','Апрель',
    'Май','Июнь','Июль','Августь',
    'Сентябрь','Октябрь','Ноябрь','Декабрь',
   ],
   dayOfWeek:[
    "Пн", "Вт", "Ср", "Чт", 
    "Пн", "Сб", "Вс",
   ]
  }
 },
                  format:'Y-m-d H:i',
                  dayOfWeekStart:1,
                //  inline:true,
                  lang:'ru'
                });

                $(function () {
                  $('[data-toggle="popover"]').popover()
                });


    </script>
@stop