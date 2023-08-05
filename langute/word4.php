<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="Site keywords here">
  <meta name="description" content="">
  <meta name='copyright' content=''>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>واژگان | درس چهار </title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
 
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
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

  <!-- Eduland Colors -->
  <link rel="stylesheet" href="css/colors/color1.css">
  <style>
    .card {
      height: 200px;
    }
  </style>
</head>
<body>
  <!-- header-->
  <?php include 'header.php';?>

  <!-- Breadcrumb -->
  <div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
          <h2>یادگیری لغات</h2>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class="bread-list">
            <li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
            <li><a href="courses.php">آموزش و درس ها<i class="fa fa-angle-left"></i></a></li>
            <li><a href="words.pho">واژگان<i class="fa fa-angle-left"></i></a></li>
            <li class="active"><a href="#">درس چهار<i class="fa fa-angle-left"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--/ End Breadcrumb -->

  <!--/ End Slider Area -->
  <!-- main word -->

  <?php
$servername = "localhost";  // نام سرور میزبان دیتابیس
$username = "root";  // نام کاربری دیتابیس
$password = "123";  // رمز عبور دیتابیس
$dbname = "langute";  // نام دیتابیس

// اتصال به دیتابیس
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس با مشکل مواجه شد: " . $conn->connect_error);
}

// کوئری برای دریافت اطلاعات
$sql = "SELECT * FROM vocabulary WHERE lesson_id = 4";
$result = $conn->query($sql);
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h1 class="text-center">English Vocabulary</h1>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-6 offset-md-3">
      <div id="swiper-container" class="swiper-container">
        <div class="swiper-wrapper">
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<div class="swiper-slide">';
              echo '<img class="card-img-top" src="' . $row["picture"] . '" alt="' . $row["word"] . '">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">' . $row["word"] . '</h5>';
              echo '<p class="card-text">' . $row["translation"] . '</p>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<div class="swiper-slide">';
            echo '<p class="text-center">هیچ واژه‌ای یافت نشد.</p>';
            echo '</div>';
          }
          ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('#swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>

<?php
// بستن اتصال به دیتابیس
$conn->close();
?>



  <!--/ End main word-->
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
