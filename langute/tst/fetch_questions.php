<?php
// Database configuration
$servername = "localhost"; // آدرس سرور دیتابیس
$username = "root"; // نام کاربری دیتابیس
$password = "123"; // رمز عبور دیتابیس
$dbname = "langute"; // نام دیتابیس

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch questions and options from the database
$sql = "SELECT q.question_id, q.question_title, q.correct_option, o.option_id, o.option_text
        FROM questions q
        INNER JOIN options o ON q.question_id = o.question_id";
$result = $conn->query($sql);

// Array to store questions and options
$quizArray = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $question_id = $row['question_id'];
        $question_title = $row['question_title'];
        $correct_option = $row['correct_option'];
        $option_id = $row['option_id'];
        $option_text = $row['option_text'];

        // Check if the question already exists in the array
        if (!isset($quizArray[$question_id])) {
            // If not, create a new question array
            $quizArray[$question_id] = array(
                'question_title' => $question_title,
                'correct_option' => $correct_option,
                'options' => array()
            );
        }

        // Add the option to the question array
        $quizArray[$question_id]['options'][] = array(
            'option_id' => $option_id,
            'option_text' => $option_text
        );
    }
}

// Close the database connection
$conn->close();

// Convert the quiz array to JSON and return it
header('Content-Type: application/json');
echo json_encode(array_values($quizArray));
?>