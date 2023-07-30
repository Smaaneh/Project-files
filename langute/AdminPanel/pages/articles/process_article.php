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
    echo "لطفاً همه‌ی فیلدها را پر کنید.";
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
  echo '<div class="alert alert-danger text-center mb-3">فقط فایل‌های با پسوند JPG، JPEG و PNG مجاز هستند.</div>';
}
// بررسی سایز عکس
elseif ($_FILES["image"]["size"] > $maxFileSize) {
  echo '<div class="alert alert-danger text-center mb-3">سایز فایل عکس باید کمتر از 5MB باشد.</div>';
}
      // آپلود عکس
      elseif (move_uploaded_file($_FILES["image"]["tmp_name"], $src)) {
        // استفاده از prepared statement برای جلوگیری از حمله‌های اینجکشن
        $stmt = $conn->prepare("INSERT INTO articles (title, content, created_at, Picture) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $content, $created_at, $targetFile);
  
        if ($stmt->execute()) {
          echo '<div class="alert alert-success text-center mb-3">اطلاعات با موفقیت ذخیره شدند.</div>';
        } else {
          echo '<div class="alert alert-danger text-center mb-3">خطا در ذخیره اطلاعات: ' . $stmt->error . '</div>';
        }
  
        $stmt->close();
      } else {
        echo '<div class="alert alert-danger text-center mb-3">خطا در آپلود عکس.</div>';
      }
    }
  }
  
  $conn->close();
  ?>