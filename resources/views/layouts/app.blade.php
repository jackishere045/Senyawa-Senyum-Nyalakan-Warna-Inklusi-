<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title', 'Senyawa')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <style>
    nav {
      text-align: center;
    }
    nav ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    nav ul li {
      display: inline;
    }

    nav ul li button {
      padding: 10px 15px;
      margin-right: 10px;
    }
  </style>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
  <!-- Header -->
  <header id="header" class="fixed-top" style="background-color: #FFBF78;">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="/">Senyawa</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Beranda</a></li>
          <li><a href="/lowongan">Lowongan</a></li>
          <li><a href="/sekolah">Sekolah</a></li>
          <li><a href="/event">Event</a></li>
          <li><a href="/pameran">Pameran Karya</a></li>
          <!-- Tambahan dropdown Ajukan -->
          <li class="dropdown">
            <a href="#"><span>Ajukan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="https://bit.ly/lowongansenyawa" target="_blank">Ajukan Lowongan</a></li>
              <li><a href="https://bit.ly/eventsenyawa" target="_blank">Ajukan Event</a></li>
              <li><a href="https://bit.ly/pameran" target="_blank">Ajukan Pameran</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- Main Content -->
  <main style="padding-top: 100px;">
    @yield('content')
  </main>
  <!-- End Main Content -->

  <!-- Footer -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <!-- Contact -->
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Senyawa</h3>
            <p>
              Yogyakarta State University <br>
              Yogyakarta, Indonesia<br>
              Sleman <br><br>
              <strong>Phone:</strong> +62 877 2224 1540<br>
              <strong>Email:</strong> Senyawa@uny.ac.id<br>
            </p>
          </div>

          <!-- Useful Links -->
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/lowongan') }}">Cari Pekerjaan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/sekolah') }}">Cari Sekolah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/event') }}">Cari Event</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/pameran') }}">Pameran Karya</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Other Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ajukan Lowongan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ajukan Event</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ajukan Pameran Karya</a></li>
            </ul>
          </div>

          <!-- Social -->
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Kunjungi dan ikuti kami di media sosial kami seperti Facebook, Twitter, Instagram, dan YouTube kami.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Senyawa</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://jackdev-portofolio.netlify.app/" style="color:aliceblue">JackDev</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
