                          <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav Nav__list navbar-right">
                                       <li><a class="Nav__links" href='{{ url("master/active/jobs") }}'><i class="fa fa-cogs" aria-hidden="true"></i>Активные заявки</a></li>
                                       <li><a class="Nav__links" href='{{ url("master/invites") }}'><i class="fa fa-tasks" aria-hidden="true"></i>My invites</a></li>

                                       <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                            @if(Auth::user()->thumbnail_path)
                                            <img width="25px" src="/{{Auth::user()->thumbnail_path}}" class="img-circle">
                                            @endif
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/logout') }}">Выйти</a></li>
                                            <li><a href="{{ url('master/profile') }}">Профиль</a></li>
                                        </ul>
                                    </li>
                             </ul>
