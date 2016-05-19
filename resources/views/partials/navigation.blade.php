                <nav class="navbar navbar-inverse  navbar-static-top Nav__gen">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="navbar-header">
                                    <!-- Branding Image -->
                                   <a class="navbar-brand" href="{{ url('/') }}">
                                        Builder.com
                                    </a>
                                </div>
                                <!-- Left Side Of Navbar -->
                                @if(Auth::guest())
                                    <ul class="nav navbar-nav">
                                           <li><a href="{{ url('/create/registerandcreatejob') }}">Создать заявку</a></li>
                                           <li><a href="#">Найти исполнителя</a></li>
                                     </ul>
                                @endif

                                @if($user && $user->type == 'client')
                                    @include('partials.clientnav')
                                @elseif($user && $user->type == 'master')
                                    @include('partials.masternav')
                                @else
                                        <ul class="nav navbar-nav navbar-right">
                                             <li><a href="{{ url('/login') }}">Вход</a></li>
                                             <li><a href="{{ url('/register') }}">Регистрация</a></li>
                                        </ul>

                                @endif
                            </div>
                         </div>
                    </div>
                </nav>