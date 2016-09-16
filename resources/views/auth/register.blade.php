@extends('layouts.app')
@section('title')
<title>Шеберлер клубы - Клуб мастеров. Регистрация</title>
@stop
@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-1 Registations__info__block">
           @include('auth.partials.registrationinfo')
        </div>
        <div class="col-md-5 Registations__form__block">
           @include('auth.partials.registrationform')
        </div>
        <div class="col-md-10 col-md-offset-1 how__to__start__today">
           @include('auth.partials.howtostart')
        </div>
        {{-- <div class="alert alert-info statistics">
          Зарегистривовано: клиентов - 2250, мастеров 340, заявок 7500
        </div> --}}
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
