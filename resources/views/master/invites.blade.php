@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <h4 class="invites__header"><i class="fa fa-tasks" aria-hidden="true"></i>Мои приглашения</h4>
            @foreach($invites as $invite)
                <div class="invites">
                <newinvites :userId="{{ Auth::user()->id }}"></newinvites>
                      <div class="invite__user">
                      <p class="date_created_at">{{$invite->created_at}}</p>
                      <h6>От пользователя:</h6>
                        <a href="/{{ $invite->from()->photo_path ? $invite->from()->photo_path : "profile/sitephotos/no-photo.jpg" }}" data-lity>
                             <img  src="/{{$invite->from()->thumbnail_path ? $invite->from()->thumbnail_path : "profile/sitephotos/thumb-no-photo.jpg"}}" class="Offer__image img-thumbnail">
                         </a>
                        <p><span>Имя: </span>{{$invite->from()->name}}</p>
                        <p><span>Мобильный: </span>{{$invite->from()->phone_number}}</p>
                        <p><span>Электронный адрес: </span>{{$invite->from()->email}}</p>
                      </div>


                       <div class="invite__job">
                        <h6>Детали работы:</h6>
                         <p><span>Кратко о работе: </span>{{$invite->job->name}}</p>
                         <p><span>Бюджет: </span>{{$invite->job->price}}</p>
                         <p><a href="/master/show/job/{{$invite->job->id}}">посмотреть заявку...</a></p>
                       </div>
                </div>
            @endforeach
        </div>
    </div>
@stop


@section('footer')
    <script src="/js/all.js"></script>

@stop