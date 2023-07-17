<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | سوالات گرامر</title>
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
<!-- main Qgrammer -->
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

// دریافت سوالات گرامری از جدول questions
$sql = "SELECT question_title, correct_option FROM questions WHERE category = 'grammar'";
$result = $conn->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>مدیریت سوالات گرامر</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                        <li class="breadcrumb-item active">سوالات گرامر</li>
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
                    <a class="btn btn-success btn-lg" href="addQgrammer.php">افزودن سوال جدید +</a>
                    <div class="card-header">
                        <h3 class="card-title">لیست کل سوال ها</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>عنوان سوال</th>
                                    <th>گزینه ها</th>
                                    <th>گزینه صحیح</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // دریافت گزینه‌های مربوط به سوال از جدول opinions
                                        $opinionsSql = "SELECT option_text FROM options WHERE question_id = " . $row['question_id'];
                                        $opinionsResult = $conn->query($opinionsSql);

                                        echo "<tr>";
                                        echo "<td>" . $row['question_title'] . "</td>";
                                        echo "<td>";
                                        if ($opinionsResult->num_rows > 0) {
                                            while ($opinionRow = $opinionsResult->fetch_assoc()) {
                                                // نمایش فقط 20 کاراکتر اول از هر گزینه
                                                $opinionText = mb_substr($opinionRow['opinion_text'], 0, 20);
                                                echo $opinionText . "...";
                                            }
                                        }
                                        echo "</td>";
                                        echo "<td>" . $row['correct_opinion'] . "</td>";
                                        echo "<td><button onclick='confirmDelete(" . $row['question_id'] . ")'>حذف</button></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>هیچ سوال گرامری وجود ندارد.</td></tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>عنوان سوال</th>
                                    <th>گزینه ها</th>
                                    <th>گزینه صحیح</th>
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
        var result = confirm("آیا میخواهید این سوال حذف شود؟");
        if (result) {
            // اگر کاربر تایید کرد، ارسال درخواست حذف به صفحه deleteQgrammer.php
            window.location.href = "deleteQgrammer.php?id=" + id;
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
<!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>