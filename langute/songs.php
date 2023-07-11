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
         <!-- metaTAGS -->
        <?php include 'metaTAGS.php';?>
        <!-- Title -->
        <title>پخش موسیقی</title>
        <!-- songs -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- linksCSS -->
        <?php include 'linksCSS.php';?>
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
    <!-- foother & js links -->
    <?php include 'foother.php';?>
    <!-- song JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>