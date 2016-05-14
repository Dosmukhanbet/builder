@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
            @if($jobs->count() >= 1)
                <h1>Active Jobs</h1>
                   <table class="table table-bordered">
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
                        <td><a href='{{ url( "master/show/job/". $job->id ) }}'>{{$job->name}}</a></td>
                        <td>{{ $cities[$job->city_id]}}</td>
                        <td>{{ $job->dateOfMake->diffForHumans() }}</td>
                        <td>{{ $job->created_at->diffForHumans() }}</td>
                        <td>{{ $job->price }}</td>

                        </tr>
                        @endforeach
                </table>

               @else
                 <h1>Нет активных заявок в Вашем регионе по вашей специальости</h1>
               @endif


    </div>
    </div>

@endsection