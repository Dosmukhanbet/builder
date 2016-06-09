@extends('layouts.app')

@section('content')
<div class="row">

              @if($jobs->count() >= 1)
                <div class="col-md-8 col-md-offset-1">
                     <h4 class="job__list__header">Мои заявки</h4>

                         @foreach($jobs as $job)
                          <div class="job__block">
                                     <a href="{{url('job/show/'.$job->id)}}">{{ $job->name}}</a><br>
                                     <p class="published_date">Опубликовано: {{ $job->created_at }}</p>
                                     <p>Категория: {{ $categories[$job->category_id]}}</p>
                                     <p>Дата/Время исполнения: {{ $job->dateOfMake->diffForHumans() }}</p>
                                     <p class="price">{{ $job->price }}</p>
                                     <p>
                                          @if($job->offers->count())
                                              <a class="offer" href='{{ url( "job/showoffers/". $job->id ) }}'>
                                                     У Вас  {{$job->offers->count()}} предложение
                                              </a>
                                          @else
                                           нет предложении
                                          @endif
                                     </p>

                                      <div class="images">
                                          @foreach($job->photos as $photo)
                                            <a href="/{{$photo->path}}" data-lity>
                                               <img src="/{{$photo->thumbnail_path}}"  width="75px" class="img-thumbnail">
                                            </a>
                                          @endforeach
                                      </div>
                          </div>
                        @endforeach
                </div>


                   @else
                     <h4>У Вас нет ни одной заявки</h4>
                   @endif
                   </div>

</div>


@endsection
@section('scripts.footer')
    <script src="/js/all.js"></script>
@endsection