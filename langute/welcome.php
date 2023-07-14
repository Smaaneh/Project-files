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

echo "به خوش آمدید، $name $last_name! <br>";
echo "ایمیل شما: $email";

// دسترسی به اطلاعات بیشتر کاربران مدیر (با توجه به ستون is_admin در دیتابیس)
if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
    echo "<br>شما یک کاربر مدیر هستید.";
    header("Location: AdminPanel/pages/HomeAdmin.html"); // انتقال کاربر به صفحه مدیریت در صورت بودن کاربر ادمین
    exit();
}

// دسترسی به اطلاعات بیشتر کاربران وارد شده (با توجه به ستون is_login در دیتابیس)
if (isset($_SESSION["is_login"]) && $_SESSION["is_login"]) {
    echo "<br>شما وارد شده اید.";
} else {
    echo "<br>شما وارد نشده اید.";
}

// else codes
?>