@extends('layouts.app')



@section('content')
         <h3 class="Offer__header">Предложения на заявку {{$offers[0]->job->name}} № {{$offers[0]->job->id}}  </h3>
        @foreach($offers->chunk(3) as $set)
            <div class="row Offer__row">
                @foreach($set as $offer)
                    <div class="col-md-3 Offer__block">
                    <ul class="Offer__list">
                        <li>Мастер: {{$offer->user->name}} </li>
                        <li>Сотовый номер: {{$offer->user->phone_number}} </li>
                        <li>Предложенная цена: {{$offer->price}}</li>
                        <li>Комментария: @if($offer->comment) {{$offer->comment}}
                                         @else нет комментарии
                                         @endif
                        </li>
                    </ul>
                       <button type="submit" class="btn btn-warning " >
                         Принять предложение
                        </button>
                    </div>
                @endforeach
            </div>
        @endforeach

@stop