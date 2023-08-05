<!DOCTYPE html>
<html class="no-js" lang="fa">
    <head>
 <!-- metaTAGS -->
 <?php include 'metaTAGS.php';?>

		<!-- Title -->
		<title>استادان</title>

	 <!-- linksCSS -->
   <?php include 'linksCSS.php';?>

    </head>
    <body>

  <!-- header-->
    <?php include 'header.php';?>

		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<h2>استادان</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
							<li><a href="#">صفحه ها <i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="teachers.php">استادان </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Breadcrumb -->

		<!-- Teachers -->
<section class="teachers archive section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3 col-12">
        <div class="section-title bg">
          <h2>استادان <span>ما</span></h2>
          <p>شما عزیزان میتوانید برای آشنایی بیشتر با استادان زبان سایت ما، به تمام صفحات اجتماعی اساتید دسترسی داشته باشید</p>
          <div class="icon"><i class="fa fa-users"></i></div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      // اتصال به دیتابیس
      $servername = "localhost";
      $username = "root";
      $password = "123";
      $dbname = "langute";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("اتصال به دیتابیس با خطا مواجه شد: " . $conn->connect_error);
      }

      // دریافت اطلاعات استادان از جدول teacher
      $sql = "SELECT * FROM teacher";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $teacherName = $row["name"];
          $teacherLastName = $row["last_name"];
          $teacherExpertise = $row["expertise"];
          $teacherPicture =  $row["Picture"];

          // نمایش اطلاعات استاد در صفحه
          echo '<div class="col-lg-4 col-md-6 col-12">';
          echo '<div class="single-teacher">';
          echo '<div class="teacher-head overlay">';
          echo '<img src="' . $teacherPicture . '" alt="#">';
          echo '<ul class="social">';
          echo '<li><a href="#"><i class="fa fa-facebook"></i></a></li>';
          echo '<li><a href="#"><i class="fa fa-twitter"></i></a></li>';
          echo '<li><a href="#"><i class="fa fa-linkedin"></i></a></li>';
          echo '<li><a href="#"><i class="fa fa-youtube"></i></a></li>';
          echo '</ul>';
          echo '</div>';
          echo '<div class="teacher-content">';
          echo '<h4>' . $teacherName . ' ' . $teacherLastName . '<span>' . $teacherExpertise . '</span></h4>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "هیچ استادی یافت نشد.";
      }

      $conn->close();
      ?>
    </div>
  </div>
</section>
<!--/ End Teachers -->
   <!-- foother & js links -->
   <?php include 'foother.php';?>
    </body>
</html>
