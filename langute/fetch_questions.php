<?php
// Replace these credentials with your actual database credentials
$host = "localhost";
$username = "root";
$password = "123";
$database = "langute";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Assuming the category is "grammer"
  $category = "grammer";
  // Fetch questions and options from the database
  $stmt = $conn->prepare("SELECT * FROM questions WHERE category = :category");
  $stmt->bindParam(":category", $category);
  $stmt->execute();
  $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $quizArray = [];
  foreach ($questions as $question) {
    $stmt = $conn->prepare("SELECT * FROM options WHERE question_id = :question_id");
    $stmt->bindParam(":question_id", $question['question_id']);
    $stmt->execute();
    $options = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $question['options'] = $options;
    $quizArray[] = $question;
  }

  echo json_encode($quizArray);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}