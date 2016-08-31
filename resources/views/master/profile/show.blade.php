@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-1">
                 <div>
                                  <!-- Nav tabs -->
                                  <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Профиль</a></li>
                                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Редактировать профиль</a></li>
                                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Отзывы</a></li>
                                    <li role="presentation"><a href="#rating" aria-controls="settings" role="tab" data-toggle="tab">Рейтинг</a></li>

                                  </ul>

                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="profile">@include('master.profile.profile')</div>
                                    <div role="tabpanel" class="tab-pane" id="messages">@include('master.profile.editprofile')</div>
                                    <div role="tabpanel" class="tab-pane" id="settings">@include('master.profile.showfeedbacks')</div>
                                    <div role="tabpanel" class="tab-pane" id="rating"></div>

                                  </div>

                            </div>





    </div>


</div>

@stop
@section('footer')
       <script src="/js/all.js"></script>
 @endsection