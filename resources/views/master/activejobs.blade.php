@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-1 table-responsive">
            @if($jobs->count() >= 1)
                <h4>Активные заявки в вашем регионе</h4>
                     @foreach($jobs as $job)
                     <div class="active__jobs">
                        <a href='{{ url( "master/show/job/". $job->id ) }}'>{{$job->name}}</a> <span class="titles__published">Опубликовано: {{ $job->created_at->diffForHumans() }}</span><br>
                          <span class="titles">Город:</span>  {{ $cities[$job->city_id]}}<br>
                          <span class="titles">Дата/Время исполнения:</span>  {{ $job->dateOfMake->diffForHumans()}}<br>

                           <span class="titles">Цена:</span> {{ $job->price }}
                       </div>
                        @endforeach

               @else
                 <h4>В данный момент нет активных заявок в Вашем регионе по вашей специальности</h4>
               @endif


        </div>
    </div>

@endsection