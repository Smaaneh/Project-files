<?php
// اتصال به دیتابیس
$servername = "localhost"; // آدرس سرور دیتابیس (معمولاً localhost است)
$username = "root"; // نام کاربری دیتابیس
$password = "123"; // رمز عبور دیتابیس
$dbname = "langute"; // نام دیتابیس

$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// بررسی فرم برای ارسال
if (isset($_POST["submit"])) {
    // دریافت اطلاعات ارسالی از فرم
    $title = $_POST["title"];
    $created_at = $_POST["created_at"];
    $content = $_POST["content"];
    $image = $_FILES["image"]["name"];

// بررسی اطلاعات وارد شده
if (empty($title) || empty($created_at) || empty($content) || empty($_FILES["image"]["name"])) {
    echo "<script>alert('لطفاً همه‌ی فیلدها را پر کنید.')</script>";
    echo "<script>window.location.href = 'addarticles.php';</script>";
} else {
    // تبدیل تاریخ انتخاب شده به فرمت مناسب برای ذخیره در دیتابیس
    $created_at = date("Y-m-d H:i:s", strtotime($created_at));
// محدودیت‌های مربوط به عکس
$serverAddress = $_SERVER['SERVER_ADDR'];
$src="../../../images/uploads/articles/" . basename($_FILES["image"]["name"]);
$targetDir = "/langute/Project-files/langute/images/uploads/articles/";
$url = "/langute/Project-files/langute/images";

echo '<a href="' . $targetDir . '">Link</a>';
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$maxFileSize = 5 * 1024 * 1024; // حداکثر سایز عکس: 5MB

// بررسی پسوند عکس
$allowedExtensions = array("jpg", "jpeg", "png");
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "<script>alert('فقط فایل‌های با پسوند JPG، JPEG و PNG مجاز هستند.')</script>";
    echo "<script>window.location.href = 'addarticles.php';</script>";
}
// بررسی سایز عکس
elseif ($_FILES["image"]["size"] > $maxFileSize) {
    echo "<script>alert('سایز فایل عکس باید کمتر از 5MB باشد.')</script>";
    echo "<script>window.location.href = 'addarticles.php';</script>";
}
      // آپلود عکس
      elseif (move_uploaded_file($_FILES["image"]["tmp_name"], $src)) {
        // استفاده از prepared statement برای جلوگیری از حمله‌های اینجکشن
        $stmt = $conn->prepare("INSERT INTO articles (title, content, created_at, Picture) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $content, $created_at, $targetFile);
  
        if ($stmt->execute()) {
            echo "<script>alert('اطلاعات با موفقیت ذخیره شدند.')</script>";
            echo "<script>window.location.href = 'addarticles.php';</script>";
        } else {
          echo '<script>alert("خطا در ذخیره اطلاعات") ' . $stmt->error . '</script>';
        }
  
        $stmt->close();
      } else {
        echo "<script>alert('خطا در آپلود عکس.')</script>";
        echo "<script>window.location.href = 'addarticles.php';</script>";
      }
    }
  }
  
  $conn->close();
  ?>