<div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            {{--<ul class="nav navbar-nav Nav__list">--}}
                                {{----}}


                            {{--</ul>--}}

                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right Nav__list">
                                       <li><a class="Nav__links" href="{{ url('/job/create') }}">Подать заявку</a></li>
                                        <li><a class="Nav__links" href="{{ url('/job/all') }}">Мои заявки</a></li>
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
                                        </ul>
                                    </li>
                             </ul>
                        </div>