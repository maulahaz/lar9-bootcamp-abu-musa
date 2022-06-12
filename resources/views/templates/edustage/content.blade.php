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
              <img class="img-fluid" src="{{ url('uploads/kursus/'.$rowCourse->course_pict) }}" alt="" />
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