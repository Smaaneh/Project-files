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
            if ($questions->num_rows > 0) {
                while ($row = $questions->fetch_assoc()) {
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
                }
            } else {
                echo 'هیچ سوالی برای این دسته بندی وجود ندارد.';
            }
        }
        $conn->close();
        ?>
        <div class="d-flex align-items-center pt-3">
            <div id="prev">
                <button class="btn btn-primary">Previous</button>
            </div>
            <div class="ml-auto mr-sm-5">
                <button class="btn btn-success" id="submit">Next</button>
            </div>
        </div>
    </div>

    <!-- quiez linksJS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // کد JS برای ارسال فرم و محاسبه نمره
            $('#submit').on('click', function() {
                var totalQuestions = <?php echo $questions->num_rows; ?>;
                var correctAnswers = 0;
                for (var i = 1; i <= totalQuestions; i++) {
                    var selectedOption = $("input[name='question_" + i + "']:checked").val();
                    if (selectedOption == 1) {
                        correctAnswers++;
                    }
                }
                var score = correctAnswers+ ' out of ' + totalQuestions;
                alert('نمره شما: ' + score);
            });
        });
    </script>
</body>
</html>