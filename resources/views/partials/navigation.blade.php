                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">

                            <!-- Collapsed Hamburger -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- Branding Image -->
                           <a class="navbar-brand" href="{{ url('/') }}">
                                Builder.com
                            </a>
                        </div>

                        @if($user && $user->type == 'client')
                            @include('partials.clientnav')
                        @elseif($user && $user->type == 'master')
                            @include('partials.masternav')
                        @else
                                <ul class="nav navbar-nav navbar-right">
                                     <!-- Authentication Links -->
                                     <li><a href="{{ url('/login') }}">Вход</a></li>
                                     <li><a href="{{ url('/register') }}">Регистрация</a></li>
                                </ul>

                        @endif
                    </div>
                </nav>