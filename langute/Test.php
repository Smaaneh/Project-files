<!DOCTYPE html>
<html class="no-js" lang="fa">
    <head>
		<!-- metaTAGS -->
 <?php include 'metaTAGS.php';?>

		<!-- Title -->
		<title>آزمون</title>

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
						<h2>آزمون ها</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
              <li><a href="#">صفحه ها <i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="#">آزمون</a></li>
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
							<h2> آزمون <span>سایت</span></h2>
							<p>با انتخاب هر بخش ، کوییز بدهید و سطح یادگیری خود را محک بزنید !</p>
							<div class="icon"><i class="fa fa-paper-plane"></i></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Single Event -->
						<div class="single-event">
							<div class="event-image">
								<img src="images\test/Vocabulary.jpg" alt="#">
							</div>
							<div class="event-content">
								<h3 class="event-title"><a href="questions.php?category=vocabulary">کوییز واژگان</a></h3>
								<p>به سوالات چهار گزینه ای پاسخ دهید و ببینید چقدر در لغات انگلیسی مهارت دارید</p>
							</div>
						</div>
						<!-- End Single Event -->
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Single Event -->
						<div class="single-event">
							<div class="event-image">
								<img src="images\test/grammar.jpg" alt="#">
							</div>
							<div class="event-content">
									<h3 class="event-title"><a href="questions.php?category=grammer">کوییز گرامر</a></h3>
								<p>آزمون را شروع کنید و سطح توانایی خود در گرامر را بسنجید</p>
							</div>
						</div>
						<!-- End Single Event -->
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Single Event -->
						<div class="single-event">
							<div class="event-image">
								<img src="images/test/Conversation.jpg" alt="#">
							</div>
							<div class="event-content">
									<h3 class="event-title"><a href="questions.php?category=conversation">کوییز مکالمه</a></h3>
								<p>همین الان کوییز را شروع کنید و در بخش مکالمه سطح یادگیریتان را تست کنید</p>
							</div>
						</div>
						<!-- End Single Event -->
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Single Event -->
						<div class="single-event">
							<div class="event-image">
								<img src="images/test/speak.jpg" alt="#">
							</div>
							<div class="event-content">
									<h3 class="event-title"><a href="questions.php?category=speaking">کوییز گفتار</a></h3>
								<p>آزمون را شروع کنید و سطح توانایی خود در گفتاررا بسنجید</p>
							</div>
						</div>
						<!-- End Single Event -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Events -->
   <!-- foother & js links -->
   <?php include 'foother.php';?>
    </body>
</html>
