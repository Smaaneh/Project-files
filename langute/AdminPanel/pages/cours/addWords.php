<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>افزودن کلمه جدید</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSSlinks -->
 <?php include '../CSSlinks.php';?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <!-- Navbar -->
 <?php include '../navbar.php';?>
<!-- menu -->
  <?php include '../menu.php';?>
<!-- main editConvertion -->
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>افزودن کلمه جدید</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                <li class="breadcrumb-item"><a href="teacher.html">درس ها</a></li>
                <li class="breadcrumb-item active">افزودن کلمه</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">فرم افزودن لغت</h3>
                </div>
                <!-- /.card-header -->
  <!-- form start -->
  <form role="form" method="post" enctype="multipart/form-data">
      <div class="card-body">
          <div class="form-group">
              <label for="word">لغت</label>
              <input type="text" class="form-control" id="word" name="word" placeholder="کلمه خود را وارد کنید">
          </div>
          <div class="form-group">
              <label for="translation">ترجمه</label>
              <input type="text" class="form-control" id="translation" name="translation" placeholder="ترجمه را وارد کنید">
          </div>
            <!-- select -->
      <div class="form-group">
        <label>درس مد نظر خود را انتخاب کنید</label>
        <select class="form-control" name="cours">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
  </select>
      </div>
    <!-- uplod pic -->
          <div class="form-group">
              <label for="image">آپلود عکس</label>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">عکس مناسب کلمه</label>
                  </div>
                  <div class="input-group-append">
                      <span class="input-group-text" id="">Upload</span>
                  </div>
              </div>
          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer text-center">
          <button type="submit" class="btn btn-success" name="submit">ثبت</button>
      </div>
  </form>
  </div>
  <!-- /.card -->
  </div>
  <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  </div>
  <!-- /.card-body -->
  </section>
  <!-- /.content -->
  </body>

  </html>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "123";
  $dbname = "langute";
  // اتصال به دیتابیس
  $conn = new mysqli($servername, $username, $password, $dbname);

  // بررسی اتصال
  if ($conn->connect_error) {
      die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
  }

  // دریافت داده‌ها از فرم و ذخیره در دیتابیس
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // بررسی پر بودن تمام فیلدها
      if (empty($_POST["word"]) || empty($_POST["translation"]) || empty($_POST["cours"]) || empty($_FILES["image"]["name"])) {
        echo '<div class="alert alert-warning text-center mb-3">لطفاً تمام فیلدها را پر کنید.</div>';
    } else {
          $word = $_POST["word"];
          $translation = $_POST["translation"];
          $cours = $_POST["cours"];
          $image = $_FILES["image"]["name"];

          // محدودیت‌های مربوط به عکس
          $targetDir = "../../../../images/uploads/word/";
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
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
              // استفاده از prepared statement برای جلوگیری از حمله‌های اینجکشن
              $stmt = $conn->prepare("INSERT INTO vocabulary (word, translation, lesson_id, picture) VALUES (?, ?, ?, ?)");
              $stmt->bind_param("ssss", $word, $translation, $cours, $targetFile);

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

  </div>
  <!-- /.content-wrapper -->
<!-- footer -->
<?php include '../footer.php';?>
<!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>
