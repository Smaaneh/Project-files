// Global variables
let quizArray = []; // An array to store fetched questions from the database
let questionCount = 0; // Index to keep track of the current question
let scoreCount = 0; // Variable to keep track of the user's score
let count = 11; // Timer countdown variable
let countdown; // Variable to store the countdown interval

// DOM elements
const startButton = document.getElementById("start-button");
const startScreen = document.querySelector(".start-screen");
const displayContainer = document.getElementById("display-container");
const countOfQuestion = document.querySelector(".number-of-question");
const timeLeft = document.querySelector(".time-left");
const quizContainer = document.getElementById("container");
const nextButton = document.getElementById("next-button");
const restartButton = document.getElementById("restart");

// Function to fetch questions from the database using fetch API
async function fetchQuestions() {
  try {
    const response = await fetch("fetch_questions.php");
    const data = await response.json();
    quizArray = data;
    initial();
  } catch (error) {
    console.error("Error fetching questions:", error);
  }
}

// Timer
const timerDisplay = () => {
  countdown = setInterval(() => {
    count--;
    timeLeft.innerHTML = '${count}s';
     if (count == 0) {
      clearInterval(countdown);
      displayNext();
    }
  }, 1000);
};

// Display quiz
const quizDisplay = (questionCount) => {
  let quizCards = document.querySelectorAll(".container-mid");
  // Hide other cards
  quizCards.forEach((card) => {
    card.classList.add("hide");
  });
  // Display current question card
  quizCards[questionCount].classList.remove("hide");
};

// Quiz card creation
let div = document.createElement("div");
div.classList.add("container-mid", "hide");

// Question number
countOfQuestion.innerHTML ='${questionCount + 1} of ${quizArray.length} Question' ;

// Question
let question_DIV = document.createElement("p");
question_DIV.classList.add("question");
question_DIV.innerHTML = i.question_title;
div.appendChild(question_DIV);

// Options
for (let option of i.options) {
  let button = document.createElement("button");
  button.classList.add("option-div");
  button.innerText = option.option_text;
  button.onclick = function () {
    checker(this);
  };
  div.appendChild(button);
}

quizContainer.appendChild(div);

// Checker Function to check if the option is correct or not
function checker(userOption) {
  let userSolution = userOption.innerText;
  let question = document.getElementsByClassName("container-mid")[questionCount];
  let options = question.querySelectorAll(".option-div");

  // If the user clicked the correct option
  if (userSolution === quizArray[questionCount].correct_option) {
    userOption.classList.add("correct");
    scoreCount++;
  } else {
    userOption.classList.add("incorrect");
    // Mark the correct option
    options.forEach((element) => {
      if (element.innerText === quizArray[questionCount].correct_option) {
        element.classList.add("correct");
      }
    });
  }

  // Clear interval (stop the timer)
  clearInterval(countdown);
  // Disable all options
  options.forEach((element) => {
    element.disabled = true;
  });
}

// Initial setup
function initial() {
  quizContainer.innerHTML = "";
  questionCount = 0;
  scoreCount = 0;
  count = 11;
  clearInterval(countdown);
  timerDisplay();
  quizCreator();
  quizDisplay(questionCount);
}

// Function to handle next button click
function handleNextButtonClick() {
  displayNext();
}
// Function to handle restart button click
function handleRestartButtonClick() {
  restartQuiz();
}

// Event listener for start button click
startButton.addEventListener("click", () => {
  startScreen.classList.add("hide");
  displayContainer.classList.remove("hide");
  fetchQuestions();
});

// Event listener for next button click
nextButton.addEventListener("click", handleNextButtonClick);

// Event listener for restart button click
restartButton.addEventListener("click", handleRestartButtonClick);

// Hide quiz and display the start screen
window.onload = () => {
  startScreen.classList.remove("hide");
  displayContainer.classList.add("hide");
};