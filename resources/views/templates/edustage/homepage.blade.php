<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Kurses :: Kursus disini InshaAllah Sukses</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('t_edustage') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ url('t_edustage') }}/css/flaticon.css" />
    <link rel="stylesheet" href="{{ url('t_edustage') }}/css/themify-icons.css" />
    <link rel="stylesheet" href="{{ url('t_edustage') }}/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ url('t_edustage') }}/vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ url('t_edustage') }}/css/style.css" />

  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Cari disini..."
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div>

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
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Beranda Banner Area =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <p class="text-uppercase">
                  Kursus Online Tersukses Se Asia
                </p>
                <h2 class="text-uppercase mt-4 mb-5">
                  Kursus Dengan Hasil Akhir Selangkah Lebih Sukses 
                </h2>
                <div>
                  <a href="#" class="primary-btn2 mb-3 mb-sm-0">pelajari</a>
                  <a href="{{url('/#pilihan-kursus')}}" class="primary-btn ml-sm-3 ml-0">lihat kursus</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Beranda Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Mengapa Memilih Kami</h2>
              <p>
                Kredibilitas, Pengalaman dan Mutu
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-student"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Beasiswa</h4>
                <p>
                  One make creepeth, man bearing theira firmament won't great
                  heaven
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-book"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Kursus berbasis cloud</h4>
                <p>
                  One make creepeth, man bearing theira firmament won't great
                  heaven
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-earth"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Sertifikat Dunia</h4>
                <p>
                  One make creepeth, man bearing theira firmament won't great
                  heaven
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses" id="pilihan-kursus">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Pilihan Kursus</h2>
              <p>
                Replenish man have thing gathering lights yielding shall you
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">

              @foreach($dtCourses as $rowCourse)
              <div class="single_course">
                <div class="course_head">
                  <img class="img-fluid" src="{{ url('images/courses/'.$rowCourse->course_pict) }}" alt="" />
                </div>
                <div class="course_content">
                  <span class="price">{{$rowCourse->price}}jt</span>
                  <span class="tag mb-4 d-inline-block">{{$rowCourse->category}}</span>
                  <h4 class="mb-3">
                    <a href="{{url('page#course-detail')}}">{{$rowCourse->title}}</a>
                  </h4>
                  <p>
                    {{$rowCourse->description}}
                  </p>
                  <div
                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                  >
                    <div class="authr_meta">
                      <img src="{{ url('images/trainers/'.$rowCourse->trainer_pict) }}" alt="" />
                      <span class="d-inline-block ml-2">{{$rowCourse->name}}</span>
                    </div>
                    <div class="mt-lg-0 mt-3">
                      <span class="meta_info mr-2">
                        <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                      </span>
                      <span class="meta_info"
                        ><a href="#"> <i class="ti-heart mr-2"></i>35 </a></span
                      >
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    <div class="section_gap registration_area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="row clock_sec clockdiv" id="clockdiv">
              <div class="col-lg-12">
                <h1 class="mb-3">Buruaaan Daftar Sekarang!!</h1>
                <p>
                  Gabung bersama kami, untuk merasakan kesuksesan yang nyata.
                </p>
              </div>
              <div class="col clockinner1 clockinner">
                <h1 class="days">5</h1>
                <span class="smalltext">Hari</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="hours">23</h1>
                <span class="smalltext">Jam</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="minutes">47</h1>
                <span class="smalltext">Menit</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="seconds">29</h1>
                <span class="smalltext">Detik</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <div class="register_form">
              <h3>Cobain Kursus nya Yuuk</h3>
              <p>Mumpung masih gratis..tis..</p>
              <form
                class="form_area"
                id="myForm"
                action="mail.html"
                method="post"
              >
                <div class="row">
                  <div class="col-lg-12 form_group">
                    <input
                      name="name"
                      placeholder="Nama kamu"
                      required=""
                      type="text"
                      autocomplete="off"
                    />
                    <input
                      name="telp"
                      placeholder="Telp yg aktif"
                      required=""
                      type="tel"
                      autocomplete="off"
                    />
                    <input
                      name="email"
                      placeholder="Alamat Email"
                      pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                      required=""
                      type="email"
                      autocomplete="off"
                    />
                  </div>
                  <div class="col-lg-12 text-center">
                    <button class="primary-btn">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Registration Area =================-->

    <!--================ Start Trainers Area =================-->
    <section class="trainer_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Trainer yang mumpuni</h2>
              <p>
                Tenaga pengajar yang bukan kaleng-kaleng, alias pengajar yang memang ahli di bidangnya.
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center d-flex align-items-center">
          @foreach($dtTrainers as $rowTrainer)
          <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="{{ url('images/trainers/'.$rowTrainer->picture) }}" alt="" />
            </div>
            <div class="meta-text text-sm-center">
              <h4>{{ $rowTrainer->name }}</h4>
              <p class="designation">{{ $rowTrainer->expert }}</p>
              <div class="mb-4">
                <p>
                  If you are looking at blank cassettes on the web, you may be
                  very confused at the.
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>
              </div>
            </div>
          </div>
          @endforeach


        </div>
      </div>
    </section>
    <!--================ End Trainers Area =================-->

    <!--================ Start Events Area =================-->
    <div class="events_area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">Ikuti Event Kami..</h2>
              <p>
                Seru, Edukatif dan menyenangkan semua peserta.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
        @foreach($dtEvents as $rowEvent)
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
              <div class="event_thumb">
                <img src="{{ url('images/events/'.$rowEvent->picture) }}" alt="" width="100%"/>
              </div>
              <div class="event_details">
                <div class="d-flex mb-4">
                  <div class="date"><span>{{ date('d', strtotime($rowEvent->event_start)) }}</span> {{ date('M', strtotime($rowEvent->event_start)) }}</div>
                  <div class="time-location">
                    <p>
                      <span class="ti-time mr-2"></span> {{ date('g:i a', strtotime($rowEvent->event_start)) }} - {{ date('g:i a', strtotime($rowEvent->event_end)) }}
                    </p>
                    <p>
                      <span class="ti-location-pin mr-2"></span> {{ $rowEvent->location }}
                    </p>
                  </div>
                </div>
                <p>
                  {{ $rowEvent->short_desc }}
                </p>
                <a href="{{ url('event/'.$rowEvent->slug) }}" class="primary-btn rounded-0 mt-3">View Details</a>
              </div>
            </div>
          </div>
        @endforeach

          <div class="col-lg-12">
            <div class="text-center pt-lg-5 pt-3">
              <a href="{{ url('event') }}" class="event-link">
                View All Event <img src="{{ url('t_edustage') }}/img/next.png" alt="" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Events Area =================-->

    <!--================ Start Testimonial Area =================-->
    <div class="testimonial_area section_gap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Apa kata mereka</h2>
              <p>
                Testimoni mereka merupakan motivasi dan semangat kami
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="testi_slider owl-carousel">
          @foreach($dtTestimonials as $rowTesti)
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="{{ url('images/testimonis/'.$rowTesti->picture) }}" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>{{ $rowTesti->name }}</h4>
                    <p>
                      {{ $rowTesti->comment }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
    <!--================ End Testimonial Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 single-footer-widget">
            <h4>Tentang Kami</h4>
            <p>Kurses adalah sebuah perusahan startup yang sedang berkembang di daerah tertentu, yang bergerak di bidang Edutaintment.</p>
          </div>
          <div class="col-lg-4 col-md-6 single-footer-widget">
            <h4>Features</h4>
            <ul>
              <li><a href="#">Menu-1</a></li>
              <li><a href="#">Menu-2</a></li>
              <li><a href="#">Menu-3</a></li>
              <li><a href="#">Menu-4</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 single-footer-widget">
            <h4>Alamat</h4>
            <p>Jl. Besar, Kelurahan Agung, Cimanggis. Baturaja - Sulsel</p>
          </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-dribbble"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('t_edustage') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ url('t_edustage') }}/js/popper.js"></script>
    <script src="{{ url('t_edustage') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('t_edustage') }}/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('t_edustage') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ url('t_edustage') }}/js/owl-carousel-thumb.min.js"></script>
    <script src="{{ url('t_edustage') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ url('t_edustage') }}/js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ url('t_edustage') }}/js/gmaps.min.js"></script>
    <script src="{{ url('t_edustage') }}/js/theme.js"></script>
  </body>
</html>