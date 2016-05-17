@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-md-10 col-md-offset-1 table-responsive">
            @if($jobs->count() >= 1)
                <h1>Активные заявки в вашем регионе</h1>
                   <table class="table Table__jobs">
                    <tr class="active">
                            <td> # Заявки </td>
                    		<td>Короткое описание</td>
                    		<td>Город</td>
                    		<td>Дата время исполнения</td>
                    		<td>Опубликовано</td>
                    		<td>Бюджет</td>


                   </tr>

                        @foreach($jobs as $job)
                        <tr>
                        <td> {{ $job->id }} </td>
                        <td><a href='{{ url( "master/show/job/". $job->id ) }}'>{{str_limit($job->name, 20)}}</a></td>
                        <td>{{ $cities[$job->city_id]}}</td>
                        <td>{{ $job->dateOfMake->diffForHumans() }}</td>
                        <td>{{ $job->created_at->diffForHumans() }}</td>
                        <td class="green__box">{{ $job->price }}</td>

                        </tr>
                        @endforeach
                </table>

               @else
                 <h4>В данный момент нет активных заявок в Вашем регионе по вашей специальности</h4>
               @endif


    </div>
    </div>

@endsection