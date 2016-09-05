<form enctype="multipart/form-data" method="POST" action="{{url('master/profile/addphoto')}}">
					{{ csrf_field() }}
					    <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                               <label class="col-md-12 control-label">Выберите фотографию</label>
                                               <div class="col-md-12">
                                                    <input  type="file"
                                                            placeholder="Выберите фотографию"
                                                            class="form-control"
                                                            name="photo"
                                                            data-toggle="popover"
                                                            data-placement="top"
                                                            data-trigger="focus"
                                                            data-content="Добавьте фото к Вашему профилю. Мастера с фото вызывает больше доверия у клиентов"
                                                            value="{{ old('photo') }}"
                                                            required>

                                                    @if ($errors->has('photo'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('photo') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                        </div>
                        <div class="form-group">
						                            <div class="col-md-12">
                                          @if( ! $user->photo_path)
						                                <button type="submit" class="btn btn-warning __button">
						                                   Добавить фото
						                                </button>
                                          @endif  
                                                        <a class="skip__button" href="{{url('master/addskills')}}">{{$user->photo_path ? "Далее" : "Пропустить" }}</a>
						                            </div>
                       	</div>

				</form>