<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "langute";

// اتصال به دیتابیس
$conn = new mysqli($servername, $username, $password, $dbname);
// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس با مشکل مواجه شد: " . $conn->connect_error);
}
// دریافت اطلاعات کتاب‌ها از دیتابیس
$sql = "SELECT * FROM book WHERE collection_name = 'Motivational'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
    <!-- metaTAGS -->
    <?php include 'metaTAGS.php';?>
    <!-- Title -->
    <title>کتاب‌های انگیزشی</title>
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
                    <h2>کتاب‌های انگیزشی</h2>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="bread-list">
                        <li><a href="index.html">خانه <i class="fa fa-angle-left"></i></a></li>
                        <li><a href="Learning.html">یادگیری با روش‌های مختلف<i class="fa fa-angle-left"></i></a></li>
                        <li><a href="book.php">کتاب<i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">کتاب‌های انگیزشی<i class="fa fa-angle-left"></i></a></li>
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
                    <a href="<?php echo $row["PDF"]; ?>" download>دانلود PDF</a>
                    <br><br>
                    <embed src="<?php echo $row["PDF"]; ?>" type="application/pdf" width="100%" height="600px" />
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- footer & js links -->
    <?php include 'footer.php';?>
</body>
</html>