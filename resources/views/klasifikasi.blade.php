<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="author" content="Grayrids">
    <title>Prediksi Cyberbullying</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('slick/img/2.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('slick/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/css/LineIcons.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/css/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/css/responsive.css') }}">
    <style>
        body {
            color: black;
            background-color: #f0f2f5;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .section {
            background-color: #ffffff;
            padding: 60px 0;
        }
        .section-header {
            margin-bottom: 50px;
        }
        .card {
            margin-top: 20px;
            border: 1px solid #ddd;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }
        .back-to-top {
            background-color: #007bff;
        }
        /* Penambahan style untuk tabel */
        .table {
            background-color: #ffffff; /* Warna latar belakang tabel */
            color: #333; /* Warna teks pada tabel */
            border-collapse: collapse; /* Menggabungkan garis tabel */
            width: 100%; /* Lebar tabel */
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f1f1f1; /* Warna latar belakang header kolom */
            color: #333; /* Warna teks pada header kolom */
        }
    </style>
</head>

<body>
    <!-- Navbar Section Start -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ url('/') }}">Cyberbullying Prediction</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Hasil</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar Section End -->

    <!-- Contact Us Section -->
    <section id="contact" class="section">
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-text section-header text-center">  
                        <div>   
                            <h2 class="section-title">Hasil</h2>
                            <div class="desc-text">
                                <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                                    @if(isset($hasil) && isset($prediction))
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Hasil Pra-pemrosesan</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Langkah</th>
                                                            <th>Hasil</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Case Folding</td>
                                                            <td>{{ $hasil['case_folded'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tokenizing</td>
                                                            <td>{{ implode(' ', $hasil['tokenized']) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Stopword Removal</td>
                                                            <td>{{ implode(' ', $hasil['filtered']) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Stemming</td>
                                                            <td>{{ $hasil['stemmed'] }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Hasil Akhir Preprocessing</h3>
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $hasil['stemmed'] }}</p>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Prediksi Klasifikasi</h3>
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $prediction }}</p>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Akurasi</h3>
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $accuracy * 100 }}%</p> <!-- Display accuracy as a percentage -->
                                            </div>
                                        </div>

                                        <a href="{{ url('/home') }}" class="btn btn-primary mt-3">Kembali ke Halaman Utama</a>
                                    @endif
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </section>
    <!-- Contact Us Section End -->

    <!-- Footer Section Start -->
    <footer class="footer-area bg-dark text-light pt-5 pb-5">
        <div class="container text-center">
            <p>&copy; 2024 Prediksi Cyberbullying. All Rights Reserved.</p>
        </div>
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
    <script src="{{ asset('slick/js/jquery-min.js') }}"></script>
    <script src="{{ asset('slick/js/popper.min.js') }}"></script>
    <script src="{{ asset('slick/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('slick/js/owl.carousel.js') }}"></script>      
    <script src="{{ asset('slick/js/jquery.nav.js') }}"></script>    
    <script src="{{ asset('slick/js/scrolling-nav.js') }}"></script>    
    <script src="{{ asset('slick/js/jquery.easing.min.js') }}"></script>     
    <script src="{{ asset('slick/js/nivo-lightbox.js') }}"></script>     
    <script src="{{ asset('slick/js/jquery.magnific-popup.min.js') }}"></script>     
    <script src="{{ asset('slick/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('slick/js/contact-form-script.js') }}"></script>   
    <script src="{{ asset('slick/js/main.js') }}"></script>
</body>
</html>
