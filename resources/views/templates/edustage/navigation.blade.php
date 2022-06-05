<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <a class="navbar-brand logo_h" href="{{url('home')}}"
      ><img src="{{ url('images/logo.png') }}" style="width:200px" alt=""
    /></a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="icon-bar"></span> <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div
      class="collapse navbar-collapse offset"
      id="navbarSupportedContent"
    >
      <ul class="nav navbar-nav menu_nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('home')}}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('page#about-us')}}">Tentang Kami</a>
        </li>
        <li class="nav-item submenu dropdown">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-toggle="dropdown"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            >Halaman</a
          >
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{url('page#course')}}">Kursus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('page#course-detail')}}"
                >Detil Kursus</a
              >
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('page#contact')}}">Hubungi kami</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link search" id="search">
            <i class="ti-search"></i>
          </a>
        </li>
        @if(!Auth::check())
        <li class="nav-item">
          <a href="{{url('login')}}" class="nav-link">
            <i class="ti-user"></i>&nbsp;&nbsp;Sign in
          </a>
        </li>
        @else
        <li class="nav-item submenu dropdown">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-toggle="dropdown"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            ><i class="ti-user"></i>&nbsp;&nbsp;<?=Auth::user()->name;?></a
          >
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{url('account/dashboard')}}"><i class="ti-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('account/profile')}}"><i class="ti-heart"></i>&nbsp;&nbsp;Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('logout')}}"><i class="ti-direction"></i>&nbsp;&nbsp;Sign out</a>
            </li>
          </ul>
        </li>
        @endif

      </ul>
    </div>
  </div>
</nav>