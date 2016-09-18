@extends('layouts.app')

@section('content')
    <?php $user = Auth::user() ?>
    <div class="row">
    	<div class="col-md-5 col-md-offset-1 Profile__attachments">
    		<h4 class="registration_steps">Шаг 4 из 4</h4>
    		<h4>Сертификаты, Дипломы, Рекомендации</h4>

				    
          @if( ! count($user->attachments) )
            <p>Прикрепите копию вашего диплома, сертификата, грамоты, рекомендацию от работодателя.</p>
             @include('master.formpartials.attachments')
             <button class="finish__register"><a href="{{ url('master/finish')  }}">Пропустить</a></button>
          @else 
                <div class="attachments">
                      @foreach($user->attachments as $attachment)
                        <a href="/{{$attachment->path}}" data-lity><img src="/{{$attachment->thumbnail_path}}" 
                          class="img-thumbnail">
                        </a>
                      @endforeach
                </div>         
                <button class="finish__register"><a href="{{ url('master/finish')  }}"> Завершить создание профиля</a></button>
          @endif

				
      

    	</div>
    	<div class="col-md-4 chart">
    	<h4>Профиль завершен на 80%</h4>
				<graph :labels="['Завершен', 'Осталось']" :values="[80, 20]"></graph>
    	</div>
    </div>

@stop
@section('footer')
    <script src="/js/all.js"></script>
    <script>
    		$(function () {
                  $('[data-toggle="popover"]').popover()
                });

        Dropzone.options.attachments =
        {
              paramName: "attachment", // The name that will be used to transfer the file
              maxFilesize: 10,
              acceptedFiles : '.jpg, .jpeg, .png, .pdf',
              dictDefaultMessage : 'Кликните сюда для загрузки вложении. Можно сразу выбрать несколько. Максимальный размер вложении 5МБ. Максимум 5 вложении.',
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
@stop