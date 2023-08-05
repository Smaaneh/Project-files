<!DOCTYPE html>
<html class="no-js" lang="fa">
    <head>
		<!-- metaTAGS -->
		<?php include 'metaTAGS.php';?>

		<!-- Title -->
		<title>مقالات</title>

		<!-- linksCSS -->
 		<?php include 'linksCSS.php';?>


    </head>
    <body>

      <!-- header-->
		 <?php include 'header.php';?>

		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<h2>مقالات</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">مقالات</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Breadcrumb -->

<!-- Events -->
<section class="events archive section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="section-title bg">
                    <h2> مقالات <span>سایت</span></h2>
                    <p>در این بخش میتوانید با مطالعه مقالاتی در خصوص زبان ، به روند رشد یادگیری خود کمک کنید </p>
                    <div class="icon"><i class="fa fa-paper-plane"></i></div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            // اطلاعات اتصال به دیتابیس
            $servername = "localhost"; // نام سرور دیتابیس
            $username = "root"; // نام کاربری دیتابیس
            $password = "123"; // رمز عبور دیتابیس
            $dbname = "langute"; // نام پایگاه داده

            // اتصال به دیتابیس
            $conn = new mysqli($servername, $username, $password, $dbname);

            // بررسی اتصال
            if ($conn->connect_error) {
                die("اتصال با دیتابیس برقرار نشد: " . $conn->connect_error);
            }

            // کوئری برای دریافت مقالات از دیتابیس
            $sql = "SELECT id, title, content, created_at, Picture FROM articles";
            $result = $conn->query($sql);

            // نمایش مقالات
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // نمایش تاریخ به صورت نام ماه و شماره روز
                    $date = date("d F", strtotime($row["created_at"]));
                    ?>

                    <div class="col-lg-6 col-md-6 col-12">
                        <!-- Single Event -->
                        <div class="single-event" style="height: 400px;">
                            <div class="event-image">
                            <img src="<?php echo $row["Picture"]; ?>" alt="<?php echo $row["title"]; ?>">
                                <div class="event-date">
                                    <p><?php echo $date; ?></p>
                                </div>
                            </div>
                            <div class="event-content">
                                <h3 class="event-title"><a href="article.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a></h3>
                                <!-- نمایش محتوای مقاله (۱۰۰ کاراکتر اول) -->
                                <p><?php echo substr($row["content"], 0, 100) . "..."; ?></p>
                                <span class="entry-date-time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("h:i A", strtotime($row["created_at"])); ?> </span>
                            </div>
                        </div>
                        <!-- End Single Event -->
                    </div>

                    <?php
                }
            } else {
                echo "هیچ مقاله‌ای یافت نشد.";
            }

            // بستن اتصال به دیتابیس
            $conn->close();
            ?>

        </div>
    </div>
</section>
<!-- End Events -->

   <!-- foother & js links -->
   <?php include 'foother.php';?>
    </body>
</html>
