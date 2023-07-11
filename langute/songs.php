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
$sql = "SELECT * FROM songs";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
    <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Title -->
        <title>پخش موسیقی</title>
        <!-- songs -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Favicon -->
		<link rel="icon" type="image/png" href="images/favicon.png">

        <!-- Web Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="css/niceselect.css">
        <!-- Fancy Box CSS -->
        <link rel="stylesheet" href="css/jquery.fancybox.min.css">
        <!-- Fancy Box CSS -->
        <link rel="stylesheet" href="css/cube-portfolio.min.css">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
        <!-- Slick Nav CSS -->
        <link rel="stylesheet" href="css/slicknav.min.css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">

        <!-- Eduland Stylesheet -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">

        <!-- Eduland Colors -->
        <link rel="stylesheet" href="css/colors/color1.css">

</head>
<body>
<?php include 'header.php';?>
    <div class="container">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $row["title"]; ?></h3>
                    <audio id="audio-<?php echo $row["id"]; ?>" controls>
                        <source src="<?php echo $row["file_path"]; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        <?php } ?>
    </div>

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
</body>
</html>