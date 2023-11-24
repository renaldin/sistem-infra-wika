@extends('layoutLanding.main')

@section('content')
<!-- ======= Get Started Section ======= -->
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
<!-- ======= Maps Section ======= -->
<section id="maps" class="maps">
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
                            ["Sumbu Timur",-0.9596623, 116.7020184],
                            ["Bendungan Manikin", -10.2147620, 123.7191163],
                            ["D&B Pengerukan Pelabuhan Benoa Paket A", -8.7457246,115.2089482],
                            ["Duplikasi Jembatan Kapuas I MYC", -0.0371631,109.3518281],
                            ["Bendungan Pamukkulu", -5.3972773,119.5905002],
                            ["Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II",-1.4563982,113.0933217],
                            ["Akses Tol Makassar New Port", -5.1160465,119.4110114],
                            ["Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing)", 0.5143710,108.9476736],
                            ["Bendungan Jenelata", -5.2918439,119.5990221],
                            ["Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung", -1.1573949,116.8407825],
                            ["Dredging Pendalaman Alur Tursina Area III & IV", 0.0988705,117.4816524],
                            ["Irigasi Gumbasa", -1.2017391,119.9425945],
                            ["Bendungan Ameroro", -3.9083268,122.0099196],
                            ["Underpass Tatakan 101", -3.0751754,115.1101065],
                            ["Mandalika Urban Tourism Infrastructure Project Package 1", -8.8976580,116.3038789],
                            ["Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja", -1.5020489,119.8653219],
                            ["SPRD (KPC)", 0.5457752,117.6217823],
                            ["MWRD (KPC)", 0.5457752,117.6217823],
                            ["Penyiapan Lahan Industri PKT Bontang", 0.1007683,117.4764607],
                            ["Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom", -3.3312800,140.7670145],
                            ["Wani Port", -0.6948045,119.8402461],
                            ["Donggala Port", -0.6670883,119.7443731],
                            ["PASIGALA raw water transmission system rehabilitation (Paket 1)", 119.7443731,119.9631180],
                            ["Bandar Udara Banggai", -1.5540836,123.5546477],
                            ["Proyek JDU SPAM Regional Mamminasata", -5.1628036,119.5956783]
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
</section>
<!-- ======= End Section ======= -->

<!-- ======= Construction Section ======= -->
<section id="constructions" class="constructions">
<div class="container" data-aos="fade-up">

    <div class="section-header">
    <h2>Constructions</h2>
    <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem
        dolore earum</p>
    </div>

    <div class="row gy-4">

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card-item">
        <div class="row">
            <div class="col-xl-5">
            <div class="card-bg" style="background-image: url({{asset('templateLand/assets/img/constructions-1.jpg')}});"></div>
            </div>
            <div class="col-xl-7 d-flex align-items-center">
            <div class="card-body">
                <h4 class="card-title">Eligendi omnis sunt veritatis.</h4>
                <p>Fuga in dolorum et iste et culpa. Commodi possimus nesciunt modi voluptatem placeat deleniti
                adipisci. Cum delectus doloribus non veritatis. Officia temporibus illo magnam. Dolor eos et.</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Card Item -->

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="card-item">
        <div class="row">
            <div class="col-xl-5">
            <div class="card-bg" style="background-image: url({{asset('templateLand/assets/img/constructions-2.jpg')}});"></div>
            </div>
            <div class="col-xl-7 d-flex align-items-center">
            <div class="card-body">
                <h4 class="card-title">Possimus ut sed velit assumenda</h4>
                <p>Sunt deserunt maiores voluptatem autem est rerum perferendis rerum blanditiis. Est laboriosam qui
                iste numquam laboriosam voluptatem architecto. Est laudantium sunt at quas aut hic. Eum
                dignissimos.</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Card Item -->

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="card-item">
        <div class="row">
            <div class="col-xl-5">
            <div class="card-bg" style="background-image: url({{asset('templateLand/assets/img/constructions-3.jpg')}});"></div>
            </div>
            <div class="col-xl-7 d-flex align-items-center">
            <div class="card-body">
                <h4 class="card-title">Error beatae dolor inventore aut</h4>
                <p>Dicta porro nobis. Velit cum in. Nesciunt dignissimos enim molestiae facilis numquam quae quaerat
                ipsam omnis. Neque debitis ipsum at architecto officia laboriosam odit. Ut sunt temporibus nulla
                culpa.</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Card Item -->

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="card-item">
        <div class="row">
            <div class="col-xl-5">
            <div class="card-bg" style="background-image: url({{asset('templateLand/assets/img/constructions-4.jpg')}});"></div>
            </div>
            <div class="col-xl-7 d-flex align-items-center">
            <div class="card-body">
                <h4 class="card-title">Expedita voluptas ut ut nesciunt</h4>
                <p>Aut est quidem doloremque voluptatem magnam quis excepturi vero quia. Eum eos doloremque
                architecto illo at beatae dolore. Fugiat suscipit et sint ratione dolores. Aut aliquid ea dolores
                libero nobis.</p>
            </div>
            </div>
        </div>
        </div>
    </div><!-- End Card Item -->

    </div>

</div>
</section><!-- End Constructions Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
<div class="container" data-aos="fade-up">

    <div class="section-header">
    <h2>Services</h2>
    <p>Voluptatem quibusdam ut ullam perferendis repellat non ut consequuntur est eveniet deleniti fignissimos eos
        quam</p>
    </div>

    <div class="row gy-4">

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item  position-relative">
        <div class="icon">
            <i class="fa-solid fa-mountain-city"></i>
        </div>
        <h3>Nesciunt Mete</h3>
        <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis
            tempore et consequatur.</p>
        <a href="service-details.html" class="readmore stretched-link">Learn more <i
            class="bi bi-arrow-right"></i></a>
        </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
        <div class="icon">
            <i class="fa-solid fa-arrow-up-from-ground-water"></i>
        </div>
        <h3>Eosle Commodi</h3>
        <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut
            nesciunt dolorem.</p>
        <a href="service-details.html" class="readmore stretched-link">Learn more <i
            class="bi bi-arrow-right"></i></a>
        </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
        <div class="icon">
            <i class="fa-solid fa-compass-drafting"></i>
        </div>
        <h3>Ledo Markt</h3>
        <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci
            eos earum corrupti.</p>
        <a href="service-details.html" class="readmore stretched-link">Learn more <i
            class="bi bi-arrow-right"></i></a>
        </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
        <div class="icon">
            <i class="fa-solid fa-trowel-bricks"></i>
        </div>
        <h3>Asperiores Commodit</h3>
        <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident
            adipisci neque.</p>
        <a href="service-details.html" class="readmore stretched-link">Learn more <i
            class="bi bi-arrow-right"></i></a>
        </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item position-relative">
        <div class="icon">
            <i class="fa-solid fa-helmet-safety"></i>
        </div>
        <h3>Velit Doloremque</h3>
        <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem
            alias eius labore.</p>
        <a href="service-details.html" class="readmore stretched-link">Learn more <i
            class="bi bi-arrow-right"></i></a>
        </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-item position-relative">
        <div class="icon">
            <i class="fa-solid fa-arrow-up-from-ground-water"></i>
        </div>
        <h3>Dolori Architecto</h3>
        <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti
            recusandae ducimus enim.</p>
        <a href="service-details.html" class="readmore stretched-link">Learn more <i
            class="bi bi-arrow-right"></i></a>
        </div>
    </div><!-- End Service Item -->

    </div>

</div>
</section><!-- End Services Section -->

<!-- ======= Alt Services Section ======= -->
<section id="alt-services" class="alt-services">
<div class="container" data-aos="fade-up">

    <div class="row justify-content-around gy-4">
    <div class="col-lg-6 img-bg" style="background-image: url({{asset('templateLand/assets/img/alt-services.jpg')}});" data-aos="zoom-in"
        data-aos-delay="100"></div>

    <div class="col-lg-5 d-flex flex-column justify-content-center">
        <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
        <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus
        laudantium. Soluta voluptate sed facere corporis dolores excepturi</p>

        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
        <i class="bi bi-easel flex-shrink-0"></i>
        <div>
            <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate
            non provident</p>
        </div>
        </div><!-- End Icon Box -->

        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
        <i class="bi bi-patch-check flex-shrink-0"></i>
        <div>
            <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
            deleniti atque</p>
        </div>
        </div><!-- End Icon Box -->

        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
        <i class="bi bi-brightness-high flex-shrink-0"></i>
        <div>
            <h4><a href="" class="stretched-link">Dine Pad</a></h4>
            <p>Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus
            aut eligendi omnis</p>
        </div>
        </div><!-- End Icon Box -->

        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
        <i class="bi bi-brightness-high flex-shrink-0"></i>
        <div>
            <h4><a href="" class="stretched-link">Tride clov</a></h4>
            <p>Est voluptatem labore deleniti quis a delectus et. Saepe dolorem libero sit non aspernatur odit amet.
            Et eligendi</p>
        </div>
        </div><!-- End Icon Box -->

    </div>
    </div>

</div>
</section><!-- End Alt Services Section -->

<!-- ======= Features Section ======= -->
<section id="features" class="features section-bg">
<div class="container" data-aos="fade-up">

    <ul class="nav nav-tabs row  g-2 d-flex">

    <li class="nav-item col-3">
        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
        <h4>Modisit</h4>
        </a>
    </li><!-- End tab nav item -->

    <li class="nav-item col-3">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
        <h4>Praesenti</h4>
        </a><!-- End tab nav item -->

    <li class="nav-item col-3">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
        <h4>Explica</h4>
        </a>
    </li><!-- End tab nav item -->

    <li class="nav-item col-3">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
        <h4>Nostrum</h4>
        </a>
    </li><!-- End tab nav item -->

    </ul>

    <div class="tab-content">

    <div class="tab-pane active show" id="tab-1">
        <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
            data-aos="fade-up" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident</h3>
            <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua.
            </p>
            <ul>
            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                pariatur.</li>
            </ul>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/features-1.jpg" alt="" class="img-fluid">
        </div>
        </div>
    </div><!-- End tab content item -->

    <div class="tab-pane" id="tab-2">
        <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
            <h3>Neque exercitationem debitis</h3>
            <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua.
            </p>
            <ul>
            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            <li><i class="bi bi-check2-all"></i> Provident mollitia neque rerum asperiores dolores quos qui a.
                Ipsum neque dolor voluptate nisi sed.</li>
            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                pariatur.</li>
            </ul>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{ asset('templateLand/assets/img/features-2.jpg') }}" alt="" class="img-fluid">
        </div>
        </div>
    </div><!-- End tab content item -->

    <div class="tab-pane" id="tab-3">
        <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
            <h3>Voluptatibus commodi accusamu</h3>
            <ul>
            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            <li><i class="bi bi-check2-all"></i> Provident mollitia neque rerum asperiores dolores quos qui a.
                Ipsum neque dolor voluptate nisi sed.</li>
            </ul>
            <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua.
            </p>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{ asset('templateLand/assets/img/features-3.jpg') }}" alt="" class="img-fluid">
        </div>
        </div>
    </div><!-- End tab content item -->

    <div class="tab-pane" id="tab-4">
        <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
            <h3>Omnis fugiat ea explicabo sunt</h3>
            <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua.
            </p>
            <ul>
            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                pariatur.</li>
            </ul>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{ asset('templateLand/assets/img/features-4.jpg') }}" alt="" class="img-fluid">
        </div>
        </div>
    </div><!-- End tab content item -->

    </div>

</div>
</section><!-- End Features Section -->

<!-- ======= Our Projects Section ======= -->
<section id="projects" class="projects">
    <div class="container" data-aos="fade-up">
    
        <div class="section-header">
        <h2>Our Projects</h2>
        </div>
    
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
        data-portfolio-sort="original-order">
    
        <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-remodeling">Road & Bridge</li>
            <li data-filter=".filter-construction">Water Resources</li>
            <li data-filter=".filter-repairs">Dredging & Land Clearing</li>
        </ul><!-- End Projects Filters -->
    
        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
    
            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
            <div class="portfolio-content h-100">
                <img src="{{asset('image/Sumbu_Timur.JPG')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                <h4>Sumbu Timur</h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
                <a href="{{asset('image/Sumbu_Timur.JPG')}}" title="Proyek Sumbu Timur"
                    data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                    class="bi bi-zoom-in"></i></a>
                <a href="project-details.html" title="More Details" class="details-link"><i
                    class="bi bi-link-45deg"></i></a>
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                <div class="portfolio-content h-100">
                    <img src="{{asset('image/Duplikasi Jembatan Kapuas I MYC.JPG')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>Duplikasi Jembatan Kapuas I MYC</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                    <a href="{{asset('image/Duplikasi Jembatan Kapuas I MYC.JPG')}}" title="Proyek Duplikasi Jembatan Kapuas I MYC"
                        data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                        class="bi bi-zoom-in"></i></a>
                    <a href="project-details.html" title="More Details" class="details-link"><i
                        class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
                </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                <div class="portfolio-content h-100">
                    <img src="{{asset('image/Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II.JPG')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                    <a href="{{asset('image/Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II.JPG')}}" title="Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II"
                        data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                        class="bi bi-zoom-in"></i></a>
                    <a href="project-details.html" title="More Details" class="details-link"><i
                        class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                    <div class="portfolio-content h-100">
                        <img src="{{asset('image/Akses Tol Makassar New Port.jpeg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                        <h4>Akses Tol Makassar New Port</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="{{asset('image/Akses Tol Makassar New Port.jpeg')}}" title="Akses Tol Makassar New Port"
                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                            class="bi bi-zoom-in"></i></a>
                        <a href="project-details.html" title="More Details" class="details-link"><i
                            class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                        <div class="portfolio-content h-100">
                            <img src="{{asset('image/Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing).JPG')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                            <h4>Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing)</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{asset('image/Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing).JPG')}}" title="Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing)"
                                data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                class="bi bi-zoom-in"></i></a>
                            <a href="project-details.html" title="More Details" class="details-link"><i
                                class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                            <div class="portfolio-content h-100">
                                <img src="{{asset('image/Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung.JPG')}}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                <h4>Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{asset('image/Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung.JPG')}}" title="Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung"
                                    data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                                <a href="project-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                <div class="portfolio-content h-100">
                                    <img src="{{asset('image/Underpass Tatakan 101.jpg')}}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                    <h4>Underpass Tatakan 101</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{asset('image/Underpass Tatakan 101.jpg')}}" title="Underpass Tatakan 101"
                                        data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                    <a href="project-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                    <div class="portfolio-content h-100">
                                        <img src="{{asset('image/Mandalika Urban Tourism Infrastructure Project Package 1.JPG')}}" class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                        <h4>Mandalika Urban Tourism Infrastructure Project Package 1</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                                        <a href="{{asset('image/Mandalika Urban Tourism Infrastructure Project Package 1.JPG')}}" title="Mandalika Urban Tourism Infrastructure Project Package 1"
                                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                        <a href="project-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                        <div class="portfolio-content h-100">
                                            <img src="{{asset('image/Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja.JPG')}}" class="img-fluid" alt="">
                                            <div class="portfolio-info">
                                            <h4>Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja</h4>
                                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            <a href="{{asset('image/SRekonstruksi Jalan Kalawara-Kulawi dan Sirenja.JPG')}}" title="Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja"
                                                data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                            <a href="project-details.html" title="More Details" class="details-link"><i
                                                class="bi bi-link-45deg"></i></a>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                            <div class="portfolio-content h-100">
                                                <img src="{{asset('image/SPRD (KPC).JPG')}}" class="img-fluid" alt="">
                                                <div class="portfolio-info">
                                                <h4>SPRD (KPC)</h4>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                                <a href="{{asset('image/SPRD (KPC).JPG')}}" title="SPRD (KPC)"
                                                    data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                                    class="bi bi-zoom-in"></i></a>
                                                <a href="project-details.html" title="More Details" class="details-link"><i
                                                    class="bi bi-link-45deg"></i></a>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                                <div class="portfolio-content h-100">
                                                    <img src="{{asset('image/MWRD (KPC).jpeg')}}" class="img-fluid" alt="">
                                                    <div class="portfolio-info">
                                                    <h4>MWRD (KPC)</h4>
                                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                                    <a href="{{asset('image/MWRD (KPC).jpeg')}}" title="MWRD (KPC)"
                                                        data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                                        class="bi bi-zoom-in"></i></a>
                                                    <a href="project-details.html" title="More Details" class="details-link"><i
                                                        class="bi bi-link-45deg"></i></a>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                                    <div class="portfolio-content h-100">
                                                        <img src="{{asset('image/Bandar Udara Banggai.jpg')}}" class="img-fluid" alt="">
                                                        <div class="portfolio-info">
                                                        <h4>Bandar Udara Banggai</h4>
                                                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                                                        <a href="{{asset('image/Bandar Udara Banggai.jpg')}}" title="Bandar Udara Banggai"
                                                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                                            class="bi bi-zoom-in"></i></a>
                                                        <a href="project-details.html" title="More Details" class="details-link"><i
                                                            class="bi bi-link-45deg"></i></a>
                                                        </div>
                                                    </div>
                                                    </div>
                                    <!-- End Projects Item -->
    
            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
            <div class="portfolio-content h-100">
                <img src="{{asset('image/Bendungan Manikin.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                <h4>Bendungan Manikin</h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
                <a href="{{asset('image/Bendungan Manikin.jpg')}}" title="Bendungan Manikin"
                    data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                    class="bi bi-zoom-in"></i></a>
                <a href="project-details.html" title="More Details" class="details-link"><i
                    class="bi bi-link-45deg"></i></a>
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                <div class="portfolio-content h-100">
                    <img src="{{asset('image/Bendungan Pamukkulu.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>Bendungan Pamukkulu</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                    <a href="{{asset('image/Bendungan Pamukkulu.jpg')}}" title="Bendungan Pamukkulu"
                        data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                        class="bi bi-zoom-in"></i></a>
                    <a href="project-details.html" title="More Details" class="details-link"><i
                        class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                    <div class="portfolio-content h-100">
                        <img src="{{asset('image/Bendungan Jenelata.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                        <h4>Bendungan Jenelata</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="{{asset('image/Bendungan Jenelata.jpg')}}" title="Bendungan Manikin"
                            data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                            class="bi bi-zoom-in"></i></a>
                        <a href="project-details.html" title="More Details" class="details-link"><i
                            class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                        <div class="portfolio-content h-100">
                            <img src="{{asset('image/Irigasi Gumbasa.jpeg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                            <h4>Irigasi Gumbasa</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{asset('image/Irigasi Gumbasa.jpg')}}" title="Irigasi Gumbasa"
                                data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                                class="bi bi-zoom-in"></i></a>
                            <a href="project-details.html" title="More Details" class="details-link"><i
                                class="bi bi-link-45deg"></i></a>
                            </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                        <div class="portfolio-content h-100">
                            <img src="{{asset('image/Bendungan Ameroro.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                            <h4>Bendungan Ameroro</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{asset('image/Bendungan Ameroro.jpg')}}" title="Bendungan Ameroro"
                                data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                                class="bi bi-zoom-in"></i></a>
                            <a href="project-details.html" title="More Details" class="details-link"><i
                                class="bi bi-link-45deg"></i></a>
                            </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                        <div class="portfolio-content h-100">
                            <img src="{{asset('image/Wani Port.jpeg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                            <h4>Wani Port</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{asset('image/Wani Port.jpg')}}" title="Wani Port"
                                data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                                class="bi bi-zoom-in"></i></a>
                            <a href="project-details.html" title="More Details" class="details-link"><i
                                class="bi bi-link-45deg"></i></a>
                            </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                        <div class="portfolio-content h-100">
                            <img src="{{asset('image/Donggala Port.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                            <h4>Donggala Port</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{asset('image/Donggala Port.jpg')}}" title="Donggala Port"
                                data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                                class="bi bi-zoom-in"></i></a>
                            <a href="project-details.html" title="More Details" class="details-link"><i
                                class="bi bi-link-45deg"></i></a>
                            </div>
                     </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
                        <div class="portfolio-content h-100">
                            <img src="{{asset('image/Bendungan Manikin.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                            <h4>Bendungan Manikin</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{asset('image/Bendungan Manikin.jpg')}}" title="Bendungan Manikin"
                                data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i
                                class="bi bi-zoom-in"></i></a>
                            <a href="project-details.html" title="More Details" class="details-link"><i
                                class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                        </div>   <!-- End Projects Item -->
    
            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
            <div class="portfolio-content h-100">
                <img src="{{asset('image/D&B Pengerukan Pelabuhan Benoa Paket A.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                <h4>D&B Pengerukan Pelabuhan Benoa Paket A</h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
                <a href="{{asset('image/D&B Pengerukan Pelabuhan Benoa Paket A.jpg')}}" title="D&B Pengerukan Pelabuhan Benoa Paket A" data-gallery="portfolio-gallery-repairs"
                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="project-details.html" title="More Details" class="details-link"><i
                    class="bi bi-link-45deg"></i></a>
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
                <div class="portfolio-content h-100">
                    <img src="{{asset('image/Dredging Pendalaman Alur Tursina Area III & IV.JPG')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>Dredging Pendalaman Alur Tursina Area III & IV</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                    <a href="{{asset('image/Dredging Pendalaman Alur Tursina Area III & IV.jpg')}}" title="Dredging Pendalaman Alur Tursina Area III & IV" data-gallery="portfolio-gallery-repairs"
                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="project-details.html" title="More Details" class="details-link"><i
                        class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
                <div class="portfolio-content h-100">
                    <img src="{{asset('image/Penyiapan Lahan Industri PKT Bontang.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>Penyiapan Lahan Industri PKT Bontang</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                    <a href="{{asset('image/Penyiapan Lahan Industri PKT Bontang.jpg')}}" title="Penyiapan Lahan Industri PKT Bontang" data-gallery="portfolio-gallery-repairs"
                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="project-details.html" title="More Details" class="details-link"><i
                        class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
                <div class="portfolio-content h-100">
                    <img src="{{asset('image/Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom.jpg')}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                    <h4>Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                    <a href="{{asset('image/Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom.jpg')}}" title="Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom" data-gallery="portfolio-gallery-repairs"
                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="project-details.html" title="More Details" class="details-link"><i
                        class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div>
            <!-- End Projects Item -->
    
        </div><!-- End Projects Container -->
    
        </div>
    
    </div>
    </section><!-- End Our Projects Section -->
    <!-- End Our Projects Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">
    
        <div class="section-header">
        <h2>Events</h2>
    
        </div>
    
        <div class="slides-2 swiper">
        <div class="swiper-wrapper">
    
            <div class="swiper-slide">
            <div class="testimonial-wrap">
                <img src="{{ asset('image/events/1.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div><!-- End testimonial item -->
    
            <div class="swiper-slide">
            <div class="testimonial-wrap">
                <img src="{{ asset('image/events/2.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div><!-- End testimonial item -->
    
            <div class="swiper-slide">
            <div class="testimonial-wrap">
                <img src="{{ asset('image/events/3.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div><!-- End testimonial item -->
    
            <div class="swiper-slide">
            <div class="testimonial-wrap">
    
                <img src="{{ asset('image/events/5.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div>
            
            <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <img src="{{ asset('image/events/6.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div>
            
            <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <img src="{{ asset('image/events/7.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div>
            
            <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <img src="{{ asset('image/events/8.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div>
            
            <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <img src="{{ asset('image/events/9.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div>
            
            <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <img src="{{ asset('image/events/10.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div>
            
            <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <img src="{{ asset('image/events/11.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div>
            
            <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <img src="{{ asset('image/events/12.jpg') }}" class="testimonial-img" alt="">
            </div>
            </div><!-- End testimonial item --><!-- End testimonial item --><!-- End testimonial item --><!-- End testimonial item --><!-- End testimonial item --><!-- End testimonial item --><!-- End testimonial item --><!-- End testimonial item -->
    
        </div>
        <div class="swiper-pagination"></div>
        </div>
    
    </div>
    </section><!-- End Testimonials Section -->

<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up">
        <div class=" section-header">
        <h2>InfraNews</h2>
    </div>
    
    <div class="row gy-5">
    
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="post-item position-relative h-100">
    
            <div class="post-img position-relative overflow-hidden">
            <img src="{{asset('image/p22.png')}}" class="img-fluid" alt="">
            <span class="post-date">November, 22</span>
            </div>
    
            <div class="post-content d-flex flex-column">
    
            <h3 class="post-title">Program IDEA Infra 2 mencapai 50 lebih bantuan teknis
            </h3>
    
            <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Tim Digitalisasi</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">News</span>
                </div>
            </div>
    
            <hr>
    
            <a href="/blogDetail" class="readmore stretched-link"><span>Read More</span><i
                class="bi bi-arrow-right"></i></a>
    
            </div>
    
        </div>
        </div><!-- End post item -->
    
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="post-item position-relative h-100">
    
            <div class="post-img position-relative overflow-hidden">
            <img src="{{asset('image/idea.jpeg')}}" class="img-fluid" alt="">
            <span class="post-date">November, 22</span>
            </div>
    
            <div class="post-content d-flex flex-column">
    
            <h3 class="post-title">Ini Rahasianya 11 Proyek INFRA 2 lulus Sertifikasi BIM 
            </h3>
    
            <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Tim Digitalisasi</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">News</span>
                </div>
            </div>
    
            <hr>
    
            <a href="/blogDetail" class="readmore stretched-link"><span>Read More</span><i
                class="bi bi-arrow-right"></i></a>
    
            </div>
    
        </div>
        </div><!-- End post item -->
    
        <div class="col-xl-4 col-md-6">
        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="300">
    
            <div class="post-img position-relative overflow-hidden">
            <img src="{{asset('image/workshop.JPG')}}" class="img-fluid" alt="">
            <span class="post-date">November, 22</span>
            </div>
    
            <div class="post-content d-flex flex-column">
    
            <h3 class="post-title">Engineering INFRA 2 Workshop Implementasi BIM
            </h3>
    
            <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Tim Digitalisasi</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">News</span>
                </div>
            </div>
    
            <hr>
    
            <a href="/blogDetail" class="readmore stretched-link"><span>Read More</span><i
                class="bi bi-arrow-right"></i></a>
    
            </div>
    
        </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="300">
        
                <div class="post-img position-relative overflow-hidden">
                <img src="{{asset('image/workshop.JPG')}}" class="img-fluid" alt="">
                <span class="post-date">November, 22</span>
                </div>
        
                <div class="post-content d-flex flex-column">
        
                <h3 class="post-title">Engineering INFRA 2 Workshop Implementasi BIM
                </h3>
        
                <div class="meta d-flex align-items-center">
                    <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2">Tim Digitalisasi</span>
                    </div>
                    <span class="px-3 text-black-50">/</span>
                    <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2">News</span>
                    </div>
                </div>
        
                <hr>
        
                <a href="/blogDetail" class="readmore stretched-link"><span>Read More</span><i
                    class="bi bi-arrow-right"></i></a>
        
                </div>
        
            </div>
            </div><!-- End post item -->
    
    </div>
    </section>
    <section id="get-started" class="get-started section-bg">
        <div class="container">
        
            <div class="row justify-content-between gy-4">
        
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="p-5 h-100 rounded contact-map">
                        <iframe class="rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31729.30724681034!2d106.87659100000002!3d-6.242184!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3232a5eb1b5%3A0x3e5f3684ce6774b5!2sPT%20Wijaya%20Karya%20(Persero)%20Tbk!5e0!3m2!1sen!2sid!4v1697981290361!5m2!1sen!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
        
            <div class="col-lg-5" data-aos="fade">
                <form action="forms/quote.php" method="post" class="php-email-form">
                <h3>Get a quote</h3>
                <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus enim linead sero
                    park flows.</p>
                <div class="row gy-3">
        
                    <div class="col-md-12">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
        
                    <div class="col-md-12 ">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
        
                    <div class="col-md-12">
                    <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                    </div>
        
                    <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                    </div>
        
                    <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>
        
                    <button type="submit">Get a quote</button>
                    </div>
        
                </div>
                </form>
            </div><!-- End Quote Form -->
        
            </div>
        
        </div>
    </div>
        </section><!-- End Get Started Section -->
        
    <!-- End Recent Blog Posts Section -->
@endsection
