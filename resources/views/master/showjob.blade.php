@extends('layouts.app')

@section('content')
    <div class="row">
                    <div class="col-md-4 col-md-offset-1 Job__view">
                         <h4 class="Job__name">{{ $job->name }}</h4>
                         <p class="published_date">Опубликовано : {{ $job->created_at->diffForHumans() }}</p>
                         <ul class="Job__list">
                           <li>Описание : {{ $job->description }}</li>
                            <li>Категория :{{ $categories[$job->category_id]}}</li>
                            <li>Город: {{ $cities[$job->city_id]}}</li>
                            <li>Дата/время исполнения : {{ $job->dateOfMake->diffForHumans() }}</li>
                            @if($job->price)
                                <li class="green__box">Бюджет : {{ $job->price }}</li>
                             @endif
                         </ul>
                    </div>
                    <div class="col-md-7 Images__block">
                            @if($job->photos->isEmpty())
                                <h4>Пользователь не добавил фотографии</h4>
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
                    <div class="col-md-4 col-md-offset-1 Offer__for__job">
                    <hr style="margin-left: 15px">
                        @if($job->offers->where('user_id', Auth::user()->id)->isEmpty())
                                     @if($job->price)
                                        <form  class="Offer__form" action="{{ url('master/offer/for/'. $job->id) }}" method="POST">
                                                                                                        {!! csrf_field() !!}
                                        <input name="price" type="hidden" value="{{$job->price}}">
                                        <div class="form-group">
                                               <button type="submit" class="btn btn-warning __button ">
                                                  Готовь выполнить за эту цену
                                               </button>
                                        </div>

                                        </form>
                                    @endif
                                        <form  class="Offer__form" action="{{ url('master/offer/for/'. $job->id) }}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                                    <label class="control-label">Предложить свою цену:</label>


                                                                        <input type="name" class="form-control" v-model="price | currency 'KZT '  " name="price" value="{{ old('price') }}" required>

                                                                        @if ($errors->has('price'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('price') }}</strong>
                                                                            </span>
                                                                        @endif

                                                                </div>

                                                                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                                                    <label class="control-label">Добавить комментарии:</label>

                                                                        <textarea class="form-control" rows="3" name="comment" value="{{ old('comment') }}"></textarea>
                                                                         @if ($errors->has('comment'))
                                                                             <span class="help-block">
                                                                             <strong>{{ $errors->first('comment') }}</strong>
                                                                          @endif

                                                                </div>

                                                                 <div class="form-group">
                                                                     <button type="submit" class="btn btn-warning __button">
                                                                         Отправить предложение
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