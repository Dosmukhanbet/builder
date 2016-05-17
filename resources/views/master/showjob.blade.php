@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-4 col-md-offset-1 Job__view">
                         <h3 class="Job__name">{{ $job->name }}</h3>
                         <ul class="Job__list">
                            <li>Категория :{{ $categories[$job->category_id]}}</li>
                            <li>Описание : {{ $job->description }}</li>
                            <li>Город: {{ $cities[$job->city_id]}}</li>
                            <li>Статус:
                                    @if($job->status == 0 ) Активен
                                            @else Не активен
                                    @endif
                            </li>
                            <li>Дата/время исполнения : {{ $job->dateOfMake->diffForHumans() }}</li>
                            <li>Опубликовано : {{ $job->created_at->diffForHumans() }}</li>
                            @if($job->price)
                                <li class="green__box"><h4>Бюджет : {{ $job->price }}</h4></li>
                             @endif
                         </ul>
                    </div>
                    <div class="col-md-7 Images__block">
                            @if($job->photos->isEmpty())
                                <h3>Пользователь не добавил фотографии</h3>
                            @else
                                            @foreach($job->photos->chunk(3) as $set)
                                                    <div class="row">
                                                          <div class="col-md-12  Images">
                                                     @foreach($set as $photo)
                                                                <a href="/{{$photo->path}}" data-lity>
                                                                 <img src="/{{$photo->thumbnail_path}}"  width="100px" class="img-thumbnail">
                                                                 </a>
                                                      @endforeach
                                                            </div>

                                                    </div>
                                            @endforeach
                            @endif
                     </div>


                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-1 ">
                    <hr>
                        @if($job->offers->where('user_id', Auth::user()->id)->isEmpty())
                                     @if($job->price)
                                        <form  class="form-horizontal Offer__form" action="{{ url('master/offer/for/'. $job->id) }}" method="POST">
                                                                                                        {!! csrf_field() !!}
                                        <input name="price" type="hidden" value="{{$job->price}}">
                                        <div class="form-group">
                                               <button type="submit" class="btn btn-warning">
                                                  Готовь выполнить за эту цену
                                               </button>
                                        </div>

                                        </form>
                                    @endif
                                        <form  class="form-horizontal Offer__form" action="{{ url('master/offer/for/'. $job->id) }}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} Offer__block">
                                                                    <label class="control-label">Предложить свою цену:</label>


                                                                        <input type="name" class="form-control" v-model="price | currency 'KZT '  " name="price" value="{{ old('price') }}" required>

                                                                        @if ($errors->has('price'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('price') }}</strong>
                                                                            </span>
                                                                        @endif

                                                                </div>

                                                                <div class="Offer__block form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                                                    <label class="control-label">Добавить комментарии:</label>

                                                                        <textarea class="form-control" rows="3" name="comment" value="{{ old('comment') }}"></textarea>
                                                                         @if ($errors->has('comment'))
                                                                             <span class="help-block">
                                                                             <strong>{{ $errors->first('comment') }}</strong>
                                                                          @endif

                                                                </div>

                                                                 <div class="form-group">
                                                                     <button type="submit" class="btn btn-warning">
                                                                         <i class="fa fa-btn fa-sign-in"></i>Отправить предложение
                                                                      </button>
                                                                  </div>

                                        </form>
                            @else
                                        <p class="red__box">Вы отправляли предложение для данной заявки</p>
                            @endif
                    </div>
                </div>

@endsection

@section('scripts.footer')
    <script src="/js/all.js"></script>
@endsection