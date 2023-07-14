<!DOCTYPE html>
<html lang="fa">
<head>
  <title>عضویت</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Styles -->
  <link type="text/css" href="css/bootstrap-rtl.min.css" rel="stylesheet" />
  <link type="text/css" href="css/font-awesome.min.css" rel="stylesheet" />
  <link type="text/css" href="css/animate.css" rel="stylesheet" />
  <link type="text/css" href="css/hamburgers.min.css" rel="stylesheet" />
  <link type="text/css" href="css/select2.min.css" rel="stylesheet" />
  <link type="text/css" href="css/util.css" rel="stylesheet" />
  <link type="text/css" href="css/style.css" rel="stylesheet" />
  <!-- / styles -->
</head>

<body>
<div class="limiter">
  <div class="container-login100" style="background-color:#05C46B;">
    <div class="wrap-login100">
    <!-- php codes -->
    <?php
      // اتصال به دیتابیس
      $servername = "localhost";
      $username = "root";
      $password = "123";
      $dbname = "langute";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
      }

      // بررسی فرم عضویت کاربر
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST["name"];
          $last_name = $_POST["last_name"];
          $password = $_POST["password"];
          $email = $_POST["email"];

          // اعتبارسنجی کاربران تکراری
          $checkUserSQL = "SELECT * FROM users WHERE email = ?";
          $stmt = $conn->prepare($checkUserSQL);
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $checkUserResult = $stmt->get_result();

          if ($checkUserResult->num_rows == 0) {
              // بررسی ستون‌های is_admin و is_login
              $is_admin = false; // تنظیم اولیه برای کاربر عادی
              $is_login = true; // تنظیم اولیه برای وضعیت ورود

              // بررسی وضعیت is_admin
              if (isset($_POST["is_admin"]) && $_POST["is_admin"] == "on") {
                  $is_admin = true; // تنظیم وضعیت برای کاربر مدیر
              }

              // بررسی وضعیت is_login
              if (isset($_POST["is_login"]) && $_POST["is_login"] == "on") {
                  $is_login = true; // تنظیم وضعیت برای کاربر وارد شده
              } else {
                  $is_login = false; // تنظیم وضعیت برای کاربر غیرفعال
              }

              // رمز عبور را رمزنگاری کنید
              $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

              // کاربر جدید را به دیتابیس اضافه کنید
              $insertUserSQL = "INSERT INTO users (name, last_name, password, email, is_admin, is_login) VALUES (?, ?, ?, ?, ?, ?)";
              $stmt = $conn->prepare($insertUserSQL);
              $stmt->bind_param("ssssii", $name, $last_name, $hashedPassword, $email, $is_admin, $is_login);
              if ($stmt->execute()) {
                  session_start();
                  $_SESSION["email"] = $email;
                  $_SESSION["name"] = $name;
                  $_SESSION["last_name"] = $last_name;
                  header("Location: welcome.php");
                  exit();
              } else {
                  echo "خطا در ایجاد کاربر: " . $conn->error;
              }
          } else {
              echo "این ایمیل قبلاً ثبت شده است.";
          }
      }
    ?>
      <!-- input form -->
      <form class="login100-form validate-form"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <span class="login100-form-title">عضویت در سایت</span>
        <!-- enter name -->
        <div class="wrap-input100 validate-input" data-validate="لطفاً نام خود را وارد کنید">
          <input class="input100" id="name" type="text" name="name" placeholder="نام" required>
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-user" aria-hidden="true" style="color: #05C46B;"></i>
          </span>
        </div>
        <!-- / enter name -->
        <!-- enter last name -->
        <div class="wrap-input100 validate-input" data-validate="لطفاً نام خانوادگی خود را وارد کنید">
          <input class="input100" type="text" id="last_name" name="last_name" placeholder="نام خانوادگی" required>
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-user" aria-hidden="true" style="color: #05C46B;"></i>
          </span>
        </div>
        <!-- / enter last name -->
        <!-- enter email -->
        <div class="wrap-input100 validate-input" data-validate="لطفاً پست الکترونیک خود را وارد کنید!">
          <input class="input100" type="email" id="email" name="email" placeholder="پست الکترونیک" required>
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true" style="color: #05C46B;"></i>
          </span>
        </div>
        <!-- / enter email -->
       <!-- enter password -->
        <div class="wrap-input100 validate-input" data-validate="لطفاً رمز عبور را وارد کنید!">
          <input class="input100" type="password" id="password" name="password" placeholder="رمز عبور" required minlength="8">
          <span class="focus-input100"></span>
          <span class="symbol-input100">


            <i class="fa fa-lock" aria-hidden="true" style="color: #05C46B;"></i>
          </span>
        </div>
        <!-- / enter password -->

        <!-- is_admin checkbox -->
        <div class="wrap-input100">
          <input class="input-checkbox100" id="is_admin" type="checkbox" name="is_admin">
          <label class="label-checkbox100" for="is_admin">کاربر مدیر</label>
        </div>
        <!-- / is_admin checkbox -->

        <!-- is_login checkbox -->
        <div class="wrap-input100">
          <input class="input-checkbox100" id="is_login" type="checkbox" name="is_login" checked>
          <label class="label-checkbox100" for="is_login">وضعیت ورود</label>
        </div>
        <!-- / is_login checkbox -->

        <!-- register button -->
        <div class="container-login100-form-btn">
          <button class="login100-form-btn" style="background-color: #05C46B;" type="submit">عضویت</button>
        </div>
        <!-- / register button -->

        <!-- login -->
        <div class="text-center p-t-50">
          <a class="txt2" href="login.php">
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>قبلاً ثبت نام کرده اید؟
          </a>
        </div>
        <!-- / login -->

      </form>
      <!-- / input form -->

      <!-- form image -->
      <div class="login100-pic js-tilt" data-tilt>
        <img src="pics/img-01.png" alt="IMG">
      </div>
      <!-- / form image -->

    </div>
  </div>
</div>

  <!-- scripts -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <script src="js/scripts.js"></script>
  <!-- / scripts -->
</body>
</html>
<!-- This template has been downloaded from Webrubik.com -->