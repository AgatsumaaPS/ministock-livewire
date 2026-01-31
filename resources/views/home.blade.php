
    @php
  $asset = asset('landing/assets');
@endphp

<!DOCTYPE html>
<html class="no-js" lang="">

  <head>    
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>MiniStock - Stock Management System</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
<link rel="stylesheet" href="{{ asset('landing/assets/css/bootstrap-5.0.0-alpha-2.min.css') }}">
<link rel="stylesheet" href="{{ asset('landing/assets/css/LineIcons.2.0.css') }}">
<link rel="stylesheet" href="{{ asset('landing/assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('landing/assets/css/lindy-uikit.css') }}">

  </head>
  <body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- ========================= preloader start ========================= -->
    <!-- <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- ========================= preloader end ========================= -->

    <!-- ========================= hero-section-wrapper-2 start ========================= -->
    <section id="home" class="hero-section-wrapper-2">

      <!-- ========================= header-2 start ========================= -->
      <header class="header header-2">
        <div class="navbar-area">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
             <a class="navbar-brand fw-bold text-primary"></a>jangan kebanyakan nanya pls</a>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent2">
                    <ul id="nav2" class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="page-scroll active" href="#home">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#services">Services</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#about">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#pricing">Pricing</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="#contact">Contact</a>
                      </li>
                    </ul>
                   <a href="{{ route('login') }}" class="button button-sm radius-10 d-none d-lg-flex">Login</a>
                   
                   <a href="{{ route('register') }}" class="button button-sm radius-10 d-none d-lg-flex">Register</a>
                  </div>
                  <!-- navbar collapse -->
                </nav>
                <!-- navbar -->
              </div>
            </div>
            <!-- row -->
          </div>
          <!-- container -->
        </div>
        <!-- navbar area -->
      </header>
      <!-- ========================= header-2 end ========================= -->

      <!-- ========================= hero-2 start ========================= -->
      <div class="hero-section hero-style-2">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-6">
              <div class="hero-content-wrapper">
                <h4 class="wow fadeInUp" data-wow-delay=".2s">XII-PPLG</h4>
                <h2 class="mb-30 wow fadeInUp" data-wow-delay=".4s">MiniStock</h2>
                <p class="mb-50 wow fadeInUp" data-wow-delay=".6s">Application service to help you manage your stock inventory efficiently.</p>
                <div class="buttons">
                 <a href="{{ route('dashboard') }}"
   class="button button-lg radius-10 wow fadeInUp"
 data-wow-delay=".7s">Masuk ke Dashboard</a>

                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="hero-image">
                    <img src="{{ $asset }}/img/hero/hero-2/hero-img.svg" alt="" class="wow fadeInRight" data-wow-delay=".2s">
                    <img src="{{ $asset }}/img/hero/hero-2/paattern.svg" alt="" class="shape shape-1">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ========================= hero-2 end ========================= -->

    </section>
    <!-- ========================= hero-section-wrapper-2 end ========================= -->

    <!-- ========================= feature style-2 start ========================= -->
    <section id="services" class="feature-section feature-style-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-xl-7 col-lg-10 col-md-9">
                <div class="section-title mb-60">
                  <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Manage gets easier!</h3>
                  <p class="wow fadeInUp" data-wow-delay=".4s">Stop wasting time by managing your stock, and warehouse manually all by yourself. We got you!</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                  <div class="icon">
                    <i class="lni lni-vector"></i>
                  </div>
                  <div class="content">
                    <h5 class="mb-25">Automated Management</h5>
                    <p>Add,Edit and Delete stock data with it's description and image.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                  <div class="icon">
                    <i class="lni lni-layers"></i>
                  </div>
                  <div class="content">
                    <h5 class="mb-25">Stock Monitoring</h5>
                    <p>Monitor your stock levels in real-time with our intuitive dashboard.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                  <div class="icon">
                    <i class="lni lni-layout"></i>
                  </div>
                  <div class="content">
                    <h5 class="mb-25">Items Locations</h5>
                    <p>Track and manage the physical locations of your inventory items.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                  <div class="icon">
                    <i class="lni lni-display"></i>
                  </div>
                  <div class="content">
                    <h5 class="mb-25">Admin Access</h5>
                    <p>Grant administrative privileges to authorized users for full system control.</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="feature-img wow fadeInLeft" data-wow-delay=".2s">
        <img src="{{ $asset }}/img/hero/hero-2/hero-img.svg">

      </div>
    </section>
		<!-- ========================= feature style-2 end ========================= -->

    
		<!-- ========================= team style-1 start ========================= -->
		<section id="team" class="team-section team-style-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
            <div class="section-title text-center mb-60">
              <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Our Team</h3>
              <p class="wow fadeInUp" data-wow-delay=".4s">Teams that developed MiniStock</p>
            </div>
          </div>
        </div>
        
        <div class="row justify-content-center">
          <div class="col-xl-3 col-md-6 col-sm-10">
            <div class="single-team wow fadeInUp" data-wow-delay=".2s">
              <div class="image">
                <img src="{{ $asset }}/img/team/team-1/team-1.png" alt="">
              </div>
              <div class="info">
                <h6>Yogie Adam Pratama</h6>
                <p>Helper</p>
                <ul class="socials">
                  <li>
                    <a href="#0"> <i class="lni lni-facebook-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-twitter-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-instagram-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-linkedin-original"></i> </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 col-sm-10">
            <div class="single-team wow fadeInUp" data-wow-delay=".4s">
              <div class="image">
                <img src="{{ $asset }}/img/team/team-1/team-2.png" alt="">
              </div>
              <div class="info">
                <h6>Javiare Samuel Samona T.</h6>
                <p>Lead Programmer and Designer</p>
                <ul class="socials">
                  <li>
                    <a href="#0"> <i class="lni lni-facebook-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-twitter-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-instagram-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-linkedin-original"></i> </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 col-sm-10">
            <div class="single-team wow fadeInUp" data-wow-delay=".6s">
              <div class="image">
                <img src="{{ $asset }}/img/team/team-1/team-3.png" alt="">
              </div>
              <div class="info">
                <h6>Muhammad Bhakti A.</h6>
                <p>Brand Designer</p>
                <ul class="socials">
                  <li>
                    <a href="#0"> <i class="lni lni-facebook-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-twitter-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-instagram-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-linkedin-original"></i> </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 col-sm-10">
            <div class="single-team wow fadeInUp" data-wow-delay=".8s">
              <div class="image">
                <img src="{{ $asset }}/img/team/team-1/team-4.png" alt="">
              </div>
              <div class="info">
                <h6>Aisyah Septhia P.R </h6>
                <p>Frontend Developer</p>
                <ul class="socials">
                  <li>
                    <a href="#0"> <i class="lni lni-facebook-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-twitter-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-instagram-filled"></i> </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-linkedin-original"></i> </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- ========================= team style-1 end ========================= -->


    <!-- ========================= contact style-6 start ========================= -->
    <section id="contact" class="contact-section contact-style-6">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="contact-form-wrapper">
            <form action="#" method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="single-input">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="name" class="form-input" placeholder="Name">
                      <i class="lni lni-user"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-input" placeholder="Email">
                      <i class="lni lni-envelope"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <label for="number">Number</label>
                      <input type="text" id="number" name="number" class="form-input" placeholder="Number">
                      <i class="lni lni-phone"></i>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="single-input">
                      <label for="subject">Subject</label>
                      <input type="text" id="subject" name="subject" class="form-input" placeholder="Subject">
                      <i class="lni lni-text-format"></i>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="single-input">
                      <label for="message">Message</label>
                      <textarea name="message" id="message" class="form-input" placeholder="Message" rows="6"></textarea>
                      <i class="lni lni-comments-alt"></i>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-button">
                      <button type="submit" class="button radius-10">Submit <i class="lni lni-telegram-original"></i> </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>

          <div class="col-lg-5 order-first order-lg-last">
            <div class="left-wrapper">
              <div class="section-title mb-40">
                <h3 class="mb-15">Get in touch</h3>
                <p>Stop wasting your time managing your warehouse manually. We got you!</p>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-6">
                  <div class="single-item">
                    <div class="icon">
                      <i class="lni lni-phone"></i>
                    </div>
                    <div class="text">
                      <p>085977856783</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-md-6">
                  <div class="single-item">
                    <div class="icon">
                      <i class="lni lni-envelope"></i>
                    </div>
                    <div class="text">
                      <p>ministockmanagement@gmail.com</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-md-6">
                  <div class="single-item">
                    <div class="icon">
                      <i class="lni lni-map-marker"></i>
                    </div>
                    <div class="text">
                      <p>Kampung Baru Ujung</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================= contact style-6 end ========================= -->

  </body>
</html>