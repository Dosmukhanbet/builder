@extends('layouts.app')
@section('title')
<title>Шеберлер клубы - Клуб мастеров</title>
@stop
@section('homecontent')
    @include('homepartials.jumbotron')
    @include('homepartials.howto')
    @include('homepartials.feedbacks')
    {{-- @include('homepartials.carousel') --}}

@stop

@section('jsfooter')
<script src="/js/all.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider({
    auto: true,
    slideWidth: 350,
    minSlides: 2,
    maxSlides: 3,
    moveSlides: 1,
    slideMargin: 20
  });
});
 </script>
@stop