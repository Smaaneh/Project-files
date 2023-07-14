<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | فیلم و کارتن</title>
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
<!-- main editMOVIE-->
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

  // دریافت شناسه فیلم برای ویرایش
  $id = $_GET['id'];
  // دریافت اطلاعات فیلم قبل از ویرایش
  $sql = "SELECT * FROM movie WHERE id = $id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $Title = $row['Title'];
      $caption = $row['caption'];
      $Collection_name = $row['Collection_name'];
      $video = $row['Video'];
  } else {
      echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
      exit();
  }

  // در صورتی که فرم ویرایش ارسال شده باشد
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // دریافت اطلاعات از فرم
      $new_Title = $_POST['Title'];
      $new_caption = $_POST['caption'];
      $new_Collection_name = $_POST['Collection_name'];
      $new_video = $_POST['video'];

      // به روزرسانی رکورد کلمه در جدول movie
      $update_sql = "UPDATE movie SET Title = '$new_Title', caption = '$new_caption', Collection_name = '$new_Collection_name', Video = '$new_video' WHERE id = $id";

      if ($conn->query($update_sql) === TRUE) {
          echo "<script>alert('ویرایش فیلم با موفقیت انجام شد.')</script>";
          echo "<script>window.location.href = 'movie.php';</script>";
      } else {
          echo "<script>alert('خطا در ویرایش رکورد.')</script>";
      }
  }

  // بستن اتصال به پایگاه داده
  $conn->close();
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper

  ">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>ویرایش لغت</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-left">
                          <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                          <li class="breadcrumb-item"><a href="movie.php">مدیریت فیلم  کارتن</a></li>
                          <li class="breadcrumb-item active">ویرایش فیلم</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section><!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-12">
                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">فرم ویرایش فیلم</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="Title">عنوان</label>
                                  <input type="text" class="form-control" id="Title" name="Title" value="<?php echo $Title; ?>" required>
                              </div>

                              <div class="form-group">
                                  <label for="caption">کپشن</label>
                                  <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $caption; ?>" required>
                              </div>
                              <!-- select -->
                              <div class="form-group">
                                  <label>ژانر مد نظر خود را انتخاب کنید</label>
                                  <select class="form-control" name="Collection_name">
                                  <option value="comedy" <?php if ($Collection_name == 'comedy') echo 'selected'; ?>>کمدی</option>
                                      <option value="Animation" <?php if ($Collection_name == 'Animation') echo 'selected'; ?>>انیمیشن</option>
                                      <option value="action" <?php if ($Collection_name == 'action') echo 'selected'; ?>>اکشن</option>
                                      <option value="drama" <?php if ($Collection_name == 'drama') echo 'selected'; ?>>درام</option>
                                  </select>
                              </div>
                              <!-- /select -->
                              <div class="form-group">
                                  <label for="video">فیلم</label>
                                  <input type="file" class="form-control" id="video" name="video">
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">ثبت تغییرات</button>
                          </div>
                      </form>
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- footer -->
<?php include '../footer.php';?>
<!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>