<div class="col-md-6 col-md-offset-1">
<h4>Список мастеров ({{ $masters->count() }})</h4>
       @foreach($masters as $master)
            <div class="feedback__block">
            <p>
                <a data-lity href="/{{ $master->photo_path ? $master->photo_path : "profile/sitephotos/no-photo.jpg" }}">
                  <img class="img-circle" src="/{{ $master->thumbnail_path ? $master->thumbnail_path : 'profile/sitephotos/thumb-no-photo.jpg'}}">
                </a>
                <br>
                <span class="profile__master__name">
                {{ $master->name }}
                </span>
            </p>
            <div class="feedback__rating">





                        <form method="POST" action="{{url('/addFeedback/'.$master->id)}}">
                         {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label">Написать отзыв</label>
                                <textarea class="form-control" rows="2" name="body" required></textarea>
                                <div class="col-md-10">
                                         @if($errors->has('body'))
                                              <span class="help-block">
                                               <strong>{{ $errors->first('body') }}</strong>
                                              </span>
                                         @endif
                                </div>
                            </div>
                                <p class="evaluation">Поставьте оценку мастеру: <br>
                                    <label class="control-label">Отлично (5)
                                        <input type="radio" name="evaluation" value="5">
                                    </label>

                                    <label class="control-label">Хорошо (4)
                                        <input type="radio" name="evaluation" value="4">
                                    </label>


                                    <label class="control-label">Плохо (3)
                                        <input type="radio" name="evaluation" value="3">
                                    </label>
                                    <div class="col-md-10">
                                         @if($errors->has('evaluation'))
                                             <span class="help-block">
                                                 <strong>{{ $errors->first('evaluation') }}</strong>
                                              </span>
                                         @endif
                                    </div>
                          </p>




                            <div class="form-group">
                                <button class="btn btn-primary">Отправить</button>
                             </div>
                        </form>
                </div>
            </div>
       @endforeach

       {{ $masters->links() }}
</div>