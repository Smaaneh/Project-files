<!-- questions.php -->
<!DOCTYPE html>
<html>
<head>
    <!-- metaTAGS -->
    <?php include 'metaTAGS.php';?>
    <!-- Title -->
    <title>سوالات</title>
    <!-- quiz CSS -->
    <link rel="stylesheet" href="css/film.css">
</head>
<body>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/quiez.css">
    <div class="container mt-sm-5 my-1">
        <?php
        session_start();
        $_SESSION['correct_answers'] = 0; // مقداردهی اولیه به متغیر correct_answers
        $servername = "localhost";
        $username = "root";
        $password = "123";
        $dbname = "langute";
        
        // اتصال به دیتابیس
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // بررسی اتصال
        if ($conn->connect_error) {
            die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
        }

        $category = $_GET['category'] ?? '';
        $currentQuestion = $_GET['q'] ?? 1;

        $sql = "SELECT COUNT(*) AS total FROM questions WHERE category = '$category'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalQuestions = $row['total'];
        $_SESSION['total_questions'] = $totalQuestions;

        $sql = "SELECT * FROM questions WHERE category = '$category' ORDER BY RAND() LIMIT 1 OFFSET " . ($currentQuestion - 1);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $question_id = $row['question_id'];
            $question_title = $row['question_title'];
        } else {
            echo 'هیچ سوالی در این دسته‌بندی وجود ندارد.';
        }

      
if (isset($_POST['submit'])) {
    $selectedOption = $_POST['option'];
    $sql = "SELECT correct_option FROM options WHERE question_id = $question_id AND correct_option = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 && $selectedOption == 'correct') {
        $_SESSION['correct_answers']++;
    }
}

// ذخیره انتخابات کاربر در جلسه
$_SESSION['questions'][$currentQuestion] = $_POST['option'] ?? null;


        if ($currentQuestion <= $totalQuestions) {
            echo '<div class="question ml-sm-5 pl-sm-5 pt-2">';
            echo '<div class="py-2 h5"><b>Q. ' . $question_title . '</b></div>';
            echo '<form method="post">';
            $sql = "SELECT * FROM options WHERE question_id = $question_id ORDER BY RAND()";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">';
                    echo '<label class="options">' . $row['option_text'];
                    echo '<input type="radio" name="option" value="' . ($row['correct_option'] == 1 ? 'correct' : 'incorrect') . '">';
                    echo '<span class="checkmark"></span>';
                    echo '</label>';
                    echo '</div>';
                }
            }
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
                echo '<a class="btn btn-success" href="result.php">دیدن نمره</a>';
                echo '</div>';
                $_SESSION['total_questions'] = $totalQuestions;
            }
            echo '</div>';
            echo '</form>';
            echo '</div>';
        } else {
            echo 'هیچ سوالی در این دسته‌بندی وجود ندارد.';
        }

        $conn->close();
        ?>
    </div>

    <!-- quiez linksJS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>