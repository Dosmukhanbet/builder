 <div class="jumbotron nopaddings">
      <div class="container">
        <div class="col-md-8 col-md-offset-2 home__font">
            <h2 class="home_page_heading" style="text-align: center;">
                Доверьте Вашу работу <br>
                профессионалам своего дела!
            </h2>
            <p class="home_page_text" style="text-align: center;">Тысячи мастеров из Вашего региона, готовы выполнить ваш заказ
            </p>
            @if(Auth::guest())
               <p style="text-align: center">
                    <a class="create__button" href="create/registerandcreatejob">Создать заявку</a>
               </p>
            @endif
      </div>
      <div class="col-md-10 col-md-offset-1 main_image">
          <img width="900px" src="/profile/sitephotos/employees2.jpg">
      </div>
      </div>
 </div>