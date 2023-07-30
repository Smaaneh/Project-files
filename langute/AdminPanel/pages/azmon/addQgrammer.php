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
                <li class="breadcrumb-item active">افزودن سوالات گرامر</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
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

// پیام‌های خالی برای پیام‌های نمایشی به کاربر
$successMessage = $errorMessage = "";

// درخواست ارسال فرم
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت مقادیر فرم
    $questionTitle = $_POST["question_title"];
    $correctOption = $_POST["correct_option"];
    $wrongOption1 = $_POST["wrong_option_1"];
    $wrongOption2 = $_POST["wrong_option_2"];
    $wrongOption3 = $_POST["wrong_option_3"];

    // استفاده از تراکنش‌ها برای انجام دو عملیات INSERT به صورت اتمیک
    $conn->autocommit(false);

    // استخراج اطلاعات سوالات گرامری به دیتابیس
    $sql = "INSERT INTO questions (category, question_title) VALUES ('grammer', '$questionTitle')";
    if ($conn->query($sql) === TRUE) {
        $questionId = $conn->insert_id;

        // استخراج گزینه‌ها به دیتابیس
        $sql = "INSERT INTO options (question_id, option_text, correct_option) VALUES ";
        $sql .= "($questionId, '$correctOption', 1), ";
        $sql .= "($questionId, '$wrongOption1', 0), ";
        $sql .= "($questionId, '$wrongOption2', 0), ";
        $sql .= "($questionId, '$wrongOption3', 0)";

        if ($conn->query($sql) === TRUE) {
            // اعمال تراکنش‌ها
            $conn->commit();
            $successMessage = "سوال با موفقیت ثبت شد.";
        } else {
            // انصراف از تراکنش و برگرداندن تغییرات
            $conn->rollback();
            $errorMessage = "خطا در ثبت گزینه‌ها: " . $conn->error;
        }
    } else {
        // انصراف از تراکنش و برگرداندن تغییرات
        $conn->rollback();
        $errorMessage = "خطا در ثبت سوال: " . $conn->error;
    }

    // فعال‌سازی خودکار COMMIT برای تراکنش‌های بعدی
    $conn->autocommit(true);
}

// بستن اتصال به پایگاه داده
$conn->close();
?>

<div class="container">
    <div class="col-lg-6 offset-lg-3 col-12">
        <h2>افزودن سوال گرامری</h2>
        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <form action="addQgrammer.php" method="post">
            <div class="form-group">
                <label>عنوان سوال</label>
                <input type="text" class="form-control" name="question_title" placeholder="وارد کردن اطلاعات ..." required>
            </div>
            <div class="form-group has-success">
                <label class="control-label text-success" for="inputSuccess"><i class="fa fa-check"></i>گزینه درست</label>
                <input type="text" class="form-control" name="correct_option" id="correct_option" placeholder="وارد کردن اطلاعات ..." required>
            </div>
            <div class="form-group has-error">
                <label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>گزینه غلط ۱</label>
                <input type="text" class="form-control" name="wrong_option_1" id="wrong_option_1" placeholder="وارد کردن اطلاعات ..." required>
            </div>
            <div class="form-group has-error">
                <label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>گزینه غلط ۲</label>
                <input type="text" class="form-control" name="wrong_option_2" id="wrong_option_2" placeholder="وارد کردن اطلاعات ..." required>
            </div>
            <div class="form-group has-error">
                <label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>گزینه غلط ۳</label>
                <input type="text" class="form-control" name="wrong_option_3" placeholder="وارد کردن اطلاعات ..." required>
            </div>

            <button type="submit" class="btn btn-block btn-success btn-sm">افزودن</button>
        </form>
    </div>
</div>
  <!-- footer -->
  <?php include '../footer.php';?>
  <!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>