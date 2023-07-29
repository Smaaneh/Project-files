<?php
// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "langute";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// بررسی وجود پارامتر id در URL
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $articleId = $_GET["id"];

    // خواندن اطلاعات مقاله با آیدی مورد نظر از دیتابیس
    $sql = "SELECT * FROM articles WHERE id = $articleId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $articleTitle = $row["title"];
        $articleContent = $row["content"];
        $articlePicture = $row["pictures"];
        $articleDate = $row["created_at"];

        // نمایش اطلاعات مقاله
        echo '<h2>' . $articleTitle . '</h2>';
        echo '<img src="' . $articlePicture . '" alt="' . $articleTitle . '">';
        echo '<p>' . $articleContent . '</p>';
        echo '<p>Date: ' . $articleDate . '</p>';
    } else {
        echo "Article not found.";
    }
} else {
    echo "Invalid article ID.";
}

$conn->close();
?>