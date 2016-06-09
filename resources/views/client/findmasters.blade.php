@extends('layouts.app')

@section('content')
<div class="col-md-6 col-md-offset-2">
<h3>Мастера</h3>
    @foreach($masters as $master)
        <div class="findedmasters">
        <p><a data-lity href="{{ $master->photo_path ? '/' .$master->photo_path : "/profile/sitephotos/no-photo.jpg" }}">
        <img class="img-thumbnail" width="85px" src="{{ $master->photo_path ? '/'.$master->photo_path : "/profile/sitephotos/no-photo.jpg" }}"></a></p>
        <p>
            <span>Имя:</span> {{$master->name}}<br>
            <span>Город:</span> {{$cities[$master->city_id]}}<br>
            <span>Специальность:</span> {{$categories[$master->category_id]}}<br>
            <span>Мобильный номер:</span> {{$master->phone_number}}<br>
        </p>
        </div>
    @endforeach
</div>
@stop
@section('scripts.footer')
    <script src="/js/all.js"></script>
@endsection