                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav Nav__list">
                                <li><a class="Nav__links" href='{{ url("master/active/jobs") }}'>Активные заявки</a></li>
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                       <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                            @if(Auth::user()->thumbnail_path)
                                            <img width="30px" src="/{{Auth::user()->thumbnail_path}}" class="img-circle">
                                            @endif
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/logout') }}">Выйти</a></li>
                                            <li><a href="{{ url('master/profile') }}">Профиль</a></li>
                                        </ul>
                                    </li>
                             </ul>
                        </div>