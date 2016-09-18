@extends('layouts.app')

@section('content')
    <?php $user = Auth::user() ?>

		<div class="row">

			<div class="col-md-5 col-md-offset-1 Profile__addphoto">
				<h4 class="registration_steps">Шаг 2 из 3</h4>
        <h4>Добавить фотографию для профиля</h4>
				<p>
					   Добавьте свое фото к Вашему профилю. <br>
             Мастера с фото получают больше заявок от заказчиков.<br><br>
             <span class="warning">Нельзя прикреплять аватарки или фотографии не относящиеся к Вам.
             </span>
				</p>
        @include('master.formpartials.addphotoform')
				
					
			</div>
      <div class="col-md-4 chart">
        <h4>Профиль завершен на 40%</h4>
        <graph :labels="['Завершен', 'Осталось']" :values="[40, 60]"></graph>
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
