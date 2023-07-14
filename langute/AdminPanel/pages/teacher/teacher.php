<!DOCTYPE html>
<html>
  <?php
      header('Content-Type: text/html; charset=utf-8');
    ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | استادان</title>
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

// دریافت اطلاعات از جدول teacher
$sql = "SELECT * FROM teacher";
$result = $conn->query($sql);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>مدیریت استادان</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                        <li class="breadcrumb-item active">استادان</li>
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
                    <a class="btn btn-success btn-lg" href="addTeacher.php">افزودن استاد جدید +</a>
                    <div class="card-header">
                        <h3 class="card-title">اسامی استادان سایت لنگوته</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>تخصص</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // نمایش رکوردهای جدول teacher
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['expertise'] . "</td>";
                                        echo "<td><a href='editTeacher.php?id=" . $row['id'] . "' class='btn btn-block btn-info btn-sm'>ویرایش</a></td>";
                                        echo "<td><a href='deleteTeacher.php?id=" . $row['id'] . "' class='btn btn-block btn-danger btn-sm' onclick='confirmDelete(" . $row['id'] . ");'>حذف</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>هیچ رکوردی یافت نشد</td></tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>تخصص</th>
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
        if (result) {
            // اگر کاربر تایید کرد، ارسال درخواست حذف به صفحه deleteTeacher.php
            window.location.href = "deleteTeacher.php?id=" + id;
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
