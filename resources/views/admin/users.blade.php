@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <li class="list-group-item active">Зарегистрированные мастера по городам</li>
        <ul class="list-group">
            @foreach($cityWithusers as $city)
             <li class="list-group-item">{{$city->name}} <span class="badge">{{$city->users_count}} </span> </li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-4">
        <li class="list-group-item active">Зарегистрированные мастера по категориям</li>
        <ul class="list-group">
            @foreach($catWithusers as $cat)
             <li class="list-group-item">{{$cat->name}} <span class="badge">{{$cat->user_count}} </span> </li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-4">
         <li class="list-group-item active">Зарегистрированные мастера по городам и категориям</li>
        <ul class="list-group">
            @foreach($masters as $cityId => $users)
                    <li class="list-group-item">
                            {{$cities[$cityId]}} <ul>
                                                    @foreach($users->groupBy('category_id') as $catid => $mss)
                                                            <li>{{$categories[$catid]}} - {{$mss->count()}} мастеров </li>
                                                    @endforeach
                                                </ul>
                    </li>
            @endforeach
        </ul>
    </div>
</div>
@stop