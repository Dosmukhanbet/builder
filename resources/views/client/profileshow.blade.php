@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5 col-md-offset-1 Profile__block">
                <h4 class="Profile__header">Профиль пользователя</h4>
                <ul class="Profile__list">
                    <li>Имя: {{$user->name}} </li>
                    <li>Электронный адрес: {{$user->email}} </li>
                    <li>Мобильный номер: {{$user->phone_number}} </li>
                    <li>Город: {{ $cities[$user->city_id]}}</li>


                  @if($user->photo_path)
                    <li>Фото профиля:
                  <a href="/{{ $user->photo_path }}" data-lity> <img src="/{{$user->thumbnail_path}}" class="img-thumbnail"></a>
                     </li>
                  </ul>
                  @else
                  </ul>
                  <div class="col-md-12">
                <form class="Profile__form" enctype="multipart/form-data" method="POST" action="{{url('job/clientprofile/addphoto')}}">

                        {{csrf_field()}}

                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                      <input  type="file" class="form-control Profile__inputs" name="photo">
                                           @if ($errors->has('photo'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('photo') }}</strong>
                                               </span>
                                            @endif

                        </div>
                        <div class="form-group">
                                           <button type="submit" class="btn btn-warning">Отправить фото</button>
                        </div>
                 </form>
                </div>
                @endif

    </div>
    

</div>

@stop
@section('footer')
       <script src="/js/all.js"></script>
 @endsection