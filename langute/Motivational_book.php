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
// دریافت اطلاعات اهنگ‌ها از دیتابیس
$sql = "SELECT * FROM book WHERE Collection_name = 'Motivational'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
         <!-- metaTAGS -->
        <?php include 'metaTAGS.php';?>
        <!-- Title -->
        <title>کتاب های انگیزشی</title>
        <!-- songs -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
						<h2>کتاب های انگیزشی</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.html">خانه <i class="fa fa-angle-left"></i></a></li>
							<li><a href="Learning.html">یادگیری با روش های مختلف<i class="fa fa-angle-left"></i></a></li>
                            <li><a href="book.php">کتاب<i class="fa fa-angle-left"></i></a></li>
                            <li class="active"><a href="#">کتاب های انگیزشی<i class="fa fa-angle-left"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Breadcrumb -->