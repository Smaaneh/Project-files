<!DOCTYPE html>
<html>
<head>
 <!-- metaTAGS -->
 <?php include 'metaTAGS.php';?>
  <!-- Title -->
  <title>درس چهار مکالمه</title>
 <!-- linksCSS -->
 <?php include 'linksCSS.php';?>
 <!-- Eduland film -->
 <link rel="stylesheet" href="css/film.css">

</head>
<body>
 <!-- header-->
 <?php include 'header.php';?>


      <!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<h2>مکالمه</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
							<li><a href="courses.php">آموزش و درس ها<i class="fa fa-angle-left"></i></a></li>
              <li><a href="conversation.php">مکالمه<i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">درس چهار</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Breadcrumb -->
    <?php
// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "langute";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام برای دریافت اطلاعات فیلم مورد نظر
$sql = "SELECT Title, caption, Video FROM conversation WHERE lesson_id = 4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // نمایش اطلاعات فیلم
    while ($row = $result->fetch_assoc()) {
        $title = $row["Title"];
        $caption = $row["caption"];
        $videoPath = $row["Video"];
        ?>
        <!-- caption & title -->
        <section class="teachers archive section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-12">
                        <div class="section-title bg">
                            <h2><?php echo $title; ?></h2>
                            <p><?php echo $caption; ?></p>
                            <div class="icon"><i class="fa fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="video-frame">
                    <div class="tv-screen">
                        <video id="grammar-video" controls>
                            <source src="<?php echo $videoPath; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End cours -->
        <?php
    }
} else {
    echo "No videos found for lesson_id = 4";
}

$conn->close();
?>

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
    <!-- course film JS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
