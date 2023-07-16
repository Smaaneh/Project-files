<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>افزودن کتاب جدید</title>
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
<!-- main addbook -->
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>افزودن کتاب</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                <li class="breadcrumb-item"><a href="movie.php">مدیریت کتاب و داستان </a></li>
                <li class="breadcrumb-item active">افزودن کتاب</li>
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
                          <h3 class="card-title">فرم افزودن کتاب</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form role="form" method="post" enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="Title">عنوان</label>
                                  <input type="text" class="form-control" id="Title" name="Title"
                                      placeholder="عنوان خود را وارد کنید">
                              </div>
                              <div class="form-group">
                                  <label for="caption">کپشن</label>
                                  <input type="text" class="form-control" id="caption" name="caption"
                                      placeholder="کپشن را وارد کنید">
                              </div>
                              <!-- select -->
                              <div class="form-group">
                                  <label> (نام مجموعه)</label>
                                  <select class="form-control" name="Collection_name">
                                      <option value="Romance">عاشقانه</option>
                                      <option value="Science_fiction">علمی/تخیلی</option>
                                      <option value="Motivational">انگیزشی</option>
                                      <option value="Humer">طنز</option>
                                  </select>
                              </div>
                              <!-- upload PDF -->
                              <div class="form-group">
                                  <label for="pdf">آپلود PDF</label>
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="pdf" name="pdf" accept=".pdf">
                                          <label class="custom-file-label" for="pdf">کتاب</label>
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
      if (
          empty($_POST["Title"]) ||
          empty($_POST["caption"]) ||
          empty($_POST["Collection_name"]) ||
          empty($_FILES["pdf"]["name"])
      ) {
          echo '<div class="alert alert-warning text-center mb-3">لطفاً تمام فیلدها را پر کنید و یک فایل PDF انتخاب کنید.</div>';
      } else {
          $Title = $_POST["Title"];
          $caption = $_POST["caption"];
          $Collection_name = $_POST["Collection_name"];
          $pdf = $_FILES["pdf"]["name"];

          // محدودیت‌های مربوط به PDF
        $src="../../../PDF/uploads/" . basename($_FILES["pdf"]["name"]);
        $targetDir = "/langute/Project-files/langute/PDF/uploads/";
        $url = "/langute/Project-files/langute/PDF";

        echo '<a href="' . $targetDir . '">Link</a>';
        $targetFile = $targetDir . basename($_FILES["pdf"]["name"]);
        $pdfFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $maxFileSize = 30 * 1024 * 1024; // حداکثر سایز PDF: 30

          // بررسی پسوند PDF
          if ($pdfFileType !== "pdf") {
              echo '<div class="alert alert-danger text-center mb-3">فقط فایل‌های با پسوند PDF مجاز هستند.</div>';
          }
          // بررسی سایز PDF
          elseif ($_FILES["pdf"]["size"] > $maxFileSize) {
              echo '<div class="alert alert-danger text-center mb-3">سایز فایل PDF باید کمتر از 30MB باشد.</div>';
          }
          // آپلود PDF
          else {
              if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $src)) {
                  // استفاده از prepared statement برای جلوگیری از حمله‌های اینجکشن
                  $stmt = $conn->prepare("INSERT INTO book (Title, caption, Collection_name, PDF) VALUES (?, ?, ?, ?)");
                  $stmt->bind_param("ssss", $Title, $caption, $Collection_name, $targetFile);

                  if ($stmt->execute()) {
                      echo '<div class="alert alert-success  text-center mb-3">اطلاعات با موفقیت ذخیره شدند.</div>';
                  } else {
                      echo '<div class="alert alert-danger text-center mb-3">خطا در ذخیره اطلاعات: ' . $stmt->error . '</div>';
                  }

                  $stmt->close();
              } else {
                  echo '<div class="alert alert-danger text-center mb-3">خطا در آپلود PDF.</div>';
              }
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
