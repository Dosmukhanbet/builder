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
                            </div>
                                <p>Оцените работу мастера: </p>





                            <div class="form-group">
                                <button class="btn btn-primary">Отправить</button>
                             </div>
                        </form>
                </div>
            </div>
       @endforeach

       {{ $masters->links() }}
</div>