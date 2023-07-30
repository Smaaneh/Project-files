<?php
session_start();

// بررسی وجود جلسه و وضعیت ورود کاربر
if (!isset($_SESSION["email"]) || empty($_SESSION["email"])) {
    header("Location: login.php"); // انتقال کاربر به صفحه ورود در صورت عدم ورود
    exit();
}

// نمایش اطلاعات کاربر
$email = $_SESSION["email"];
$name = $_SESSION["name"];
$last_name = $_SESSION["last_name"];

// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "langute";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
}

// به دیتابیس ایزلاگین کاربر را بروزرسانی کنید
$updateIsLoginSQL = "UPDATE users SET is_login = 1 WHERE email = ?";
$stmt = $conn->prepare($updateIsLoginSQL);
$stmt->bind_param("s", $email);
$stmt->execute();

// بررسی وضعیت ادمین و انتقال کاربر به صفحه مدیریت در صورت بودن کاربر ادمین
if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
    echo "<script>alert('$name $last_name به سایت لنگوته خوش آمدید. شما مدیر هستید.');</script>";
    header("Location: AdminPanel/pages/HomeAdmin.html");
    exit();
} else {
    echo "<script>alert('$name $last_name به سایت لنگوته خوش آمدید.');</script>";
}

// بستن اتصال به دیتابیس
$conn->close();

// انتقال کاربر به صفحه index.php
echo "<script>window.location.href = 'index.php';</script>";
?>