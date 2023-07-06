<!DOCTYPE html>
<html>
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="Site keywords here">
  <meta name="description" content="">
  <meta name='copyright' content=''>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>آموزش ها و درس ها</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Nice Select CSS -->
      <link rel="stylesheet" href="css/niceselect.css">
  <!-- Fancy Box CSS -->
      <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <!-- Fancy Box CSS -->
      <link rel="stylesheet" href="css/cube-portfolio.min.css">
  <!-- Owl Carousel CSS -->
      <link rel="stylesheet" href="css/owl.carousel.min.css">
  <!-- Animate CSS -->
      <link rel="stylesheet" href="css/animate.min.css">
  <!-- Slick Nav CSS -->
      <link rel="stylesheet" href="css/slicknav.min.css">
      <!-- Magnific Popup -->
  <link rel="stylesheet" href="css/magnific-popup.css">

  <!-- Eduland Stylesheet -->
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Eduland film -->
      <link rel="stylesheet" href="css/film.css">
  <!-- Eduland Colors -->
  <link rel="stylesheet" href="css/colors/color1.css">

</head>
<body>
  <!-- Header -->
  <header class="header">
  			<!-- Header Inner -->
  			<div class="header-inner overlay">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-3 col-md-3 col-12">
  							<!-- Logo -->
  							<div class="logo">
  								<a href="index.html"><img src="images/logo.png" alt="#"></a>
  							</div>
  							<!--/ End Logo -->
  							<div class="mobile-menu"></div>
  						</div>
  						<div class="col-lg-9 col-md-9 col-12">
  							<div class="menu-bar" >
  								<nav class="navbar navbar-default">
  									<div class="navbar-collapse">
  										<!-- Main Menu -->
  										<ul id="nav" class="nav menu navbar-nav">
  											<li><a href="contact.html"><i class="fa fa-address-book"></i>ارتباط با ما</a> </li>
  											<li><a href="events.html"><i class="fa fa-bullhorn"></i>مقالات</a></li>
  											<li><a href="#"><i class="fa fa-clone"></i>صفحه ها</a>
  												<ul class="dropdown">
  													<li><a href="teachers.html">استادان</a></li>
                                                      <li><a href="Social_learning.html">یادگیری اجتماعی</a></li>
                                                      <li><a href="Test.html">آزمون</a></li>
                                                      <li><a href="Progress_tracking.html">ردیابی پیشرفت</a></li>
  												</ul>
  											</li>
  											<li><a href="Learning.html"><i class="fa fa-clone"></i>یادگیری با روش های مختلف</a></li>
  											<li><a href="courses.html"><i class="fa fa-clone"></i>آموزش ها و درس ها</a></li>
  											<li class="active"><a href="index.html"><i class="fa fa-home"></i>خانه</a></li>
  										</ul>
  										<!-- End Main Menu -->
  									</div>
  								</nav>
  								<!-- Search Area -->
  								<div class="search-area">
  									<a href="#header" class="icon"><i class="fa fa-search"></i></a>
  									<form class="search-form">
  										<input type="text" placeholder="جستجو ..." name="search" style="direction:rtl;">
  										<button value="search " type="submit"><i class="fa fa-search"></i></button>
  									</form>
  								</div>
  								<!-- End Search Area-->
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  			<!--/ End Header Inner -->
  		</header>
  		<!--/ End Header -->

      <!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<h2>گرامر</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.html">خانه <i class="fa fa-angle-left"></i></a></li>
							<li><a href="courses.html">آموزش و درس ها<i class="fa fa-angle-left"></i></a></li>
              <li><a href="grammers.html">گرامر<i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">درس یک</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Breadcrumb -->

  <div class="container">
          <h1>English Grammar Video</h1>
          <p>Welcome to our English grammar video lesson.</p>

          <div class="video-frame">
              <div class="tv-screen">
                  <video id="grammar-video" controls>
                      <source src="videos/dah.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                  </video>
              </div>
          </div>
      </div>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script>
          var video = document.getElementById("grammar-video");
          var playPauseBtn = document.getElementById("play-pause-btn");
          var speedRange = document.getElementById("speed-range");
          var volumeRange = document.getElementById("volume-range");

          playPauseBtn.addEventListener("click", function() {
              if (video.paused || video.ended) {
                  video.play();
                  playPauseBtn.textContent = "Pause";
              } else {
                  video.pause();
                  playPauseBtn.textContent = "Play";
              }
          });

          speedRange.addEventListener("input", function() {
              video.playbackRate = speedRange.value;
          });

          volumeRange.addEventListener("input", function() {
              video.volume = volumeRange.value;
          });
      </script>

    <!-- Clients CSS -->
    <div class="clients">
      <div class="container">
      </div>
    </div>
    <!--/ End Clients CSS -->

    <!-- Footer -->
    <footer class="footer section">
      <!-- Footer Top -->
      <div class="footer-top overlay">
        <div class="container" style="text-align: right;">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
              <!-- About -->
              <div class="single-widget about">
                <h2>راه های ارتباطی</h2>
                <ul class="list">

                  <li><i class="fa fa-phone"></i>تلفن : 09130000006 </li>
                  <li><i class="fa fa-envelope"></i>ایمیل : <a href="mailto:info@youremail.com">langute@gmail.com</a></li>
                </ul>
                <!-- Social -->
                <ul class="social">
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="active"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
                <!-- End Social -->
              </div>
              <!--/ End About -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Useful Links -->
              <div class="single-widget list">
                <h2>لینک های مفید</h2>
                <ul>
                  <li><i class="fa fa-angle-left"></i><a href="index.html">خانه</a></li>
                  <li><i class="fa fa-angle-left"></i><a href="contact.html">ارتباط با ما</a></li>
                  <li><i class="fa fa-angle-left"></i><a href="courses.html">آموزش ها و درس ها</a></li>
                  <li><i class="fa fa-angle-left"></i><a href="Learning_page.html">یادگیری با روش های مختف</a></li>
                </ul>
              </div>
              <!--/ End Useful Links -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Useful Links -->
              <div class="single-widget opening-times">
                <h2>ساعات پاسخ گویی</h2>
                <ul class="list">
                  <li><span>  08am - 10pm  </span><div class="value off">شنبه تا پنجشنبه</div></li>
                  <li><span>  010am - 06pm  </span><div class="value off">جمعه و روزهای تعطیل</div></li>
                </ul>
              </div>
              <!--/ End Useful Links -->
            </div>
          </div>
        </div>
      </div>
    </footer>
      <!--/ End Footer Top -->

		<!-- Jquery JS-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate.min.js"></script>
		<!-- Colors JS-->
        <script src="js/colors.js"></script>
		<!-- Popper JS-->
        <script src="js/popper.min.js"></script>
		<!-- Bootstrap JS-->
        <script src="js/bootstrap.min.js"></script>
		<!-- Owl Carousel JS-->
        <script src="js/owl.carousel.min.js"></script>
		<!-- Jquery Steller JS -->
		<script src="js/jquery.stellar.min.js"></script>
		<!-- Final Countdown JS -->
		<script src="js/finalcountdown.min.js"></script>
		<!-- Fancy Box JS-->
		<script src="js/facnybox.min.js"></script>
		<!-- Magnific Popup JS-->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Circle Progress JS -->
		<script src="js/circle-progress.min.js"></script>
		<!-- Nice Select JS -->
		<script src="js/niceselect.js"></script>
		<!-- Jquery Steller JS-->
        <script src="js/jquery.stellar.min.js"></script>
		<!-- Jquery Steller JS-->
        <script src="js/cube-portfolio.min.js"></script>
		<!-- Slick Nav JS-->
        <script src="js/slicknav.min.js"></script>
		<!-- Easing JS-->
        <script src="js/easing.min.js"></script>
		<!-- Waypoints JS-->
        <script src="js/waypoints.min.js"></script>
		<!-- Counter Up JS -->
		<script src="js/jquery.counterup.min.js"></script>
		<!-- Scroll Up JS-->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Gmaps JS-->
		<script src="js/gmaps.min.js"></script>
		<!-- Main JS-->
        <script src="js/main.js"></script>
    </body>
</html>
