<!DOCTYPE html>
<html lang="fa">
<head>

	<title>ورود</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Styles -->
	<link type="text/css" href="css/bootstrap-rtl.min.css" rel="stylesheet" />
	<link type="text/css" href="css/font-awesome.min.css" rel="stylesheet" />
	<link type="text/css" href="css/animate.css" rel="stylesheet" />
	<link type="text/css" href="css/hamburgers.min.css" rel="stylesheet" />
	<link type="text/css" href="css/select2.min.css" rel="stylesheet" />
	<link type="text/css" href="css/util.css" rel="stylesheet" />
	<link type="text/css" href="css/style.css" rel="stylesheet" />
	<!-- / styles -->
</head>

<body>
<?php
// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "langute";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
}

// بررسی فرم ورود کاربر
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // بررسی اعتبار رمز عبور
    $getUserSQL = "SELECT * FROM users WHERE email = '$email'";
    $getUserResult = $conn->query($getUserSQL);

    if ($getUserResult->num_rows == 1) {
        $row = $getUserResult->fetch_assoc();
        $hashedPassword = $row["password"];

        // بررسی تطابق رمز عبور
        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $row["name"];
            $_SESSION["last_name"] = $row["last_name"];
            $_SESSION["is_admin"] = $row["is_admin"];

            if ($row["is_admin"] == 1) {
                // اگر کاربر ادمین است، به مسیر AdminPanel/pages/HomeAdmin.html بروید
                header("Location: AdminPanel/pages/HomeAdmin.html");
            } else {
                // اگر کاربر عادی است، به صفحه خوش‌آمدگویی بروید
                header("Location: welcome.php");
            }
            exit();
        } else {
            $error = "ایمیل یا رمز عبور اشتباه است.";
        }
    } else {
        $error = "ایمیل یا رمز عبور اشتباه است.";
    }
}

?>
	<div class="limiter">
		<div class="container-login100" style="background-color:#05C46B;">
			<div class="wrap-login100">

			<!-- input form -->
			<form class="login100-form validate-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<span class="login100-form-title">ورود</span>

				<!-- enter email-->
				<div class="wrap-input100 validate-input" data-validate = "لطفا پست الکترونیک خود را وارد کنید!">
					<input class="input100" type="text" id="email" name="email" placeholder="پست الکترونیک">
					<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true" style="color: #05C46B;"></i>
						</span>
				</div>
				<!-- / enter email -->

				<!-- enter password-->
				<div class="wrap-input100 validate-input" data-validate = "لطفا رمز عبور را وارد کنید!">
					<input class="input100" type="password" id="password" name="password" placeholder="رمز عبور">
					<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true" style="color: #05C46B;"></i>
						</span>
				</div>
				<!-- / enter password-->



				<!-- login button-->
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" style="background-color: #05C46B;">ورود</button>
				</div>
				<!-- / login button -->
				<?php if(isset($error)) { echo "<p>".$error."</p>"; } ?>
				<!-- restore password -->
				<div class="text-center p-t-12">
					<a class="txt2" href="forgot_password.php">
						بازگردانی رمز عبور!
					</a>
				</div>
				<!-- / restore password-->

				<!-- register-->
				<div class="text-center p-t-50">
					<a class="txt2" href="register.php">
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true" ></i>
						هنوز ثبت نام نکرده اید ؟
					</a>
				</div>
				<!-- / register-->

			</form>
			<!-- / input form -->

			<!-- form image -->
			<div class="login100-pic js-tilt" data-tilt>
				<img src="pics/img-01.png" alt="IMG">
			</div>
			<!-- / form image -->

			</div>
		</div>
	</div>


	<!-- scripts -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/scripts.js"></script>
	<!-- / scripts -->
</body>
</html>
