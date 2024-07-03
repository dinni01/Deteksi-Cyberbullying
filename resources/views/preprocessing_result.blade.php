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
        <div class="container">      
            <div class="row space-100">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="contents">
                    <div class="col-lg-12">
                </div>

                </div>
            </div> 
        </div>             
    </header>

    <div class="container">
        <h2 class="mt-5">Preprocessing Result</h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Preprocessed Text</th>
                    <th>Label</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataset as $data)
                    <tr>
                        <td>{{ $data['text'] }}</td>
                        <td>{{ $data['label'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        <!-- Footer Area Start -->
        <section id="footer-Content">
            <!-- Copyright Start  -->
            <div class="copyright">
                <div class="container">
                    <!-- Star Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="site-info text-center">
                                <p>Crafted by <a href="http://uideck.com" rel="nofollow">UIdeck</a></p>
                            </div>              
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
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
