<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="{{route('home')}}" class="logo d-flex align-items-center">
      <img src="{{asset('frontend/img/logo.png')}}" alt="">
      <!-- <span>Klientale</span> -->
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="{{route('home')}}"><span>Home</span></a></li>
        <li><a class="nav-link scrollto" href="{{route('business')}}"><span>Business</span></a></li>
        <li><a class="nav-link scrollto" href="{{route('home')}}#about"><span>About</span></a></li>
        <li><a class="nav-link scrollto" href="{{route('home')}}#features"><span>Features</span></a></li>
        <li><a class="nav-link scrollto" href="{{route('pricing')}}"><span>Pricing</span></a></li>
        @guest
        <li><a class="nav-link scrollto login-link" href="{{route('login')}}"><span>Login / Sign Up</span></a></li>
        @else

        <li>
            <a class="nav-link scrollto login-link" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
        </li>
        @endguest
        <li><a class="getstarted scrollto" href="{{route('home')}}#portfolio">Get your industry specific platform demo</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->