@extends('layouts.app')
@section('homecontent')

 <div class="header">
        <h3>Найдите лучшего мастера в своем деле</h3>
        <h5>С Sheber.club вы с легкостью найдете подходящего мастера</h5>
        @if(Auth::guest())
        <a class="create__button" href="create/registerandcreatejob">Создать заявку</a>
        @endif
        <img width="900px" src="/profile/sitephotos/line-up.svg">

 </div>
 <div class="how__it__works">
    <div class="steps"><h4><span>1</span>Создайте заявку</h4>
        <p>Это просто и бесплатно. Как только Вы создадите заявку на нашем сайте, мастера Вашего региона смогуть увидеть его</p>
    </div>
    <div class="steps"><h4><span>2</span>Найдите мастера</h4>
        <p>Choose from local tradesmen interested in your job. Contact details are shared only when you say so.</p>
    </div>
    <div class="steps"><h4><span>3</span>Оставьте отзыв</h4>
        <p>Feedback rewards tradesmen for good work and holds them accountable for any problems.</p>
    </div>
 </div>
@endsection