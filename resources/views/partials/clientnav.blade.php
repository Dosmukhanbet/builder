                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right Nav__list">
                                       <li><a class="Nav__links" href="{{ url('/job/create') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Подать заявку</a></li>
                                        <li><a class="Nav__links" href="{{url('find/masters')}}"><i class="fa fa-search" aria-hidden="true"></i>Найти мастера</a></li>
                                        <li><a class="Nav__links" href="{{ url('/job/all') }}"><i class="fa fa-list" aria-hidden="true"></i>Мои заявки</a></li>
                                       <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                            @if(Auth::user()->thumbnail_path)
                                            <img width="25px" src="/{{Auth::user()->thumbnail_path}}" class="img-circle">
                                           @endif
                                        </a>

                                       <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/logout') }}">Выйти</a></li>
                                            <li><a href="{{ url('job/client/profile') }}">Профиль</a></li>
                                            <li><a href="{{ url('job/client/leavefeedback') }}">Оставить отзыв</a></li>
                                        </ul>
                                    </li>
                             </ul>
