<!DOCTYPE html>
<html>
<head>
    <!-- metaTAGS -->
    <?php include 'metaTAGS.php';?>
    <!-- Title -->
    <?php
    $category = $_GET['category'] ?? '';
    $title = 'سوالات ';
    if ($category) {
        $title .= '(' . $category . ')';
    }
    ?>
    <title><?php echo $title; ?></title>
    <!-- quiz CSS -->
    <link rel="stylesheet" href="css/film.css">
</head>
<body>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/quiez.css">
    <div class="container mt-sm-5 my-1">
        <?php
        // تابع برای اتصال به دیتابیس
        function connect_db() {
            $servername = "localhost";
            $username = "root";
            $password = "123";
            $dbname = "langute";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
            }
            return $conn;
        }

        // تابع برای خواندن سوالات بر اساس دسته بندی
        function get_questions_by_category($conn, $category) {
            $sql = "SELECT * FROM questions WHERE category = '$category'";
            $result = $conn->query($sql);
            return $result;
        }

        // تابع برای خواندن گزینه‌های یک سوال
        function get_options_by_question_id($conn, $question_id) {
            $sql = "SELECT * FROM options WHERE question_id = $question_id";
            $result = $conn->query($sql);
            return $result;
        }

        $conn = connect_db();

        if ($category) {
            $questions = get_questions_by_category($conn, $category);
            $totalQuestions = $questions->num_rows;
            if ($totalQuestions > 0) {
                $currentQuestion = 1;
                if (isset($_GET['q'])) {
                    $currentQuestion = intval($_GET['q']);
                }
                if ($currentQuestion <= 0 || $currentQuestion > $totalQuestions) {
                    $currentQuestion = 1;
                }

                $questions->data_seek($currentQuestion - 1);
                $row = $questions->fetch_assoc();
                $question_id = $row['question_id'];
                $question_title = $row['question_title'];
                echo '<div class="question ml-sm-5 pl-sm-5 pt-2">';
                echo '<div class="py-2 h5"><b>Q. '.$question_title.'</b></div>';
                $options = get_options_by_question_id($conn, $question_id);
                if ($options->num_rows > 0) {
                    echo '<div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">';
                    while ($option = $options->fetch_assoc()) {
                        echo '<label class="options">'.$option['option_text'];
                        echo '<input type="radio" name="question_'.$question_id.'" value="'.$option['correct_option'].'">';
                        echo '<span class="checkmark"></span></label>';
                    }
                    echo '</div>';
                }
                echo '</div>';
                echo '<div class="d-flex align-items-center pt-3">';
                if ($currentQuestion > 1) {
                    echo '<div id="prev">';
                    echo '<a class="btn btn-primary" href="?category='.$category.'&q='.($currentQuestion - 1).'">Previous</a>';
                    echo '</div>';
                }
                if ($currentQuestion < $totalQuestions) {
                    echo '<div class="ml-auto mr-sm-5">';
                    echo '<a class="btn btn-success" href="?category='.$category.'&q='.($currentQuestion + 1).'">Next</a>';
                    echo '</div>';
                } else {
                    echo '<div class="ml-auto mr-sm-5">';
                    echo '<a class="btn btn-success" href="#">دیدن نمره</a>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo 'هیچ سوالی برای این دسته بندی وجود ندارد.';
            }
        }
        $conn->close();
        ?>
    </div>

    <!-- quiez linksJS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // کد JS برای ارسال فرم و محاسبه نمره
            $('a[href="#"]').on('click', function(e) {
                e.preventDefault();
                var totalQuestions = <?php echo $totalQuestions; ?>;
                var correctAnswers = 0;
                for (var i = 1; i <= totalQuestions; i++) {
                    var selectedOption = $("input[name='question_" + i + "']:checked").val();
                    if (selectedOption == 1) {
                        correctAnswers++;
                    }
                }
                var score = correctAnswers + ' out of ' + totalQuestions;
                alert('نمره شما: ' + score);
            });
        });
    </script>
</body>
</html>