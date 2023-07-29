<!DOCTYPE html>
<html>
  <?php
      header('Content-Type: text/html; charset=utf-8');
    ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | مقالات</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include '../CSSlinks.php';?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include '../navbar.php';?>
<?php include '../menu.php';?>
<!-- main page -->
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

// دریافت اطلاعات از جدول articles
$sql = "SELECT * FROM articles";
$result = $conn->query($sql);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>مدیریت مقالات</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                        <li class="breadcrumb-item active">مقالات</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <a class="btn btn-success btn-lg" href="addarticles.php">افزودن مقاله جدید +</a>
                    <div class="card-header">
                        <h3 class="card-title">مقالات سایت لنگوته</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>عنوان</th>
                                    <th>متن مقاله</th>
                                    <th>تاریخ مقاله</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // نمایش رکوردهای جدول articles
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . substr($row['content'], 0, 50) . "..." . "</td>"; // استفاده از substr برای نمایش ۵۰ کاراکتر اول
                                        echo "<td>" . $row['created_at'] . "</td>";
                                        echo "<td><a href='editarticles.php?id=" . $row['id'] . "' class='btn btn-block btn-info btn-sm'>ویرایش</a></td>";
                                        echo "<td><button data-url='deletearticles.php?id=" . $row['id'] . "' class='btn btn-block btn-danger btn-sm' onclick='confirmDelete(" . $row['id'] . ");'>حذف</button></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>هیچ رکوردی یافت نشد</td></tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>عنوان</th>
                                    <th>متن مقاله</th>
                                    <th>تاریخ مقاله</th>
                                    <th>عملیات</th>
                                </tr>
                            </tfoot>
                        </table>
</div>
                    <!-- /.card-body -->
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

<script>
    function confirmDelete(id) {
        
        var result = confirm("آیا میخواهید این استاد حذف شود؟");
        console.log(result);
        if (result) {
            // اگر کاربر تایید کرد، ارسال درخواست حذف به صفحه deletearticles.php
            window.location.href = "deletearticles.php?id=" + id;
        } else {
            console.log("حذف رکورد لغو شد.");
        }
    }
</script>

<?php
// بستن اتصال به پایگاه داده
$conn->close();
?>
  <!-- footer -->
  <?php include '../footer.php';?>
  </aside>
</div>
<!-- JSlinks -->
<?php include '../JSlinks.php';?>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
        "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        },
        "info" : false,
    });
    $('#example2').DataTable({
        "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        },
      "info" : false,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
