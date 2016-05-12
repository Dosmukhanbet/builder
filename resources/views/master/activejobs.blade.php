@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
            @if($jobs->count() >= 1)
                <h1>Active Jobs</h1>
                <table class="table table-bordered">
                    <tr class="active">
                    		<td>Короткое описание</td>
                    		<td>Город</td>
                    		<td>Статус</td>
                    		<td>Дата время исполнения</td>
                    		<td>Опубликовано</td>
                    		<td> .... </td>

                   </tr>
                    @foreach($jobs as $job)
                    <td>{{$job->name}}</td>
                    <td>{{ $cities[$job->city_id]}}</td>
                    <td>@if($job->status == 0 ) Активен
                            @else Не активен
                        @endif
                    </td>
                    <td>{{ $job->dateOfMake->diffForHumans() }}</td>
                    <td>{{ $job->created_at->diffForHumans() }}</td>
                    <td> <a href="#">Посмотреть...</a> </td>
                    @endforeach
                </table>
              @else
                 <h1>There is no Active Jobs</h1>
               @endif


    </div>
    </div>

@endsection