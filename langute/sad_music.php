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
$sql = "SELECT * FROM songs WHERE Collection_name = 'sad_music'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
         <!-- metaTAGS -->
        <?php include 'metaTAGS.php';?>
        <!-- Title -->
        <title> موزیک های آرام و غمگین </title>
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
						<h2>موزیک های آرام و غمگین </h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.html">خانه <i class="fa fa-angle-left"></i></a></li>
							<li><a href="Learning.html">یادگیری با روش های مختلف<i class="fa fa-angle-left"></i></a></li>
                            <li><a href="music.php">موسیقی<i class="fa fa-angle-left"></i></a></li>
                            <li class="active"><a href="#">موزیک های غمگین <i class="fa fa-angle-left"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Breadcrumb -->
<!-- song main-->
<?php while($row = $result->fetch_assoc()) { ?>
    <section class="teachers archive section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="section-title bg">
                        <h2><?php echo $row["title"]; ?></h2>
                        <p><?php echo $row["caption"]; ?></p>
                        <div class="icon"><i class="fa fa-music"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="card mb-3 mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <div class="text-center">
                <audio id="audio-<?php echo $row["id"]; ?>" controls style="width: 100%;">
                    <source src="<?php echo $row["music"]; ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        </div>
    </div>
<?php } ?>
    <script>
        function playAudio(id) {
            var audio = document.getElementById("audio-" + id);
            audio.play();
        }

        function pauseAudio(id) {
            var audio = document.getElementById("audio-" + id);
            audio.pause();
        }

        function changeSpeed(id) {
            var audio = document.getElementById("audio-" + id);
            var speedInput = document.getElementById("speed-" + id);
            audio.playbackRate = speedInput.value;
        }
    </script>
    <!-- foother & js links -->
    <?php include 'foother.php';?>
    <!-- song JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>