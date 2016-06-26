@extends('layouts.app')
@section('homecontent')
    <div class="jumbotron nopaddings">
      <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="home_page_heading" style="text-align: center; color: #fff">
                Найдите лучшего <br>
                мастера в своем деле
            </h2>
            <p class="home_page_text" style="text-align: center; color: #fff">С Sheber.club вы с легкостью, найдете
                <br>подходящего мастера
            </p>
            @if(Auth::guest())
               <p style="text-align: center">
                    <a class="create__button" href="create/registerandcreatejob">Создать заявку</a>
               </p>
            @endif
      </div>
      <div class="col-md-10 col-md-offset-1 main_image">
          <img width="900px" src="/profile/sitephotos/line-up.svg">
      </div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-4 steps">
                      <h4><span>1</span> Создайте заявку</h4>
                      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    </div>
                    <div class="col-md-4 steps">
                      <h4><span>2</span> Найдите мастера</h4>
                      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    </div>
                    <div class="col-md-4 steps">
                      <h4><span>3</span> Оставьте отзыв</h4>
                      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    </div>
            </div>
      </div>

@endsection