 <div class="jumbotron nopaddings">
      <div class="container">
        <div class="col-md-8 col-md-offset-2 home__font">
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