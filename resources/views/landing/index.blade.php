@extends('layoutLanding.main')

@section('content')
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('templateLanding/img/gedung.jpg') }}" style="background-size: cover !important;"
                        class="img-fluid w-100" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text h4 animated fadeInUp" style="color: #FFFFFF;">PT. Wijaya Karya (Persero) Tbk
                            </h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInRight">Infrastructure 2 Division</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Lorem ipsum dolor sit amet elit. Sed
                                efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies
                                tincidunt.</p>
                            <a href="" class="me-2"><button type="button"
                                    class="px-4 tombol py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInLeft "
                                    style="padding: -100px !important;">Read More</button></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('templateLanding/img/gedung2.jpeg') }}" style="background-size: cover !important;"
                        class="img-fluid w-100" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text h4 animated fadeInUp" style="color: #FFFFFF;">PT. Wijaya Karya (Persero) Tbk
                            </h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInLeft">Infrastructure 2 Division</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Lorem ipsum dolor sit amet elit. Sed
                                efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies
                                tincidunt.</p>
                            <a href="" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill  carousel-content-btn2 animated fadeInLeft">Read
                                    More</button></a>

                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Fact Start -->
    <div class="container-fluid  py-5" style="background-color: #002D60;">
        <div class=" container">
            <div class="row">
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                    <div class="d-flex counter">
                        <h1 class="me-3 counter-value" style="color:#FFFFFF;">99</h1>
                        <h5 class="text-white mt-1">Project</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
                    <div class="d-flex counter">
                        <h1 class="me-3  counter-value" style="color: #FFFFFF;">25</h1>
                        <h5 class="text-white mt-1">This Year Event</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
                    <div class="d-flex counter">
                        <h1 class="me-3 counter-value" style="color: #FFFFFF;">120</h1>
                        <h5 class="text-white mt-1">Achievement</h5>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                    <div class="d-flex counter">
                        <h1 class="me-3 counter-value" style="color: #FFFFFF;">5</h1>
                        <h5 class="text-white mt-1">Certified</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- About Start -->
    <div class="container-fluid py-5 my-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="{{ asset('templateLanding/img/gedung.jpg') }}" class="img-fluid w-75 rounded"
                            alt="" style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="{{ asset('templateLanding/img/gedung2.jpeg"') }} class="img-fluid w-100 rounded"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text" style="color: #2AABE2;">About Us</h5>
                    <h1 class="mb-4">Infrastructure 2 Division</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum.
                        Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo
                        cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque
                        quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus. Etiam gravida justo
                        nec erat vestibulum, et malesuada augue laoreet.</p>
                    <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit
                        amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin
                        scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p>
                    <a href="" class="btn rounded-pill px-5 py-3 text-white"
                        style="background-color: #004899; ">More Details</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid services py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text" style="color: #2AABE2;">Our Services</h5>
                <h1>Our services will help your project</h1>
            </div>
            <div class="row g-5 services-inner">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <img src="{{ asset('templateLanding/img/gedung.jpg') }}" class="img-fluid w-70 rounded"
                                    alt="">
                                <h4 class="mb-3">Analysis</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut
                                    interdum. Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn text-white px-5 py-3 rounded-pill"
                                    style="background-color: #002D60;">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <img src="{{ asset('templateLanding/img/gedung2.jpeg') }}" class="img-fluid w-70 rounded"
                                    alt="">
                                <h4 class="mb-3">Survey</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut
                                    interdum. Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn text-white px-5 py-3 rounded-pill"
                                    style="background-color: #002D60;">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <img src="{{ asset('templateLanding/img/bim.png') }}" class="img-fluid w-70 rounded"
                                    alt="">
                                <h4 class="mb-3">Visualization</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut
                                    interdum. Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn text-white px-5 py-3 rounded-pill"
                                    style="background-color: #002D60;">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <img src="{{ asset('templateLanding/img/gedung.jpg') }}" class="img-fluid w-70 rounded"
                                    alt="">
                                <h4 class="mb-3">Research</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut
                                    interdum. Aliquam dolor eget urna ultricies tincidunt.</p>
                                <a href="" class="btn btn text-white px-5 py-3 rounded-pill"
                                    style="background-color: #002D60;">Read More</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">

                </div>
            </div>
        </div>
        <!-- Services End -->


        <!-- Project Start -->
        <div class="container-fluid project py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text" style="color: #2AABE2;">Our Project</h5>
                    <h1>Our Recently Completed Projects</h1>
                </div>
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{ asset('templateLanding/img/project-1.jpg') }}"
                                    class="img-fluid w-100 rounded" alt="">
                                <div class="project-content">
                                    <a href="#" class="text-center">
                                        <h4 class="text" style="color: #FFFFFF;">Web design</h4>
                                        <p class="m-0 text-white">Web Analysis</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{ asset('templateLanding/img/project-2.jpg') }}"
                                    class="img-fluid w-100 rounded" alt="">
                                <div class="project-content">
                                    <a href="#" class="text-center">
                                        <h4 class="text" style="color: #FFFFFF;">Cyber Security</h4>
                                        <p class="m-0 text-white">Cyber Security Core</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{ asset('templateLanding/img/project-3.jpg') }}"
                                    class="img-fluid w-100 rounded" alt="">
                                <div class="project-content">
                                    <a href="#" class="text-center">
                                        <h4 class="text" style="color: #FFFFFF;">Mobile Info</h4>
                                        <p class="m-0 text-white">Upcomming Phone</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{ asset('templateLanding/img/project-1.jpg') }}"
                                    class="img-fluid w-100 rounded" alt="">
                                <div class="project-content">
                                    <a href="#" class="text-center">
                                        <h4 class="text" style="color: #FFFFFF;">Web Development</h4>
                                        <p class="m-0 text-white">Web Analysis</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{ asset('templateLanding/img/project-2.jpg') }}"
                                    class="img-fluid w-100 rounded" alt="">
                                <div class="project-content">
                                    <a href="#" class="text-center">
                                        <h4 class="text" style="color: #FFFFFF;">Digital Marketing</h4>
                                        <p class="m-0 text-white">Marketing Analysis</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{ asset('templateLanding/img/project-3.jpg') }}"
                                    class="img-fluid w-100 rounded" alt="">
                                <div class="project-content">
                                    <a href="#" class="text-center">
                                        <h4 class="text" style="color: #FFFFFF;">keyword Research</h4>
                                        <p class="m-0 text-white">keyword Analysis</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project End -->


        <!-- Blog Start -->
        <div class="container-fluid blog py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text" style="color:#2AABE2 ;">Maps Projects</h5>
                    <h1>Distribution of Projects Infrastructure 2 Division</h1>
                </div>
                <div class="row g-5 justify-content-center">
                    <div id="map" style="width: 1500px; height: 500px;"></div>
                    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var map = L.map('map').setView([1.093807, 124.618945], 5);

                            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);

                            var marker = L.marker([-6.565861, 107.827876]).addTo(map)
                                .bindPopup('<b>PT. Wijaya Karya (Persero) Tbk</b><br />Wika Tower').openPopup();

                            var lokasi_array = [
                                ["Proyek 1", 0.774044, 116.167251],
                                ["Proyek 2", -8.901725, 116.959671],
                                ["Proyek 3", -2.824726, 102.495479]
                            ];

                            for (let i = 0; i < lokasi_array.length; i++) {
                                marker = L.marker(L.latLng(lokasi_array[i][1], lokasi_array[i][2]))
                                    .bindPopup(lokasi_array[i][0])
                                    .addTo(map);
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Team Start -->
    <div class="container-fluid py-5 mb-5 team">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text" style="color: #2AABE2;">Our Partners</h5>
                <h1>Several stakeholders working Together</h1>
            </div>
            <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('templateLanding/img/project-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('templateLanding/img/project-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('templateLanding/img/project-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('templateLanding/img/project-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('templateLanding/img/project-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('templateLanding/img/project-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('templateLanding/img/project-1.jpg"') }} class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="{{ asset('templateLanding/img/project-1.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text" style="color: #2AABE2;">Our Event</h5>
                <h1>Event Completed in Infrastructure 2 Division</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".5s">
                <div class="testimonial-item border p-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('templateLanding/img/testimonial-1.jpg') }}" alt="">
                    </div>

                </div>
                <div class="testimonial-item border p-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('templateLanding/img/testimonial-1.jpg') }}" alt="">
                    </div>

                </div>
                <div class="testimonial-item border p-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('templateLanding/img/testimonial-1.jpg') }}" alt="">
                    </div>

                </div>
                <div class="testimonial-item border p-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('templateLanding/img/testimonial-1.jpg') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text" style="color: #2AABE2;">Get In Touch</h5>
                <h1 class="mb-3">Contact for any query</h1>

            </div>
            <div class="contact-detail position-relative p-5">
                <div class="row g-5 mb-5 justify-content-center">
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg rounded-circle"
                                style="background-color: #3293D0; width: 64px; height: 64px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text" style="color: #002D60;">Address</h4>
                                <a href="https://goo.gl/maps/Zd4BCynmTb98ivUJ6" target="_blank" class="h5">JL.
                                    D.I. Panjaitan Kav. 9-10, Jakarta 13340</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg rounded-circle"
                                style="background-color: #3293D0; width: 64px; height: 64px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text" style="color: #002D60;">Call Us</h4>
                                <a class="h5" href="tel:+0123456789" target="_blank">+6221 8067 9200</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg rounded-circle"
                                style="background-color: #3293D0; width: 64px; height: 64px;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text" style="color: #002D60;">Email Us</h4>
                                <a class="h5" href="mailto:info@example.com" target="_blank">adwijaya@wika.co.id</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="p-5 h-100 rounded contact-map">
                            <iframe class="rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31729.30724681034!2d106.87659100000002!3d-6.242184!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3232a5eb1b5%3A0x3e5f3684ce6774b5!2sPT%20Wijaya%20Karya%20(Persero)%20Tbk!5e0!3m2!1sen!2sid!4v1697981290361!5m2!1sen!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="p-5 rounded contact-form">
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Your Name">
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control border-0 py-3" placeholder="Your Email">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Project">
                            </div>
                            <div class="mb-4">
                                <textarea class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Message"></textarea>
                            </div>
                            <div class="text-start">
                                <button class="btn bg text-white py-3 px-5" type="button"
                                    style="background-color: #002D60;">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
