 <div class="jumbotron nopaddings">
      <div class="container">
        <div class="col-md-8 col-md-offset-2 home__font">
            <h3 class="home_page_heading" style="text-align: center;">
                Доверьте работу <br>
                профессионалам своего дела!
            </h3>
            <p class="home_page_text" style="text-align: center;">
               В нашем <span style="color:#049E8E">"Клубе Мастеров"</span> зарегистрированы только лучшие специалисты, которые возмутся за Вашу работу
            </p>
            @if(Auth::guest())
               <p style="text-align: center">
                    <a class="btn create__button" href="create/registerandcreatejob">Создать заявку</a>
               </p>
            @endif
      </div>
      <div class="col-md-10 col-md-offset-1 main_image">
          <img width="900px" src="/profile/sitephotos/employees2.jpg">
      </div>
      </div>
 </div>