<div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('/home') }}">Главная</a></li>
                                <li><a href="{{ url('/job/create') }}">Подать заявку</a></li>

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                       <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                            <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-sign-out"></i>Профиль</a></li>
                                            <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-sign-out"></i>Мои заказы</a></li>
                                        </ul>
                                    </li>
                             </ul>
                        </div>