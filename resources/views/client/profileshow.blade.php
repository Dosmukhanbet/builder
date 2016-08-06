@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-1">

                                  <!-- Nav tabs -->
                                  <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Профиль</a></li>
                                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Редактировать профиль</a></li>
                                  </ul>

                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="profile">@include('client.partials.showprofile')</div>
                                    <div role="tabpanel" class="tab-pane" id="messages">@include('client.partials.editprofile')</div>
                                  </div>







    </div>
    

</div>

@stop
@section('footer')
       <script src="/js/all.js"></script>
 @endsection