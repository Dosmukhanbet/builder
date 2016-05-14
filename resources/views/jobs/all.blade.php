@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
                @if($jobs->count() >= 1)
                    <h4>Мои заявки</h4>
                       <table class="table table-responsive">
                        <tr class="active">
                                <td># Заявки</td>
                        		<td>Короткое описание</td>
                        		<td>Категория</td>
                        		<td>Статус</td>
                        		<td>Истекает через</td>
                        		<td>Опубликовано</td>
                        		<td>Бюджет</td>
                        		<td> Предложения</td>

                       </tr>

                            @foreach($jobs as $job)
                            <tr>
                            <td> {{$job->id}}</td>
                            <td>{{$job->name}}</td>
                            <td>{{ $categories[$job->category_id]}}</td>

                            <td>@if($job->status == 0 ) Активен
                                    @else Не активен
                                @endif
                            </td>
                            <td>{{ $job->dateOfMake->diffForHumans() }}</td>
                            <td>{{ $job->created_at->diffForHumans() }}</td>
                            <td>{{ $job->price }}</td>
                            <td>
                                   @if($job->offers->count())
                                        <a href='{{ url( "job/showoffers/". $job->id ) }}'>
                                                 {{$job->offers->count()}}
                                        </a>
                                   @else
                                            нет предложении
                                   @endif
                            </td>
                            </tr>
                            @endforeach
                    </table>

                   @else
                     <h1>У Вас нет ни одной заявки</h1>
                   @endif
                   </div>

</div>


@endsection