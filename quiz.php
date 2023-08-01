<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Let's Test Basic Knowledge</h1>
        <div id="question-container">
            <h2 id="question"></h2>
            <div id="choices">
             
            </div>
            <!-- <button id="submit-btn">Submit</button> -->
        </div>
        <div id="result-container">
           
            <div id="result"></div>
            <button id="try-again-btn" onclick="restartQuiz()">Try Again</button>
        </div>
    </div>
    <script src="quiz.js"></script>
</body>
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f2f2f2;
}

.container {
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 8px;
    width: 600px;
}

h1, h2 {
    text-align: center;
}

#choices {
    display: flex;
    flex-direction: column;
    margin: 10px 0;
    margin-top : 30px;
}

button {
    padding: 10px 20px;
    background-color: #00aaff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top : 30px;
}

button:hover {
    background-color: #0077cc;
}

#result-container {
    display: none;
}

#result-container h2 {
    margin-bottom: 10px;
}

</style>