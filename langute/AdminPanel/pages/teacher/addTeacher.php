<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | افزودن استاد</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="../../dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="../../dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include '../navbar.php';?>
<?php include '../menu.php';?>
<!-- **************************************************** -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>افزودن استاد جدید</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
            <li class="breadcrumb-item"><a href="teacher.php">استادان</a></li>
            <li class="breadcrumb-item active">افزودن استاد</li>
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
              <h3 class="card-title">فرم ثبت نام</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">نام</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="نام استاد را وارد کنید">
                </div>
                <div class="form-group">
                  <label for="Lname">نام خانوادگی</label>
                  <input type="text" class="form-control" id="Lname" name="Lname" placeholder="نام خانوادگی استاد را وارد کنید">
                </div>
                <div class="form-group">
                  <label for="expertise">تخصص</label>
                  <input type="text" class="form-control" id="expertise" name="expertise" placeholder="تخصص استاد را وارد کنید">
                </div>
                <div class="form-group">
                  <label for="image">آپلود عکس</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">عکس استاد را انتخاب کنید</label>
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
        <!-- /.col-md-12 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  <!-- php code -->
  <?php
  // $serverAddress = $_SERVER['SERVER_ADDR'];
  // $url = "/langute/Project-files/langute/images";

  // echo '<a href="' . $url . '">Link</a>';
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
    if (empty($_POST["name"]) || empty($_POST["Lname"]) || empty($_POST["expertise"]) || empty($_FILES["image"]["name"])) {
      echo '<div class="alert alert-warning text-center mb-3">لطفاً تمام فیلدها را پر کنید.</div>';
    } else {
      $name = $_POST["name"];
      $Lname = $_POST["Lname"];
      $expertise = $_POST["expertise"];
      $image = $_FILES["image"]["name"];
  
      // محدودیت‌های مربوط به عکس
      $serverAddress = $_SERVER['SERVER_ADDR'];
      // echo( $serverAddress);
      // echo("<a href='../../../images/uploads/teacher/'>test</a>");
      $src="../../../images/uploads/teacher/" . basename($_FILES["image"]["name"]);
      $targetDir = "/langute/Project-files/langute/images/uploads/teacher/";
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
        $stmt = $conn->prepare("INSERT INTO teacher (name, last_name, expertise, Picture) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $Lname, $expertise, $targetFile);
  
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




<!-- **************************************************** -->
<?php include '../footer.php';?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
