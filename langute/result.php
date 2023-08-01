<!-- result.php -->
<!DOCTYPE html>
<html>
<head>
    <!-- metaTAGS -->
    <?php include 'metaTAGS.php';?>
    <!-- Title -->
    <title>نمره کاربر</title>
    <!-- quiz CSS -->
    <link rel="stylesheet" href="css/film.css">
</head>
<body>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/quiez.css">
    <div class="container mt-sm-5 my-1">
        <?php
        session_start();
        $score = 0;
        $totalQuestions = $_SESSION['total_questions'] ?? 0;
        if (isset($_SESSION['correct_answers'])) {
            $score = $_SESSION['correct_answers'];

            echo '<div class="py-2 h5">نمره کاربر: ' . $score . ' از ' . $totalQuestions . '</div>';
        } else {
            echo 'هیچ نمره‌ای وجود ندارد.';
        }
        session_unset();
      
        ?>
        <a class="btn btn-primary mt-3" href="test.php">بازگشت به صفحه آزمون</a>
    </div>

    <!-- quiez linksJS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>