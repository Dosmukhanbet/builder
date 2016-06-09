@extends('layouts.app')



@section('content')
         <div class="col-md-8 col-md-offset-1">
         <h4>Предложения на заявку {{$offers[0]->job->name}} </h4>
         @foreach($offers as $offer)
         <div class="Offer__block">
               @if($offer->user->photo_path)
                      <a href="/{{ $offer->user->photo_path }}" data-lity> <img  width="80px" src="/{{$offer->user->thumbnail_path}}" class="Offer__image img-thumbnail"></a>
               @endif
                <ul class="Offer__list">
                                 <li>Мастер: {{$offer->user->name}} </li>
                                 <li>Сотовый номер: {{$offer->user->phone_number}} </li>
                                 <li>Предложенная цена: {{$offer->price}}</li>
                                 <li>Комментария: @if($offer->comment) {{$offer->comment}}
                                                  @else нет комментарии
                                                  @endif
                                 </li>
                                 <li> Поступило: {{ $offer->created_at->diffForHumans()  }}</li>
                 </ul>
                             @if($offer->status)
                                  <p style="padding-left: 15px">Вы приняли это предложение</p>
                             @else
                                <a href="{{ url('job/accept/offer/' . $offer->id . "/" . $offer->user->id) }}" class="btn btn-warning __button" >
                                  Принять предложение
                                 </a>
                             @endif

         </div>
         @endforeach
         </div>






@stop
@section('scripts.footer')
    <script src="/js/all.js"></script>

@endsection