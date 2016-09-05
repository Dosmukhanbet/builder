@extends('layouts.app')

@section('content')
    <?php $user = Auth::user() ?>
    <div class="row">
    	<div class="col-md-5 col-md-offset-1 Profile__addskills">
    		<h4 class="registration_steps">Шаг 3 из 4</h4>
    		<h4>Опыт работы | Рекламный текст для профиля </h4>
				  
					@include('master.formpartials.addskillsform')

						

    	</div>
    	<div class="col-md-4 chart">
    	<h4>Профиль завершен на 60%</h4>
				<graph :labels="['Завершен', 'Осталось']" :values="[60, 40]"></graph>
    	</div>
    </div>

@stop
@section('footer')
    <script src="/js/all.js"></script>
    <script>
    		$(function () {
                  $('[data-toggle="popover"]').popover()
                });

    </script>
@stop