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
                                                            {{--<ul class="nav navbar-nav">--}}
                                                                {{--<li><a href="{{ url('/job/create') }}">Начать работу</a></li>--}}
                                                               {{--<li><a href="{{ url('/pages/howitworks') }}">Как это работает?</a></li>--}}

                                                            {{--</ul>--}}

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