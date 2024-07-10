<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Prediksi Cyberbullying</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('slick') }}/img/2.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('slick') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('slick') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('slick') }}/css/LineIcons.css">
    <link rel="stylesheet" href="{{ asset('slick') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('slick') }}/css/owl.theme.css">
    <link rel="stylesheet" href="{{ asset('slick') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('slick') }}/css/nivo-lightbox.css">
    <link rel="stylesheet" href="{{ asset('slick') }}/css/main.css">    
    <link rel="stylesheet" href="{{ asset('slick') }}/css/responsive.css">

  </head>
  
  <body>

    <!-- Header Section Start -->
    <header id="home" class="hero-area">    
      <div class="overlay">
        <span></span>
        <span></span>
      </div>
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
          <a href="index.html" class="navbar-brand"><img src="img/logo.png" alt=""></a>       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact">Pendeteksi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">About</a>
              </li>  
            </ul>
          </div>
        </div>
      </nav>  
      <div class="container">      
        <div class="row space-100">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="contents">
              <h2 class="head-title">Lawan Cyberbullying Bersama Kami </h2>
              <p>Cyberbullying merupakan isu yang kian meresahkan, meninggalkan dampak jangka panjang bagi para korbannya. Alat deteksi cyberbullying kami hadir untuk membantu Anda mengidentifikasi dan menanganinya dengan cepat dan efektif.</p> 
                <div class="header-button">
                <a href="{{ route('admin.login') }}" class="btn btn-border-filled">Admin Login</a>
            </div>

            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 p-0">
            <div class="intro-img">
              <img src="{{ asset('slick') }}/img/intro.png" alt="">
            </div>            
          </div>
        </div> 
      </div>             
    </header>
    <!-- Header Section End --> 

    <!-- Contact Us Section -->
    <section id="contact" class="section">
      <!-- Container Starts -->
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="contact-text section-header text-center">  
              <div>   
                <h2 class="section-title">Pendeteksi</h2>
                <div class="desc-text">
                  <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>  
                  <p>eiusmod tempor incididunt ut labore et dolore.</p> -->
                </div>
              </div> 
            </div>
          </div>

        </div>
          <div class="row">
        <!-- Start Col -->
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto"> <!-- Ubah col-lg-6 menjadi col-lg-8, tambahkan col-md-10 dan col-sm-12, serta mx-auto -->
            <form action="{{ route('klasifikasi.process') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="kata">Masukkan Teks:</label>
                <input type="text" class="form-control" id="kata" name="kata" required value="{{ old('kata', isset($input) ? $input : '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Proses</button>
            </form>
</div>

</div>

</div>

          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-1">
            
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-12">
            <div class="contact-img">
              <img src="img/contact/01.png" class="img-fluid" alt="">
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-1">
          </div>
          <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>
    </section>
    <!-- Contact Us Section End -->

    <!-- Services Section Start -->
    <section id="services" class="section">
      <div class="container">

        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-cog"></i>
              </div>
              <h4>Pembelajaran Mesin</h4>
              <p>Memanfaatkan algoritma pembelajaran mesin untuk memprediksia adanya cyberbullying.</p>
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-brush"></i>
              </div>
              <h4>Ramah Pengguna</h4>
              <p>Memfasilitasi interaksi dan pemahaman terhadap data cyberbullying.</p>
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-heart"></i>
              </div>
              <h4>Dukungan Sepenuh Hati</h4>
              <p>Berkomitmen untuk memberi dukungan bagi korban cyberbullying dan mengedukasi terkait cyberbullying.</p>
            </div>
          </div>
          <!-- End Col -->

        </div>
      </div>
    </section>
    <!-- Services Section End -->

    <!-- Business Plan Section Start -->
    <section id="business-plan">
      <div class="container">

        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
            <div class="business-item-img">
              <img src="{{ asset('slick') }}/img/contact/01.png" class="img-fluid" alt="">
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12 pl-4">
            <div class="business-item-info">
              <h3>Menggunakan Media Sosial dengan Bijak: Menghindari Cyberbullying</h3>
              <p> Media sosial adalah sarana yang kuat untuk terhubung, berbagi, dan berkomunikasi dengan orang lain di seluruh dunia. Namun, penting untuk menggunakan platform media sosial dengan bijak dan bertanggung jawab. Salah satu hal yang harus dihindari secara tegas adalah cyberbullying atau intimidasi secara online.</p>
            </div>
          </div>
          <!-- End Col -->

        </div>
      </div>
    </section>
    <!-- Business Plan Section End -->

    <!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <section id="footer-Content">
        <!-- Copyright Start  -->

        <div class="site-info text-center"> 
          <p>Crafted by <a href="http://uideck.com" rel="nofollow">Andini Fitriani</a></p>
        </div>

      <!-- Copyright End -->
      </section>
      <!-- Footer area End -->
      
    </footer>
    <!-- Footer Section End --> 

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-chevron-up"></i>
    </a> 

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="{{ asset('slick') }}/js/jquery-min.js"></script>
    <script src="{{ asset('slick') }}/js/popper.min.js"></script>
    <script src="{{ asset('slick') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('slick') }}/js/owl.carousel.js"></script>      
    <script src="{{ asset('slick') }}/js/jquery.nav.js"></script>    
    <script src="{{ asset('slick') }}/js/scrolling-nav.js"></script>    
    <script src="{{ asset('slick') }}/js/jquery.easing.min.js"></script>     
    <script src="{{ asset('slick') }}/js/nivo-lightbox.js"></script>     
    <script src="{{ asset('slick') }}/js/jquery.magnific-popup.min.js"></script>     
    <script src="{{ asset('slick') }}/js/form-validator.min.js"></script>
    <script src="{{ asset('slick') }}/js/contact-form-script.js"></script>   
    <script src="{{ asset('slick') }}/js/main.js"></script>
    
  </body>
</html>
