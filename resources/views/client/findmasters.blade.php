@extends('layouts.app')

@section('content')
<masters :cats="{{$cats}}"></masters>

<div class="col-md-5">
        <h4>Новые мастера ({{$masters->count()}})</h4>
        @if(!$masters->isEmpty())
        @foreach($masters as $master)
            <div class="findedmasters">
            <p><a data-lity href="{{ $master->photo_path ? '/' .$master->photo_path : "/profile/sitephotos/no-photo.jpg" }}">
            <img class="img-thumbnail" src="{{ $master->thumbnail_path ? '/'.$master->thumbnail_path : "/profile/sitephotos/thumb-no-photo.jpg" }}"></a></p>
            <p>
                <span>Имя:</span> {{$master->name}}<br>
                <span>Город:</span> {{$cities[$master->city_id]}}<br>
                <span>Специальность:</span> {{$categories[$master->category_id]}}<br>
                <span>Мобильный номер:</span> +{{$master->phone_number}}<br>
            </p>
            </div>

        @endforeach
        {{--{{$masters->links()}}--}}
        @else
            <h5>В данный момент, нет мастеров в Вашем регионе</h5>
        @endif
</div>


@stop
@section('scripts.footer')
    <script src="/js/all.js"></script>
@endsection