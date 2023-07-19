<!doctype html>
<html lang="en">

<head>
<!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Site keywords here">
<meta name="description" content="">
<meta name='copyright' content=''>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Title -->
<title>test</title>
<link rel="stylesheet" href="css/styleTest.css">
<script src="fetch_questions.php"></script>
</head>
<body>
    <!-- Further code here -->
    <div class="start-screen">
        <button id="start-button">Start</button>
    </div>
    <div id="display-container">
        <div class="header">
            <div class="number-of-count">
                <span class="number-of-question">1 of 3 questions</span>
            </div>
            <div class="timer-div">
                <img src="https://uxwing.com/wp-content/themes/uxwing/download/time-and-date/stopwatch-icon.png"
                    width="20px" />
                <span class="time-left">10s</span>
            </div>
        </div>
        <div id="container">
            <!-- questions and options will be displayed here -->
        </div>
        <button id="next-button">Next</button>
    </div>
    <div class="score-container hide">
        <div id="user-score">Demo Score</div>
        <button id="restart">Restart</button>
    </div>
    <script src="js/scriptTest.js"></script>
</body>

</html>
