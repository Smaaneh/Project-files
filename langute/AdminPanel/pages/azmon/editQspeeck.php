<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>مدیریت | آزمون گفتار</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS links -->
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
                            <h1>سوالات گفتار</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                                <li class="breadcrumb-item"><a href="azmon.php">آزمون</a></li>
                                <li class="breadcrumb-item"><a href="Qspeeck.php">سوالات گفتار</a></li>
                                <li class="breadcrumb-item active">ویرایش سوالات گفتار</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
    <div class="col-lg-6 offset-lg-3 col-12">
        <h2>ویرایش سوال مکالمه</h2>
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

        // دریافت شناسه سوال برای ویرایش
        $question_id = $_GET['question_id'];

        // دریافت اطلاعات سوال بر اساس شناسه
        $sql = "SELECT * FROM questions WHERE question_id = $question_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $question_title = $row['question_title'];

            echo sprintf("<form role='form' method='POST' action='%s?question_id=%s'>", htmlspecialchars($_SERVER['PHP_SELF']), $question_id);
            echo "<input type='hidden' name='question_id' value='$question_id'>";
            echo "<div class='form-group'>";
            echo "<label>عنوان سوال</label>";
            echo "<input type='text' class='form-control' name='question_title' placeholder='وارد کردن اطلاعات ...' value='$question_title' required>";
            echo "</div>";

            // دریافت گزینه‌های غلط بر اساس شناسه سوال
            $sql = "SELECT option_id, option_text, correct_option FROM options WHERE question_id = $question_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $option_id = $row['option_id'];
                    $option_text = $row['option_text'];
                    $correct_option = $row['correct_option'];

                    echo "<div class='form-group'>";
                    echo "<label class='control-label text-" . ($correct_option == 1 ? 'success' : 'danger') . "'>" . ($correct_option == 1 ? '<i class="fa fa-check"></i> گزینه درست' : "<i class='fa fa-times-circle-o'></i> گزینه غلط $option_id") . "</label>";
                    echo "<input type='text' class='form-control' name='option_text_$option_id' placeholder='وارد کردن اطلاعات ...' value='$option_text' required>";
                    echo "</div>";
                }
            }

            echo "<button type='submit' class='btn btn-block btn-primary btn-sm'>ویرایش</button>";
            echo "</form>";
        } else {
            echo "<div class='alert alert-danger'>سوال مورد نظر یافت نشد.</div>";
            exit();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // دریافت اطلاعات از فرم
            $new_question_id = $_POST['question_id'];
            $new_question_title = $_POST['question_title'];

            // بروزرسانی اطلاعات سوال در جدول questions
            $update_sql = "UPDATE questions SET question_title = '$new_question_title' WHERE question_id = $question_id";
            if ($conn->query($update_sql) === TRUE) {
                // بروزرسانی گزینه‌های غلط و درست در جدول options
                $sql = "SELECT option_id FROM options WHERE question_id = $new_question_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $option_id = $row['option_id'];
                        $new_option_text = $_POST["option_text_$option_id"];
                        $update_sql = "UPDATE options SET option_text = '$new_option_text' WHERE question_id = $new_question_id AND option_id = $option_id";
                        $conn->query($update_sql);
                    }
                    echo "<script>alert('ویرایش واژه با موفقیت انجام شد.')</script>";
                    echo "<script>window.location.href = 'Qspeeck.php';</script>";
                } else {
                    echo "<script>alert('خطا در ویرایش رکورد.')</script>";
                }
            }
        }
        // بستن اتصال به پایگاه داده
        $conn->close();
        ?>
    </div>
</div>
        <!-- footer -->
        <?php include '../footer.php';?>
        <!-- JS links -->
        <?php include '../JSlinks.php';?>
    </body>
</html>