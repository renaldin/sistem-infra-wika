<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <title>Infrastructure 2 Division</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Google Web Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('templateLanding/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templateLanding/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('templateLanding/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('templateLanding/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <style>
    body {
    font-family: 'Open Sans', sans-serif;
}

  </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->

    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid " style="background-color: #093464; border-color: #2AABE2;">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-lg py-0">
                <a href="index.html" class="navbar-brand">
                    <img src="{{ asset('templateLanding/img/infra2.png') }}" class="w-25">
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-transparent " id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-xl-auto p-0">
                        <a href="/" class="nav-item nav-link active text-primary"><b>HOME</b></a>
                        <a href="/about" class="nav-item nav-link"><b>ABOUT</b></a>
                        <a href="/login" class="nav-item nav-link"><b>WIKAENGINEES</b></a>
                        <a href="/contact" class="nav-item nav-link"><b>CONTACT</b></a>
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-shirink-0">

                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid footer bg wow fadeIn" style="background-color: #002D60; border-color: #2AABE2;" data-wow-delay=".3s">
        <div class="container pt-5 pb-4">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <a href="index.html">
                        <img src="{{ asset('templateLanding/img/logo.png') }}" class="w-50">
                    </a>
                    <p class="mt-4 text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta facere delectus qui placeat inventore consectetur repellendus optio debitis.</p>
                    <div class="d-flex hightech-link">
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-facebook-f text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-twitter text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-instagram text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text" style="color: #2AABE2;">Short Link</a>
                    <div class="mt-4 d-flex flex-column short-link">
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>About us</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>Contact us</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>Our Services</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>Our Projects</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>Latest Blog</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text" style="color: #2AABE2;">Help Link</a>
                    <div class="mt-4 d-flex flex-column help-link">
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>Terms Of use</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>Privacy Policy</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>Helps</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>FQAs</a>
                        <a href="" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>Contact</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text" style="color: #2AABE2;">Contact Us</a>
                    <div class="text-white mt-4 d-flex flex-column contact-link">
                        <a href="#" class="pb-3 text-light border-bottom border-primary"><i class="fas fa-map-marker-alt text-primary me-2"></i> JL. D.I. Panjaitan Kav. 9-10, Jakarta 13340</a>
                        <a href="#" class="py-3 text-light border-bottom border-primary"><i class="fas fa-phone-alt text-primary me-2"></i> +6221 8067 9200</a>
                        <a href="#" class="py-3 text-light border-bottom border-primary"><i class="fas fa-envelope text-primary me-2"></i> adwijaya@wika.co.id</a>
                    </div>
                </div>
            </div>
            <hr class="text-light mt-5 mb-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <span class="text-light"><a href="#" class="text-primary"><i class="fas fa-copyright text me-2" style="color: #2AABE2;"></i>Tim Digitalisasi</a>, All right reserved.</span>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn btn-square rounded-circle back-to-top" style="background-color: #3293D0">
        <i class="fa fa-arrow-up text-white"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templateLanding/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('templateLanding/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('templateLanding/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('templateLanding/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('templateLanding/js/main.js') }}"></script>
</body>

</html>
