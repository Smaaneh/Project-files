<!DOCTYPE html>
<html class="no-js" lang="fa">
    <head>
		<!-- metaTAGS -->
		<?php include 'metaTAGS.php';?>

		<!-- Title -->
		<title>مقالات</title>

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
						<h2>مقالات</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
                            <li><a href="articles.php">مقالات <i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">مقالات</a></li>
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

    // خواندن اطلاعات مقاله با آیدی مورد نظر از دیتابیس
    $sql = "SELECT * FROM articles WHERE id = $articleId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $articleTitle = $row["title"];
        $articleContent = $row["content"];
        $articlePicture = $row["Picture"];
        $articleDate = $row["created_at"];

        // نمایش اطلاعات مقاله
        echo '<h2>' . $articleTitle . '</h2>';
        echo '<img src="' . $articlePicture . '" alt="' . $articleTitle . '">';
        echo '<p>' . $articleContent . '</p>';
        echo '<p>تاریخ ایجاد مقاله : ' . $articleDate . '</p>';
    } else {
        echo "مقاله یافت نشد !";
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
