                <nav class="navbar navbar-inverse  navbar-static-top Nav__gen">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-11 col-md-offset-1">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                                  <span class="sr-only"></span>
                                                  <span class="icon-bar"></span>
                                                  <span class="icon-bar"></span>
                                                  <span class="icon-bar"></span>
                                     </button>

                                    <!-- Branding Image -->
                                   <a class="navbar-brand" style="margin-left: 0px" href="{{ url('/') }}">
                                      sheber.<span style="color:#03CEBD">club</span>
                                    </a>
                                    <p class="slogan">мастера вашего города</p>

                                </div>
                                <!-- Left Side Of Navbar -->
                                {{--@if(Auth::guest())--}}
                                    {{--<ul class="nav navbar-nav Nav__list">--}}
                                           {{----}}
                                     {{--</ul>--}}
                                {{--@endif--}}
                               <div id="navbar" class="navbar-collapse collapse">
                                    @if($user && $user->type == 'client')
                                        @include('partials.clientnav')
                                    @elseif($user && $user->type == 'master')
                                        @include('partials.masternav')
                                    @elseif($user && $user->type == 'admin')
                                        @include('partials.adminnav')
                                    @else
                                            <ul class="nav navbar-nav navbar-right Nav__list">
                                            <li><a class="Nav__links" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i>На главную</a></li>
                                                 <li><a class="Nav__links" href="{{ url('/create/registerandcreatejob') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Создать заявку</a></li>
                                                 <li><a class="Nav__links" href="{{url('find/masters')}}"><i class="fa fa-search" aria-hidden="true"></i>Найти мастера</a></li>
                                                 <li class="login"><a class="Nav__links" href="{{ url('/login') }}">Вход</a></li>
                                                 <li class="register"><a class="Nav__links" href="{{ url('/register') }}">Стать мастером</a></li>
                                            </ul>

                                    @endif
                                </div>
                            </div>
                         </div>
                    </div>
                </nav>