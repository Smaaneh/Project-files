<!DOCTYPE html>
<html>
<head>
  <!-- metaTAGS -->
  <?php include 'metaTAGS.php';?>

<!-- Title -->
<title>درس دو گرامر</title>
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
						<h2>گرامر</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
							<li><a href="courses.php">آموزش و درس ها<i class="fa fa-angle-left"></i></a></li>
              <li><a href="grammers.php">گرامر<i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">درس دو</a></li>
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
$sql = "SELECT Title, caption, Video FROM grammar WHERE lesson_id = 2";
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
