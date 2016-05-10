@extends('layouts.app')

@section('content')
    <div class="Job_view">
         <h1>{{ $job->name }}</h1>
         <ul>
            <li>Категория :{{ $categories[$job->category_id]}}</li>
            <li>Описание : {{ $job->description }}</li>
            <li>Город: {{ $cities[$job->city_id]}}</li>
            <li>Статус:
                    @if($job->status == 0 ) Активен
                            @else Не активен
                    @endif
            </li>

         </ul>


    </div>

@endsection