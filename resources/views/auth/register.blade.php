@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-1 Registations__info__block">
           @include('auth.partials.registrationinfo')
        </div>
        <div class="col-md-5 Registations__form__block">
           @include('auth.partials.registrationform')
        </div>
        <div class="col-md-10 col-md-offset-1 how__to__start__today">
            <h3>Что нужно чтобы зарабатывать деньги уже сегодня?</h3>
            <div class="col-md-3 steps__one">
              <p>
              <span class="numbers">1.</span>
                Зарегистрируйтесь на нашем сайте, используя форму выше. После регистрации вам будут доступны все заявки клиентов вашего города по вашей специальности
              </p>
            </div>
            <div class="col-md-6 steps__two">
              <p>
              <span class="numbers">2.</span>
                Закончив регистрацию Вы сможете видеть в своем личном кабинете (запомните свой логин и пароль) все заявки от клиентов из Вашего города. Более того вы получите СМС уведомление когда Вам поступят заявки от клиентов. Выберите заявку которая вам под силу выполнить с подходящей для вас ценой предложенной клиентом или предложите ему свою цену. Вы сможете напрямую отправлять сообщения клиенту и вести переговоры пока вы не достигнете соглашения 
              </p>
            </div>
            <div class="col-md-3 steps__three">
              <p>
                <span class="numbers">3.</span>
                Выполнив работу попросите клиента оставить Вам положительный отзыв, тем самым поднимете свой рейтинг для получения еще больше заявок. Чем выше Ваш рейтинг тем выше цена ваших услуг
              </p>
            </div>
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
