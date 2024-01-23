    {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

    {{ Auth::user()->name }} --}}



    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form> --}}

    <a href="javascript:void(0)">
        <i class="flaticon-person"></i>
    </a>
    <div class="my-account-dropdown">
        <span class="title">QUICKLINKS</span>

        @if (Route::has('login'))
            @auth

                {{-- If the user is authenticated redirect to home --}}

                <div>
                    Welcome, {{ $user->name }}
                </div>

                <ul>
                    @if ($user->role == 'admin')
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Access Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('profile') }}">My Account</a>
                        </li>
                    @endif
                    <li>
                        <a href="#">Initiate return</a>
                    </li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            @else
                <a class="axil-btn btn-bg-primary" href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <div class="reg-footer text-center">No account yet? <a href="{{ route('register') }}">REGISTER
                            HERE.</a>
                    </div>
                @endif
            @endauth
        @endif


    </div>
