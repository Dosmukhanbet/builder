@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-4 col-md-offset-1 Job__view">
                         <h3 class="Job__name">{{ $job->name }}</h3>
                         <ul class="Job__list">
                            <li>Категория :{{ $categories[$job->category_id]}}</li>
                            <li>Описание : {{ $job->description }}</li>
                            <li>Город: {{ $cities[$job->city_id]}}</li>
                            <li>Статус:
                                    @if($job->status == 0 ) Активен
                                            @else Не активен
                                    @endif
                            </li>
                            <li>Дата/время исполнения : {{ $job->dateOfMake->diffForHumans() }}</li>
                            <li>Опубликовано : {{ $job->created_at->diffForHumans() }}</li>
                            @if($job->price)
                                <li>Цена : {{ $job->price }}</li>
                             @endif
                         </ul>
                    </div>
                    <div class="col-md-7 Images__block">
                                            @foreach($job->photos->chunk(3) as $set)
                                                    <div class="row">
                                                          <div class="col-md-12  Images">
                                                     @foreach($set as $photo)
                                                                <a href="/{{$photo->path}}" data-lity>
                                                                 <img src="/{{$photo->thumbnail_path}}"  width="100px" class="img-thumbnail">
                                                                 </a>
                                                      @endforeach
                                                            </div>

                                                    </div>
                                            @endforeach
                     </div>


                </div>


@endsection

@section('scripts.footer')
    <script src="/js/all.js"></script>
@endsection