@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-4 col-md-offset-1 Job__view">
                         <h4 class="Job__name">{{ $job->name }}</h4>
                         <ul class="Job__list">
                            <li>Категория :{{ $categories[$job->category_id]}}</li>
                            <li>Описание : {{ $job->description }}</li>
                            <li>Город: {{ $cities[$job->city_id]}}</li>
                            {{--<li>Статус:--}}
                                    {{--@if($job->status == 0 ) Активен--}}
                                            {{--@else Не активен--}}
                                    {{--@endif--}}
                            {{--</li>--}}
                            <li>Дата/время исполнения : {{ $job->dateOfMake->diffForHumans() }}</li>
                            <li>Опубликовано : {{ $job->created_at->diffForHumans() }}</li>
                            @if($job->price)
                                <li>Бюджет : {{ $job->price }}</li>
                            @endif
                              <p>
                                                              @if($job->offers->count())
                                                                  <a href='{{ url( "job/showoffers/". $job->id ) }}'>
                                                                            {{$job->offers->count()}} предложение
                                                                  </a>
                                                              @else
                                                                   нет предложении
                                                              @endif
                                                         </p>
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
                 @unless($job->photos->count() >= 5)
                            <div class="row">
                            <div class="col-md-8 col-md-offset-1" style="padding-top: 35px;">
                                 <form id="addPhotos" class="dropzone" action="/job/addphoto/{{$job->id}}">
                                    {{ csrf_field() }}
                                  </form>
                            </div>
                            </div>
                  @endunless


@endsection
@section('footer')
    <script src="/js/all.js"></script>
    <script>
        Dropzone.options.addPhotos =
        {
              paramName: "photo", // The name that will be used to transfer the file
              maxFilesize: 5,
              acceptedFiles : '.jpg, .jpeg, .png',
              dictDefaultMessage : 'Загрузить фотографии. Можно сразу выбрать несколько. Максимальный размер фотографии 5МБ. Максимум 5 фотографии.',
              dictInvalidFileType : 'Вы не можете загружать файлы данного типа',
              dictFileTooBig: "Размер файла не должен превышать 5мб",
              maxFiles: 5,
              init: function () {
                      // Set up any event handlers
                      this.on('complete', function () {
                          if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                              location.reload();
                          }
                      });
                  }
         }


    </script>
@endsection