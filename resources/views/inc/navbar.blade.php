      <!-- Responsive navbar -->
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Mirablog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-light" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('contact') }}">Contact</a></li>
                </ul>

              <!-- Authentication Links -->
              @guest
              <div class="text-end">
                @if (Route::has('login'))
                  <a class="btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                  <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
              </div>
              @else
                <div class="dropdown text-end">
                  <a href="" class="d-block link-dark text-decoration-none dropdown-toggle text-primary" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </ul>
                </div>
              @endguest
            </div>
        </div>
      </nav>