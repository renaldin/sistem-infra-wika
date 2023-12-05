@extends('layoutLanding.main')

@section('content')
<!-- ======= Get Started Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Blog Details</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Blog Details</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="{{asset('news/'.$detail->gambar)}}" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{$detail->judul}}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{$detail->nama_user}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="{{date('Y-m-d', strtotime($detail->tanggal))}}">{{date('d F Y', strtotime($detail->tanggal))}}</time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                
                <?= $detail->news; ?>

              </div><!-- End post content -->

            </article><!-- End blog post -->

          </div>

          <div class="col-lg-4">

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->
  @endsection