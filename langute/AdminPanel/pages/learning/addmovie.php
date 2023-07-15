<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>افزودن فیلم جدید</title>
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
<!-- main addmovie -->
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>افزودن فیلم</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                <li class="breadcrumb-item"><a href="movie.php">مدیریت فیلم و کارتن </a></li>
                <li class="breadcrumb-item active">افزودن فیلم</li>
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
                          <h3 class="card-title">فرم افزودن فیلم</h3>
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
                                  <label>ژانر فیلم(نام مجموعه)</label>
                                  <select class="form-control" name="Collection_name">
                                      <option value="comedy">کمدی</option>
                                      <option value="Animation">انیمیشن</option>
                                      <option value="action">اکشن</option>
                                      <option value="drama">درام</option>
                                  </select>
                              </div>
                              <!-- upload video -->
                              <div class="form-group">
                                  <label for="video">آپلود ویدیو</label>
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="video" name="video">
                                          <label class="custom-file-label" for="video">فیلم </label>
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
        empty($_FILES["video"]["name"])
    ) {
        echo '<div class="alert alert-warning text-center mb-3">لطفاً تمام فیلدها را پر کنید و یک فایل ویدیو انتخاب کنید.</div>';
    } else {
        $Title = $_POST["Title"];
        $caption = $_POST["caption"];
        $Collection_name = $_POST["Collection_name"];
        $video = $_FILES["video"]["name"];

        // محدودیت‌های مربوط به ویدیو
        $src="../../../videos/uploads/movie/" . basename($_FILES["video"]["name"]);
        $targetDir = "/langute/Project-files/langute/videos/uploads/movie/";
        $url = "/langute/Project-files/langute/videos";

        echo '<a href="' . $targetDir . '">Link</a>';
        $targetFile = $targetDir . basename($_FILES["video"]["name"]);
        $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $maxFileSize = 2000 * 1024 * 1024; // حداکثر سایز ویدیو: 500

        // بررسی پسوند ویدیو
        $allowedExtensions = array("mp4", "avi", "mkv");
        if (!in_array($videoFileType, $allowedExtensions)) {
            echo '<div class="alert alert-danger text-center mb-3">فقط فایل‌های با پسوند MP4، AVI و MKV مجاز هستند.</div>';
        }
        // بررسی سایز ویدیو
        elseif ($_FILES["video"]["size"] > $maxFileSize) {
            echo '<div class="alert alert-danger text-center mb-3">سایز فایل ویدیو باید کمتر از 2000MB باشد.</div>';
        }
        // آپلود ویدیو
        else {
            if (move_uploaded_file($_FILES["video"]["tmp_name"], $src)) {
                // استفاده از prepared statement برای جلوگیری از حمله‌های اینجکشن
                $stmt = $conn->prepare("INSERT INTO movie (Title, caption, Collection_name, video) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $Title, $caption, $Collection_name, $targetFile);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success text-center mb-3">اطلاعات با موفقیت ذخیره شدند.</div>';
                } else {
                    echo '<div class="alert alert-danger text-center mb-3">خطا در ذخیره اطلاعات: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            } else {
                echo '<div class="alert alert-danger text-center mb-3">خطا در آپلود ویدیو.</div>';
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
