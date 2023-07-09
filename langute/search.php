<?php
$searchWords = $_POST["search"];
$searchWords = explode(" ", $searchWords);

// فهرست درس‌ها
$lessons = array(
    "word1.php" => "درس یک واژگان",
    "word2.php" => "درس دو واژگان",
    "word3.php" => "درس سه واژگان",
    "word4.php" => "درس چهار واژگان",
    "grammer1.php" => "درس یک گرامر",
    "grammer2.php" => "درس دو گرامر",
    "grammer3.php" => "درس سه گرامر",
    "grammer4.php" => "درس چهار گرامر",
    "conversation1.php" => "درس یک مکالمه",
    "conversation2.php" => "درس دو مکالمه",
    "conversation3.php" => "درس سه مکالمه",
    "conversation4.php" => "درس چهار مکالمه",
    "speak1.php" => "درس یک گفتار",
    "speak2.php" => "درس دو گفتار",
    "speak3.php" => "درس سه گفتار",
    "speak4.php" => "درس چهار گفتار"
);

// جستجو و نمایش نتایج
$searchResults = array();
foreach ($lessons as $url => $title) {
    $found = true;
    foreach ($searchWords as $word) {
        if (stripos($title, $word) === false) {
            $found = false;
            break;
        }
    }
    if ($found) {
        $searchResults[$url] = $title;
    }
}

if (!empty($searchResults)) {
    echo "<ul>";
    foreach ($searchResults as $url => $title) {
        echo "<li><a href='$url'>$title</a></li>";
    }
    echo "</ul>";
} else {
    echo "نتیجه‌ای یافت نشد.";
}
?>