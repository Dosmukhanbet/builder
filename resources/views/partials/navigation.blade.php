                <nav class="navbar navbar-inverse  navbar-static-top Nav__gen">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="navbar-header">
                                    <!-- Branding Image -->
                                   <a class="navbar-brand" href="{{ url('/') }}">
                                        Sheber.club
                                    </a>
                                </div>
                                <!-- Left Side Of Navbar -->
                                {{--@if(Auth::guest())--}}
                                    {{--<ul class="nav navbar-nav Nav__list">--}}
                                           {{----}}
                                     {{--</ul>--}}
                                {{--@endif--}}

                                @if($user && $user->type == 'client')
                                    @include('partials.clientnav')
                                @elseif($user && $user->type == 'master')
                                    @include('partials.masternav')
                                @else
                                        <ul class="nav navbar-nav navbar-right Nav__list">
                                             <li><a class="Nav__links" href="{{ url('/create/registerandcreatejob') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Создать заявку</a></li>
                                             <li><a class="Nav__links" href="{{url('find/masters')}}"><i class="fa fa-search" aria-hidden="true"></i>Найти мастера</a></li>
                                             <li class="login"><a class="Nav__links" href="{{ url('/login') }}">Вход</a></li>
                                             <li class="register"><a class="Nav__links" href="{{ url('/register') }}">Регистрация</a></li>
                                        </ul>

                                @endif
                            </div>
                         </div>
                    </div>
                </nav>