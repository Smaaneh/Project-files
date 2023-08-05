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
$sql = "SELECT * FROM book WHERE collection_name = 'Science_fiction'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
         <!-- metaTAGS -->
        <?php include 'metaTAGS.php';?>
        <!-- Title -->
        <title>کتاب های علمی تخیلی</title>
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
      <h2>کتاب های علمی تخیلی</h2>
     </div>
     <div class="col-lg-6 col-md-6 col-12">
      <ul class="bread-list">
       <li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
       <li><a href="Learning.php">یادگیری با روش های مختلف<i class="fa fa-angle-left"></i></a></li>
        <li><a href="book.php">کتاب<i class="fa fa-angle-left"></i></a></li>
       <li class="active"><a href="#">کتاب های علمی تخیلی<i class="fa fa-angle-left"></i></a></li>
      </ul>
     </div>
    </div>
   </div>
  </div>
  <!--/ End Breadcrumb -->
        <!-- book main-->
<?php while($row = $result->fetch_assoc()) { ?>
    <section class="teachers archive section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="section-title bg">
                        <h2><?php echo $row["Title"]; ?></h2>
                        <p><?php echo $row["caption"]; ?></p>
                        <div class="icon"><i class="fa fa-book"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="card mb-3 mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <div class="text-center">
            <a href="<?php echo $row["PDF"]; ?>" target="_blank" class="btn white primary">خواندن PDF: <?php echo $row["Title"]; ?></a></div>
            <div class="text-center">
            <a href="<?php echo $row["PDF"]; ?>" download class="btn white primary-">دانلود PDF: <?php echo $row["Title"]; ?></a>            </div>
        </div>
    </div>
<?php } ?>
     <!-- foother & js links -->
     <?php include 'foother.php';?>
</body>
</html>
