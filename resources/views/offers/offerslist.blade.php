 <h4>Предложения на заявку: {{$offers[0]->job->name}} </h4>
         @foreach($offers as $offer)
         <div class="Offer__block {{$offer->status ? 'accepted' : ''}}">
                      <a href="/{{ $offer->user->photo_path ? $offer->user->photo_path : "profile/sitephotos/no-photo.jpg" }}" data-lity>
                       <img  src="/{{$offer->user->thumbnail_path ? $offer->user->thumbnail_path : "profile/sitephotos/thumb-no-photo.jpg"}}" class="Offer__image img-thumbnail">
                      </a>
                      <ul class="Offer__list">
                                     <li>Мастер: {{$offer->user->name}} </li>
                                     <li>Сотовый номер: +{{$offer->user->phone_number}} </li>
                                     <li>Предложенная цена: {{$offer->price}}</li>
                                     <li>Комментария: @if($offer->comment) {{$offer->comment}}
                                                      @else нет комментарии
                                                      @endif
                                     </li>
                                     <li> Поступило: {{ $offer->created_at->diffForHumans()  }}</li>
                      </ul>
                             @if($offer->status)
                                <p><span class="icon__accepted"><i class="fa fa-check-circle" aria-hidden="true"></i></span>Вы приняли это предложение</p>
                                  @if($offer->job->dateOfMake < Carbon\Carbon::now())
                                    <jobdone :jobid="{{$offer->job->id}}" :jobstatus="{{$offer->job->status}}"></jobdone>
                                        @include('partials.modalfeedback')

                                  @endif
                             @else
                                <a href="{{ url('job/accept/offer/' . $offer->id . "/" . $offer->user->id) }}" class="btn btn-warning __button" >
                                  Принять предложение
                                </a>
                             @endif
         </div>
         @stop

         @section('scripts.footer')

         @stop
