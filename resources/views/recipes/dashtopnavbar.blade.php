<div class=" titre-index">
    <div class="icon">
        <div class="slide-button">
            <svg class="svg-icon-slidebar" viewBox="0 0 20 20">
                <path fill="none"
                    d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
        								c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
        								s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
        								c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z">
                </path>
            </svg>
        </div>
        <div class="dropdown">
            <a data-toggle="dropdown">
                <img class="align-self-center rounded-circle outside img-fluid" src="{{ asset('assets/img/logo.jpg') }}"
                    width="50" height="50">
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li style="margin-bottom: 4px"><a href="#" style="display: flex;justify-items: start;"><svg
                            class="svg-icon" viewBox="0 0 20 20">
                            <path
                                d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z">
                            </path>
                        </svg> الملف الشخصي </a></li>
                <li>
                    @if (Route::has('login'))
                    <div>
                        @auth
                        <a href="{{ route('logout') }}"
                            style="font-size: 25px;color: #14bf96;margin-bottom: 18px ;margin-left: 10px"
                            onclick="event.preventDefault();
                                                                                                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-rotate-180"></i> {{ __('تسجيل خروج') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        @else

                        <a href="{{ route('login') }}" style="font-size: 20px;color: #14bf96; margin-left: 10px">تسجيل
                            الدخول </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            style="font-size: 20px;color: #14bf96;margin-left: 7px">تسجيل</a>
                        @endif
                        @endauth
                    </div>
                    @endif

                </li>
            </ul>
        </div>
    </div>
</div>
