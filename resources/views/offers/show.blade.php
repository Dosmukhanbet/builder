@extends('layouts.app')



@section('content')
           <newofferalert :jobid="{{$job->id}}" :text=""></newofferalert>
         <div class="col-md-11 col-md-offset-1">
            <div class="col-md-7">
            <div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Предложения</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Просмотр</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Редактировать</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Фотографии</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    @include('offers.offerslist')
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    @include('offers.job')
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">ssss...</div>
                <div role="tabpanel" class="tab-pane" id="settings">@include('offers.jobphotos')</div>
              </div>

            </div>




            </div>

         <div class="col-md-5">
                    @include('offers.recommended_masters')
         </div>
         </div>






@stop
@section('footer')
    <script src="/js/all.js"></script>
    <script>
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    });

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
@stop