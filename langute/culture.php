<!DOCTYPE html>
<html class="no-js" lang="fa">
    <head>
		<!-- metaTAGS -->
		<?php include 'metaTAGS.php';?>

		<!-- Title -->
		<title>رفتاروآداب</title>

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
						<h2>رفتاروآداب</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
                            <li><a href="Learning.php">یادگیری با روش های مختف <i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">رفتاروآداب</a></li>
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

// بررسی وجود پارامتر id در URL
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $articleId = $_GET["id"];

    // خواندن اطلاعات  با آیدی مورد نظر از دیتابیس
    $sql = "SELECT * FROM culture WHERE id = $articleId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $articleTitle = $row["title"];
        $articleContent = $row["content"];
        $articleDate = $row["created_at"];
?>

<section class="teachers archive section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="section-title bg">
                    <h2><?php echo $articleTitle; ?></h2>
                    <div class="icon"><i class="fa fa-book"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- افزودن کلاس‌های جدید به محتوا  -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="article-content text-right">
                    <?php echo $articleContent; ?>
                    <p style="padding-right: 10px;">تاریخ ایجاد : <?php echo $articleDate; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    } else {
        echo "s یافت نشد !";
    }
} else {
    echo "Invalid article ID.";
}

$conn->close();
?>

<!-- foother & js links -->
<?php include 'foother.php';?>
    </body>
</html>