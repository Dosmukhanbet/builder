@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                         <h3>{{ $job->name }}</h3>
                         <ul>
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
                         </ul>
                    </div>
                    <div class="col-md-6">
                                            @foreach($job->photos->chunk(3) as $set)
                                                    <div class="row">
                                                          <div class="col-md-8">
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
                            <div class="col-md-6 col-md-offset-3" style="padding-top: 35px;">
                                 <form id="addPhotos" class="dropzone" action="/job/addphoto/{{$job->id}}">
                                    {{ csrf_field() }}
                                  </form>
                            </div>
                            </div>
                  @endunless


@endsection
@section('scripts.footer')
    <script src="/js/all.js"></script>
    <script>
        Dropzone.options.addPhotos = {
        paramName: "photo", // The name that will be used to transfer the file
          maxFilesize: 2,
          acceptedFiles : '.jpg, .jpeg, .png',
          dictDefaultMessage : 'Загрузить фотографии. Можно сразу выбрать несколько. Максимум 5 фотографии.',
          dictInvalidFileType : 'Вы не можете загружать файлы данного типа',
          dictFileTooBig: "Размер файла не должен превышать 2мб",
          maxFiles: 5
                  }


    </script>
@endsection