<!DOCTYPE html>
<html>
<head>
	<!-- metaTAGS -->
	<?php include 'metaTAGS.php';?>
  <!-- Title -->
  <title>درس یک گرامر</title>

	<!-- linksCSS -->
	<?php include 'linksCSS.php';?>
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
$sql = "SELECT Title, caption, Video FROM grammar WHERE lesson_id = 1";
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
    echo "No videos found for lesson_id = 1";
}

$conn->close();
?>

   <!-- foother & js links -->
   <?php include 'foother.php';?>
    <!-- course film JS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
