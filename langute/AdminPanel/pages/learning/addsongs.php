<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>افزودن موسیقی جدید</title>
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
<!-- main song -->
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>افزودن موسیقی</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                <li class="breadcrumb-item"><a href="songs.php">مدیریت موسیقی</a></li>
                <li class="breadcrumb-item active">افزودن گفتار</li>
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
                          <h3 class="card-title">فرم افزودن موسیقی</h3>
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
                                  <label>نام مجموعه</label>
                                  <select class="form-control" name="Collection_name">
                                      <option value="happy_music">موزیک های شاد</option>
                                      <option value="Motivational">پادکست های انگیزشی</option>
                                      <option value="sad_music">موسیقی های آرام و غمگین</option>
                                      <option value="Academic">پادکست های علمی</option>
                                  </select>
                              </div>
                              <!-- upload music -->
                              <div class="form-group">
                                  <label for="music">آپلود موسیقی یا پادکست</label>
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="music" name="music">
                                          <label class="custom-file-label" for="music">موسیقی یا پادکست </label>
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
        empty($_FILES["music"]["name"])
    ) {
        echo '<div class="alert alert-warning text-center mb-3">لطفاً تمام فیلدها را پر کنید و یک فایل صدا انتخاب کنید.</div>';
    } else {
        $Title = $_POST["Title"];
        $caption = $_POST["caption"];
        $Collection_name = $_POST["Collection_name"];
        $music = $_FILES["music"]["name"];

        // محدودیت‌های مربوط به موزیک
        $src="../../../sound/uploads/" . basename($_FILES["music"]["name"]);
        $targetDir = "/langute/Project-files/langute/sound/uploads/";
        $url = "/langute/Project-files/langute/sound";

        echo '<a href="' . $targetDir . '">Link</a>';
        $targetFile = $targetDir . basename($_FILES["music"]["name"]);
        $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $maxFileSize = 500 * 1024 * 1024; // حداکثر سایز موزیک: 500
        // بررسی پسوند موزیک
        $allowedExtensions = array("mp3", "RAW", "WAV", "WMA", "AAC", "OGG");
        if (!in_array($musicFileType, $allowedExtensions)) {
            echo '<div class="alert alert-danger text-center mb-3">فقط فایل‌های با پسوند "mp3", "RAW", "WAV", "WMA", "AAC", "OGG" مجاز هستند.</div>';
        }
        // بررسی سایز موزیک
        elseif ($_FILES["music"]["size"] > $maxFileSize) {
            echo '<div class="alert alert-danger text-center mb-3">سایز فایل ویدیو باید کمتر از 20 باشد.</div>';
        }
        // آپلود موزیک
        else {
            if (move_uploaded_file($_FILES["music"]["tmp_name"], $src)) {
                // استفاده از prepared statement برای جلوگیری از حمله‌های اینجکشن
                $stmt = $conn->prepare("INSERT INTO songs (Title, caption, Collection_name, music) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $Title, $caption, $Collection_name, $targetFile);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success text-center mb-3">اطلاعات با موفقیت ذخیره شدند.</div>';
                } else {
                    echo '<div class="alert alert-danger text-center mb-3">خطا در ذخیره اطلاعات: ' . $stmt->error . '</div>';
                }

                $stmt->close();
            } else {
                echo '<div class="alert alert-danger text-center mb-3">خطا در آپلود موزیک.</div>';
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
