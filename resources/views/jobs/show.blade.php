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
                        <li>Дата/время исполнения : {{ $job->dateOfMake }}</li>
                        <li>Опубликовано : {{ $job->created_at }}</li>
                     </ul>
                </div>

                @if( !$job->photos->count() >= 5)
                <div class="col-md-4" style="padding-top: 35px;">
                     <form id="addPhotos" class="dropzone" action="/job/addphoto/{{$job->id}}">
                        {{ csrf_field() }}
                      </form>
                </div>
                @endif
                </div>
                <div class="col-md-8 col-md-offset-2">
                        @foreach($job->photos as $photo)
                            <img src="{{$photo->path}}"  class="img-thumbnail" width="100px">
                        @endforeach
                </div>

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