<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | آزمون گرامر</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSSlinks -->
  <?php include '../CSSlinks.php';?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include '../navbar.php';?>

  <?php include '../menu.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>سوالات گرامر</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                <li class="breadcrumb-item"><a href="azmon.php">آزمون</a></li>
                <li class="breadcrumb-item"><a href="Qgrammar.php">سوالات گرامر</a></li>
                <li class="breadcrumb-item active">ویرایش سوالات گرامر</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
 <!--php code -->
 <?php
        // اطلاعات اتصال به پایگاه داده
        $servername = "localhost"; // آدرس سرور پایگاه داده
        $username = "root"; // نام کاربری پایگاه داده
        $password = "123"; // رمز عبور پایگاه داده
        $dbname = "langute"; // نام پایگاه داده

        // ایجاد اتصال به پایگاه داده
        $conn = new mysqli($servername, $username, $password, $dbname);

        // بررسی وضعیت اتصال
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
            // بستن اتصال به پایگاه داده
    $conn->close();
    ?>
    <!-- footer -->
    <?php include '../footer.php';?>
  <!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>