<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SILADU - DP3AP2KB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/bootstrap-site/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Reveal - v4.7.0
  * Template URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @include('site.partials.topbar')

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        <h1>
          <a href="/">SI<span>LADU</span></a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="/img/logo.png" alt=""></a>-->
      </div>

      @include('site.partials.navbar')

    </div>
  </header><!-- End Header -->

  <!-- ======= hero Section ======= -->
  <section id="hero">

    <div class="hero-content" data-aos="fade-up">
      <h2>Sistem Layanan <span>Pengaduan</span><br> Kekerasan Anak dan Perempuan</h2>
      <div>
        <a href="#" class="btn-get-started">Lapor Kekerasan Anak</a>
        <a href="#" class="btn-projects">Lapor Kekerasan Perempuan</a>
      </div>
    </div>

    <div class="hero-slider swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('/img/hero-carousel/1.jpg');"></div>
        <div class="swiper-slide" style="background-image: url('/img/hero-carousel/2.jpg');"></div>
        <div class="swiper-slide" style="background-image: url('/img/hero-carousel/3.jpg');"></div>
        <div class="swiper-slide" style="background-image: url('/img/hero-carousel/4.jpg');"></div>
        <div class="swiper-slide" style="background-image: url('/img/hero-carousel/5.jpg');"></div>
      </div>
    </div>

  </section><!-- End Hero Section -->


  <main id="main">
    @include('site.sections.about')

    @include('site.sections.track')

    @include('site.sections.flow')

    {{-- @include('site.sections.partner') --}}

    @include('site.sections.galeri')

    {{-- @include('site.sections.testimonials') --}}

    @include('site.sections.cta')

    @include('site.sections.contact')

  </main><!-- End #main -->

  @include('site.partials.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap-site/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

</body>

</html>