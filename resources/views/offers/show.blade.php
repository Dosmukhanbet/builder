@extends('layouts.app')



@section('content')
         <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
                    @include('offers.offerslist')
            </div>

         <div class="col-md-6">
                    @include('offers.recommended_masters')
         </div>
         </div>






@stop
@section('scripts.footer')
    <script src="/js/all.js"></script>
@stop