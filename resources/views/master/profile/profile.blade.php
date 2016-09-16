    <div class="col-md-12 Profile__block">
                <ul class="Profile__list">
                    <li>Имя: {{$user->name}} </li>
                    <li>Электронный адрес: {{$user->email}} </li>
                    <li>Мобильный номер: {{$user->phone_number}} </li>
                    <li>Специальность :{{ $categories[$user->category_id]}}</li>
                    <li>Город: {{ $cities[$user->city_id]}}</li>


                  @if($user->photo_path)
                    <li>Фото профиля:
                  <a href="/{{ $user->photo_path }}" data-lity> <img src="/{{$user->thumbnail_path}}" class="img-thumbnail"></a>
                     </li>
                  </ul>
                  @else
                  </ul>
                  <div class="col-md-12">
                <form class="form-horizontal Profile__form" enctype="multipart/form-data" method="POST" action="{{url('master/profile/addnewphoto')}}">

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
