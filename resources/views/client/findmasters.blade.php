@extends('layouts.app')
@section('title')
<title>Шеберлер клубы - Клуб мастеров</title>
@stop
@section('content')
{{--{{dd($cities)}}--}}
<masters :cats="{{$cats}}" :cities="{{$citis}}" :clients="{{$allclients}}"></masters>

<div class="col-md-4">

{{--{{dd($clients)}}--}}
        <h4>Новые мастера</h4>
        @if(!$masters->isEmpty())
        @foreach($masters as $master)
            <div class="findedmasters">
            <p><a data-lity href="{{ $master->photo_path ? '/' .$master->photo_path : "/profile/sitephotos/no-photo.jpg" }}">
            <img class="img-circle" src="{{ $master->thumbnail_path ? '/'.$master->thumbnail_path : "/profile/sitephotos/thumb-no-photo.jpg" }}"></a></p>
            <p>
                <span>Имя:</span> {{$master->name}}<br>
                <span>Город:</span> {{$cities[$master->city_id]}}<br>
                <span>Специальность:</span> {{$categories[$master->category_id]}}<br>
                <span class="collapse" id="{{$master->phone_number}}">Мобильный номер:+{{$master->phone_number}}</span>

                <button class="btn find__button" type="button" id="showMobile" data-toggle="collapse" data-target="#{{$master->phone_number}}" aria-expanded="false" aria-controls="collapseExample">
                Показать номер
                </button> 
                  

                 @if ($master->ratings->pluck('points')->sum() > 0 )
                     <span>Средний балл:</span> {{ number_format($master->ratings->pluck('points')->sum() / $master->ratings->pluck('points')->count(), 1) }}<br>
                     <span class="ratingcounts">
                      {{ $master->ratings->where('points', 5)->count() ? "Оценка 5 - " . $master->ratings->where('points', 5)->count() . " клиент(а) " : '' }}
                      {{ $master->ratings->where('points', 4)->count() ? "Оценка 4 - " . $master->ratings->where('points', 4)->count() . " клиент(а) " : '' }}
                      {{ $master->ratings->where('points', 3)->count() ? "Оценка 3 - " . $master->ratings->where('points', 3)->count() . " клиент(а) " : '' }}
                     </span><br>
                 @endif
                 @if($master->feedbacks->count())
                    <span>
                          <a class="feedbacks__link" data-toggle="modal" data-target="#masterfeedback_{{$master->id}}">
                            Отзывы {{ $master->feedbacks->count() }}
                          </a>
                     </span>

                   @include('client.modalfeedbacks')
                 @endif

            </p>
            </div>

        @endforeach
        {{--{{$masters->links()}}--}}
        @else
            <h5>В данный момент, нет мастеров в Вашем регионе</h5>
        @endif
</div>


@stop
@section('footer')
    <script src="/js/all.js"></script>
@endsection