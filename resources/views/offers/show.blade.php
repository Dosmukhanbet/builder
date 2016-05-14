@extends('layouts.app')



@section('content')
        @foreach($offers->chunk(4) as $set)
            <div class="row">
                <h3>Предложения на заявку {{$offers[0]->job->name}} № {{$offers[0]->job->id}}  </h3>
                @foreach($set as $offer)
                    <div class="col-md-3">
                    <ul>
                        <li>Мастер: {{$offer->user->name}} </li>
                        <li>Сотовый номер: {{$offer->user->phone_number}} </li>
                        <li>Предложенная цена: {{$offer->price}}</li>
                        <li>Комментария: @if($offer->comment) {{$offer->comment}}
                                         @else нет комментарии
                                         @endif
                        </li>
                    </ul>
                    </div>
                @endforeach
            </div>
        @endforeach

@stop