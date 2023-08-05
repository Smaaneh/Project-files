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
  <title>واژگان | درس دو </title>

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
            <li><a href="words.php">واژگان<i class="fa fa-angle-left"></i></a></li>
            <li class="active"><a href="#">درس دو<i class="fa fa-angle-left"></i></a></li>
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
$sql = "SELECT * FROM vocabulary WHERE lesson_id = 2";
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
      <!-- foother & js links -->
      <?php include 'foother.php';?>
    </body>
</html>
