@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            @if($jobs->count() >= 1)
                <h4><i class="fa fa-cogs" aria-hidden="true"></i>Активные заявки в вашем регионе</h4>
                     @foreach($jobs as $job)
                     {{--<realtimeoffers :jobid="{{ $job->id }}"></realtimeoffers>--}}
                     <div class="active__jobs">
                        <a href='{{ url( "master/show/job/". $job->id ) }}'>{{$job->name}}</a> <span class="titles__published">Опубликовано: {{ $job->created_at->diffForHumans() }}</span><br>
                          <span class="titles">Город:</span>  {{ $cities[$job->city_id]}}<br>
                          <span class="titles">Дата/Время исполнения:</span>  {{ $job->dateOfMake->diffForHumans()}}<br>

                           <span class="titles">Бюджет:</span> {{ $job->price }}
                       </div>
                        @endforeach

               @else
                <div class="alert alert-info" role="alert"><p>В данный момент нет активных заявок в Вашем регионе по вашей специальности</p></div>
               @endif


        </div>
    </div>

@endsection