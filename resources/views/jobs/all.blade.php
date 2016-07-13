@extends('layouts.app')

@section('content')
<div class="row">

              @if($jobs->count() >= 1)
                <div class="col-md-8 col-md-offset-1">
                     <h4 class="job__list__header"><i class="fa fa-list" aria-hidden="true"></i>Мои заявки <span>({{$jobs->count()}})</span></h4>

                         @foreach($jobs as $job)
                          <div class="job__block">
                                     <a href="{{url('job/showoffers/'.$job->id)}}">{{ $job->name}}</a>
                                     <span class="published_date"> - {{ $job->created_at->diffForHumans() }}</span>
                                     <p>Категория: {{ $categories[$job->category_id]}}</p>
                                     <p>Дата/Время исполнения: {{ $job->dateOfMake->diffForHumans() }}</p>
                                     <p class="price">{{ $job->price }}</p>
                                     <div class="offers__info">
                                     <p>
                                          @if($job->offers->count())
                                              <a class="offer" href='{{ url( "job/showoffers/". $job->id ) }}'>
                                                      Предложения от мастеров <span class="badge">{{$job->offers->count()}}</span>
                                              </a>
                                              <button class="all__recommend" data-toggle="modal" data-target="#exampleModal">рекомендуемые мастера</button>
                                          @else
                                            <button class="all__recommend" data-toggle="modal" data-target="#exampleModal">рекомендуемые мастера</button>
                                          @endif

                                            <br>
                                            <newoffers :jobid="{{$job->id}}"></newoffers>



                                     </p>
                                     <jobdone :jobid="{{$job->id}}" :jobstatus="{{$job->status}}"></jobdone>


                                     </div>

                                      <div class="images">
                                          @foreach($job->photos->take(3) as $photo)
                                            <a href="/{{$photo->path}}" data-lity>
                                               <img src="/{{$photo->thumbnail_path}}"  width="75px" class="img-thumbnail">
                                            </a>
                                          @endforeach
                                      </div>


                          </div>
                        @endforeach
                        {{$jobs->links()}}
                </div>


                   @else
                     <h4>У Вас нет ни одной заявки</h4>
                   @endif
                   </div>
                   @if($jobs->count() >= 1)
                       @include('partials.modal_recommended_masters')
                    @endif
</div>


@endsection
@section('footer')
    <script src="/js/all.js"></script>
@endsection