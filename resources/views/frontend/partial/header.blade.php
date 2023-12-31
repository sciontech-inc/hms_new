<!-- ? Preloader Start -->
<div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="frontend/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="/home"><img src="frontend/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/home">Home</a></li>
                                        <li><a href="/about">About</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                        @if (Auth::check())
                                        <li><a href="/set_appointment">Appointment</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            @if (Auth::check())
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="/dashboard" class="btn header-btn">Patient Dashboard</a>
                                </div>
                            @endif
                            @if (Auth::guest())
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="/hms" class="btn header-btn">Patient Login</a>
                                </div>
                            @endif
                           
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>