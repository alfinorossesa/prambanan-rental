<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Prambanan Rental</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('template-customer/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container-fluid px-5">
                <a class="navbar-brand fw-bold" href="{{ route('home') }}">PRAMBANAN RENTAL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('sewa-mobil.index') }}">Sewa Mobil</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('sewa-motor.index') }}">Sewa Motor</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('paket-wisata.index') }}">Paket Wisata</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('kontak-kami.index') }}">Kontak Kami</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('testimoni.index') }}">Testimoni</a></li>
                    </ul>
                    @auth
                        <div class="dropdown">
                            <img src="{{ auth()->user()->foto ? asset('storage/images/' . auth()->user()->foto) : asset('template-customer/assets/img/profile.png') }}" alt="" class="profile-picture-navbar">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->nama }}
                            </a>
                        
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('user.profile', auth()->user()->id) }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.pemesanan', auth()->user()->id) }}">Pemesanan</a></li>
                                <hr class="my-2">
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="btn btn-sm bg-darkblue-custom text-white rounded-pill" href="{{ route('register') }}">Register</a>
                        <a class="btn btn-sm bg-darkblue-custom text-white rounded-pill mx-2" href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            </div>
        </nav>

        @yield('content')

        <div class="bg-light py-4">
            <div class="container px-5">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('template-customer/assets/img/logo.png') }}" alt="..." style="height: 10rem" />
                    </div>
                    <div class="col-md-6">
                        <h4 class="lead fw-normal text-muted mb-2 mt-4">Prambanan Rental</h4>
                        <p class="fw-normal text-muted mb-0">Alamat : Jl. Sambiroto Gang Pucanganom 43 Yogyakarta</p>
                        <p class="fw-normal text-muted mb-0">No. Telp : (0274) 884372</p>
                        <p class="fw-normal text-muted mb-0">WhatsApp : 0897 4567 0000</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="bg-black text-center py-3">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div>Prambanan Rental 2022 &copy; All Rights Reserved.</div>
                </div>
            </div>
        </footer>
        <!-- Feedback Modal-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('template-customer/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
       
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        @stack('script')
    </body>
</html>
