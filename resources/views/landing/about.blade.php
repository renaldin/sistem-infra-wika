@extends('layoutLanding.main')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>About</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>About</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

   <!-- ======= About Section ======= -->
 <section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="row position-relative">

      <div class="col-lg-7 about-img" style="background-image: url({{ asset('image/about.jpeg') }})"></div>

      <div class="col-lg-7">
        <h2>Tentang Kami</h2>
        <div class="our-story">
          <h4>Est 1960</h4>
          <h3>Infrastructure 2 Division</h3>
          <p>Infrastructure 2 Division merupakan unit kerja PT. Wijaya Karya (Persero) Tbk yang bekerja dalam bidang konstruksi seperti bangunan Jalan, Jembatan, Bendungan, Pelabuhan dan bangunan lainnya. Infrastructure 2 Division memiliki 2 (dua) wilayah operasi diantaranya Departemen Operasi 3 meliputi wilayah pulau Kalimantan dan Departemen Operasi 4 meliputi wilayah Pulau Bali, Sulawesi, Maluku, Nusa Tenggara Timur, Nusa Tenggara Barat dan Papua.                .</p>

          <div class="watch-video d-flex align-items-center position-relative">
            <i class="bi bi-play-circle"></i>
            <a href="https://youtu.be/4jMF47W_s-0?si=Ok5l8YKeHtXbIyzJ" class="glightbox stretched-link">Watch Video</a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- End About Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter section-bg">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                  class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                  class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                  class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                  class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
      <div class="container" data-aos="fade-up">
    
        <div class="row justify-content-around gy-4">
          <div class="section-header">
            <h2>Struktur Organisasi</h2>
            
          </div>
    
          <div class="col-lg-6 img-bg" style="background-image: url({{ asset('image/struktur1.jpeg') }});" data-aos="zoom-in" data-aos-delay="100"></div>
    
        </div>
    
      </div>
    </section><!-- End Alt Services Section -->

    
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Management of Infrastructure 2 Division</h2>
        </div>

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="{{ asset('image/team/svp.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Hermawan Dhewayanto, S. T., M. M
              </h4>
              <span>Senior Vice President
              </span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
            <div class="member-img">
              <img src="{{ asset('image/team/Ainul Yakin.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Ainul Yakin</h4>
              <span>Manager of QHSE</span>
              
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
            <div class="member-img">
              <img src="{{ asset('image/team/Heidi Duma.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Heidi Duma</h4>
              <span>Manager of Contract Management</span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
            <div class="member-img">
              <img src="{{ asset('image/team/Eko Marsudi Utomo.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Eko Marsudi Utomo</h4>
              <span>Manager of Project Control and Planning</span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
            <div class="member-img">
              <img src="{{ asset('image/team/Murih Yuwono.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Murih Yuwono</h4>
              <span>Manager of Finance</span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="600">
            <div class="member-img">
              <img src="{{ asset('image/team/Media Persada.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Media Persada</h4>
              <span>Manager of Engineering</span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="700">
            <div class="member-img">
              <img src="{{ asset('image/team/Syauqi Nusuki.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Syauqi Nusuki</h4>
              <span>Manager of Human Capital</span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="800">
            <div class="member-img">
              <img src="{{ asset('image/team/P0.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Asropin</h4>
              <span>General Manager of operation 3</span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="900">
            <div class="member-img">
              <img src="{{ asset('image/team/P0.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Ngatemin</h4>
              <span>General Manager of Operation 4</span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="700">
            <div class="member-img">
              <img src="{{ asset('image/team/Taufik MUtaqin.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Taufik Mutaqin</h4>
              <span>Deputy General Manager of Operation 4 </span>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="800">
            <div class="member-img">
              <img src="{{ asset('image/team/P0.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Bayu Budi Setijono</h4>
              <span>Deputy General Manager of operation 4</span>
            </div>
          </div><!-- End Team Member -->

        
        </div>

        
      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>QUALITY, SAFETY, HEALTH AND 
            ENVIRONTMENT SUB DIVISION
            </h2>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Danang Setiawan.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Danang Setiawan</h4>
                  <span>Coordinator QHSE</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Moh. Saiful Anam</h4>
                  <span>Coordinator QHSE</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Abdul Hakam.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Abdul Hakam</h4>
                  <span>Coordinator QHSE</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Dien Ayu Septemberina.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Dien Ayu Septemberina</h4>
                  <span>Junior Expert QHSE</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">  
                <img src="{{ asset('image/team/Firmansyah.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">  
                <h4>Firmansyah</h4>
                  <span>Coordinator QHSE</span>
                </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">  
                <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                  <h4>Amarullah</h4>
                  <span>Staff of QHSE</span>
                </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                <img src="{{ asset('image/team/Rizky Swastya Fitrianto.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">  
                <h4>Rizky Swastya Fitrianto</h4>
                  <span>Staff of QHSE</span>
                </div>
              </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials1" class="testimonials1 section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>CONTRACT MANAGEMENT SUB DIVISION  </h2>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Agung Rio Rimbanu.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Agung Rio Rimbanu</h4>
                  <span>Coordinator of Contract Management</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Agus Istianto Budiman</h4>
                  <span>Coordinator of Contract Management</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">  
                <img src="{{ asset('image/team/W0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">  
                <h4>Kenya Hanifah Nisita</h4>
                  <span>Staff of Contract Management</span>
                </div>
                </div>
                </div>
            </div><!-- End testimonial item -->
            
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Faris Setyawan.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Faris Setyawan</h4>
                  <span>Staff of Contract Management</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Maulana Danang Adhi Prakosa.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Maulana Danang Adhi Prakosa</h4>
                  <span>Staff of Contract Management</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Fachrurrozi.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Fachrurrozi</h4>
                  <span>Staff of Contract Management</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Nawang Calistya Sari.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Nawang Calistya Sari</h4>
                  <span>Staff of Contract Management</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

     <!-- ======= Testimonials Section ======= -->
     <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>PROJECT CONTROL AND PLANNING SUB DIVISION</h2>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Galih Satria.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                    <h4>Galih Satria</h4>
                    <span>Expert 2 of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img " alt="">
                  <div class="d-block p-3">
                    <h4>Maruli Tua Simajuntak</h4>
                    <span>Expert 2 of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Agung Prasonto Nugroho.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Agung Prasanto Nugroho</h4>
                  <span>Coordinator of Project Control and Planning</span>
                  </div>
                  </div>
              </div>
            </div><!-- End testimonial item -->
            
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Martoyo.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Martoyo</h4>
                  <span>Coordinator of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Yuga Widodo</h4>
                  <span>Staff of Project Control and Planning</span>
                  </div>
                </div>
                </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Antonius Wahyu Sulistyadi</h4>
                  <span>Staff of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Ni'am Aulawi</h4>
                  <span>Staff of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Muhammad REza Aldila</h4>
                  <span>Staff of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/Andri Aprianto.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Andri Aprianto</h4>
                  <span>Staff of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/W0.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Syifa Putri Aulia</h4>
                  <span>Staff of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="d-flex">
                  <img src="{{ asset('image/team/W0.jpg') }}" class="testimonial-img" alt="">
                  <div class="d-block p-3">
                  <h4>Sendy Permana</h4>
                  <span>Staff of Project Control and Planning</span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

   <!-- ======= Testimonials Section ======= -->
   <section id="testimonials1" class="testimonials1 section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>FINANCE SUB DIVISION</h2>
      </div>

      <div class="slides-2 swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Fachrial Yunanto.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Fachrial Yunanto</h4>
                <span>Expert 1 of Tax</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Ucok Jimmy.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Ucok Jimmy</h4>
                <span>Coordinator of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex"> 
              <img src="{{ asset('image/team/Dedi Susilo.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3"> 
              <h4>Dedi Susilo</h4>
                <span>Coordinator of Accountancy</span>
              </div>
              </div>
              </div>
          </div><!-- End testimonial item -->
          
          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Ahmad Wishnu.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Ahmad Wishnu</h4>
                <span>Junior Expert of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/W0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Ade Riyanti</h4>
                <span>Junior Expert of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Yulianto.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Yulianto</h4>
                <span>Junior expert of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->
          
          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Romy Wanda Taruna</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Taufik Puspita Sanjaya</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Awaluddin Ahmad Rifqi Amrullah.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Awaluddin Ahmad Rifqi Amrullah</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Surendro Agus Prabowo.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Surendro Agus Prabowo</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Rikcy Fajar Hendra Prasetya</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Danu Sutopo.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Danu Sutopo</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/W0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Astrid Widya Astuti</h4>
                <span>Staff of Tax</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Denok Cahyaningrum Maryani.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Denok Cahyaningrum Maryani</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Erry Widiantoro.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Erry Widiantoro</h4>
                <span>Staff of Accountancy</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Bekti Kumolo Arum.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Bekti Kumolo Arum</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Rizqi An Nisa.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Rizqi An Nisa</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Zulfa Aulia Rahman</h4>
                <span>Staff of Tax</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Catu.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Catu</h4>
                <span>Staff of Archifing</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Sri Wijayanti.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Sri Wijayanti</h4>
                <span>Cashier</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/W0.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Novandiri</h4>
                <span>Secretary</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Asis Lufiyono.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Asis Lufiyono</h4>
                <span>Staff of Accountancy</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Annisa Fadhilah.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Annisa Fadhilah</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Putri Yuni Setiawan.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Putri Yuni Setiawan</h4>
                <span>Staff of Archifing</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->
          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Sarasdita Widyaningrum.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Sarasdita Widyaningrum</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="d-flex">
                <img src="{{ asset('image/team/Adikmar Norariana.jpg') }}" class="testimonial-img" alt="">
                <div class="d-block p-3">
                <h4>Adikmar Norariana</h4>
                <span>Staff of Finance</span>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>ENGINEERING SUB DIVISION</h2>
      <P> DESIGN &ANALYSIS OF ENGINEERING</P>
    </div>

    <div class="slides-2 swiper">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/R.M. Ihsan.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
                <h4>R.M. Ihsan</h4>
                <span> Junior Expert of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Muhammad Risyad Alditio.jpg') }}" class="testimonial-img " alt="">
              <div class="d-block p-3">
                <h4>Muhammad Risyad Alditio</h4>
                <span>Junior Expert of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Aswadi Irsyadillah.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Aswadi Irsyadillah</h4>
              <span>Structural Engineer</span>
              </div>
              </div>
          </div>
        </div><!-- End testimonial item -->
        
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Aryo Bimantoro</h4>
              <span>Structural Engineer</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Wahyu Imam Prambudi</h4>
              <span>Structural Engineer</span>
              </div>
            </div>
            </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Rizky Dhewandaru</h4>
              <span>Geotechnical Engineer</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->
       
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->
<!-- ======= Testimonials Section ======= -->
<section id="testimonials1" class="testimonials1 section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>ENGINEERING SUB DIVISION</h2>
      <p> BIM & DIGILIZATION OF ENGINEERING</p>
    </div>

    <div class="slides-2 swiper">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Agus Ubaidillah.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Agus Ubaidillah</h4>
              <span>Coordinator of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Herlambang Bagus Sulistyo.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Herlambang Bagus Sulistyo</h4>
              <span>BIM Engineer</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">  
            <img src="{{ asset('image/team/Rifki Rahmadian Pangestu.jpg') }}" class="testimonial-img" alt="">
            <div class="d-block p-3">  
            <h4>Rifki Rahmadian Pangestu</h4>
              <span>BIM Engineer</span>
            </div>
            </div>
            </div>
        </div><!-- End testimonial item -->
        
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Nico Hartama.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Nico Hartama</h4>
              <span>Digilization of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->
<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>ENGINEERING SUB DIVISION</h2>
      <P> SYSTEM OF ENGINEERING</P>
    </div>

    <div class="slides-2 swiper">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Aliq Taufan Arisono.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
                <h4>Aliq Taufan Arisono</h4>
                <span>Expert 2 of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Muhammad Aqrobin.jpg') }}" class="testimonial-img " alt="">
              <div class="d-block p-3">
                <h4>Muhammad Aqrobin</h4>
                <span>Coordinator of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Ahmad Najib.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Ahmad Najib</h4>
              <span>Junior Expert of Engineering</span>
              </div>
              </div>
          </div>
        </div><!-- End testimonial item -->
        
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>M. Zaenal Muttaqin</h4>
              <span>System of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Muhammad Ariful Akbar.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Muhammad Ariful Akbar</h4>
              <span>System of Engineering</span>
              </div>
            </div>
            </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Meiko Yogatama.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Meiko Yogatama</h4>
              <span>System of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->
       
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Herru Kusuma Praja.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Herru Kusuma Praja</h4>
              <span>System of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Marjukih.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Marjukih</h4>
              <span>System of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Muhammad Ali</h4>
              <span>System of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Soleh.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Soleh</h4>
              <span>System of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/P0.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Anan Febyanto Sanjaya</h4>
              <span>System of Engineering</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->
   
<!-- ======= Testimonials Section ======= -->
<section id="testimonials1" class="testimonials1 section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>HUMAN CAPITAL SUB DIVISION</h2>
    </div>

    <div class="slides-2 swiper">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Indra Dian Bakhtiar.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Indra Dian Bakhtiar</h4>
              <span>Junior Expert of Human Capital</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Jumadi.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Jumadi</h4>
              <span>Junior Expert Of Human Capital</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">  
            <img src="{{ asset('image/team/Resa Ramdani.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Resa Ramdani</h4>
              <span>Staff of Human Capital</span>
          </div>
            </div>
          </div>
        </div><!-- End testimonial item -->
        
        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Muhammad Azhari.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Muhammad Azhari</h4>
              <span>Staff of Human Capital</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-wrap">
            <div class="d-flex">
              <img src="{{ asset('image/team/Wika Dian Puri.jpg') }}" class="testimonial-img" alt="">
              <div class="d-block p-3">
              <h4>Wika Dian Puri</h4>
              <span>Staff of Human Capital</span>
              </div>
            </div>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->
  </main><!-- End #main -->

@endsection
