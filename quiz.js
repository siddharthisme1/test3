const questions = [
    {
        question: "What is the capital of India?",
        choices: ["Mumbai", "Delhi", "Nagpur", "Aurangabad"],
        answer: "Delhi"
    },
    {
        question: "Which planet is known as the Red Planet?",
        choices: ["Mars", "Venus", "Jupiter", "Saturn"],
        answer: "Mars"
    },
    {
        question: "What is the largest animal?",
        choices: ["Elephant", "Blue Whale", "Giraffe", "Hippopotamus"],
        answer: "Blue Whale"
    }
];

let currentQuestion = 0;
let score = 0;

const questionContainer = document.getElementById("question-container");
const resultContainer = document.getElementById("result-container");
const questionElement = document.getElementById("question");
const choicesElement = document.getElementById("choices");
const submitButton = document.getElementById("submit-btn");

function displayQuestion() {
    const currentQ = questions[currentQuestion];
    questionElement.textContent = currentQ.question;
    choicesElement.innerHTML = "";

    for (const choice of currentQ.choices) {
        const choiceElement = document.createElement("button");
        choiceElement.textContent = choice;
        choiceElement.addEventListener("click", checkAnswer);
        choicesElement.appendChild(choiceElement);
    }
}

function checkAnswer(event) {
    const selectedChoice = event.target.textContent;
    const currentQ = questions[currentQuestion];

    if (selectedChoice === currentQ.answer) {
        score++;
    }

    currentQuestion++;

    if (currentQuestion < questions.length) {
        displayQuestion();
    } else {
        displayResult();
    }
}

function displayResult() {
    questionContainer.style.display = "none";
    resultContainer.style.display = "block";

    const resultText = `You got ${score} out of ${questions.length} questions correct!`;
    const resultElement = document.createElement("h2");
    resultElement.textContent = resultText;
    resultContainer.appendChild(resultElement);
}

function restartQuiz() {
    currentQuestion = 0;
    score = 0;
    resultContainer.style.display = "none";
    questionContainer.style.display = "block";
    displayQuestion();
}

displayQuestion();
