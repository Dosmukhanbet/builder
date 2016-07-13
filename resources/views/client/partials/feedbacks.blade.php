<div class="col-md-6 col-md-offset-1">
<h4>Список мастеров</h4>
       @foreach($masters as $master)
            <div class="masters_list">
            <p>
                <a data-lity href="/{{ $master->photo_path ? $master->photo_path : "profile/sitephotos/no-photo.jpg" }}">
                  <img class="img-circle" src="/{{ $master->thumbnail_path ? $master->thumbnail_path : 'profile/sitephotos/thumb-no-photo.jpg'}}">
                </a>
                <br>
                <span class="profile__master__name">
                {{ $master->name }}
                </span>
            </p>

                <form method="POST" class="" action="{{url('/addFeedback/'.$master->id)}}">
                 {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label">Написать отзыв</label>
                        <textarea class="form-control" rows="2" name="body" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Отправить</button>
                     </div>
                </form>
            </div>
       @endforeach

       {{ $masters->links() }}
</div>