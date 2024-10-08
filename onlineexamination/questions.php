<?php
session_start();
 $to_upload_path = "";
if(isset($_POST))
{
	
	$to_upload_path = "";
	
	if(isset($_FILES) && !empty($_FILES))
	{
		$filename = $_FILES["profile_pic"]["name"];
		$to_upload_path = "uploads/".$filename; 
               // uploads folder must be inside your project root directory
		move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $to_upload_path);

	}
	
/*	
	$servername = "localhost";
	$database = "jatin";
	$username = "root";
	$password = "";

	// Create connection
	$con = new mysqli($servername, $username, $password,$database);


$query = "insert into individual(profile_pic,name)
values('$to_upload_path','$name')";

mysqli_query($con, $query);

*/



// Checking second page values for empty, If it finds any blank field then redirected to second page.
if (isset($_POST['name1'])) {
 if (empty($_POST['name1'])){ 
 $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
 header("location: studentinformation.php"); // Redirecting to second page. 
 } else {
 // Fetching all values posted from second page and storing it in variable.
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
 }
}
}
?>




<!doctype html>
<html lang="en">
  <head><link rel="stylesheet" href="index.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  
  <body>
  
 

<body onload="NextQuestion(0)">


    <main>
        <!-- creating a modal for when quiz ends -->
        <div class="modal-container" id="score-modal">
          
            <div class="modal-content-container" style="height:480px ;width:650px";>
			
			  <h1 id="demo" style="margin-top:50px;">Result </h1>
			  <p style="color:white;">Attempts : 10</p>
				<p style="color:white;">WRONG ANSWERS :<span id="wrong-answers"> </span></p>
				<p style="color:white;">RIGHT ANSWERS :<span id="right-answers"> </span></p>
				<p style="color:white;">GRADE :<span id="grade-percentage"> </span> %</p>
			  
			    <div class="grade-details" >
				
				
				 <form action="userinfo1.php" method="post">
				      <input type="hidden" name="profile_pic" value="<?php echo $to_upload_path; ?>">		
	 				 <input type="hidden" name="wa" id="wrong-answers" /> 
                     <input type="hidden" name="ra" id="right-answers" /> 
					 <input type="hidden" name="gp" id="grade-percentage" /> 
                    <p ><span id="remarks"></span></p>
				  <center>
                   <input name="submit" type="submit" value="Submit" /></center>
					</form>
                </div>
              
              
              
            </div>
        </div>

        <div class="game-quiz-container">
          
            <div class="game-details-container">
               
				
                <h1 style="margin-left:120px;"> Question : <span id="question-number" ></span> / 10</h1>
				 <h1> <span id="player-score"></span> </h1>
				
            </div>

            <div class="game-question-container">
                <h1 id="display-question"></h1>
            </div>

            <div class="game-options-container">
              
               <div class="modal-container" id="option-modal">
                 
                    <div class="modal-content-container">
                         <h1>Please Pick An Option</h1>
                      
                         <div class="modal-button-container">
                            <button onclick="closeOptionModal()">Continue</button>
                        </div>
                      
                    </div>
                 
               </div>
              
                <span>
                    <input type="radio" id="option-one" name="option" class="radio" value="optionA" />
                    <label for="option-one" class="option" id="option-one-label"></label>
                </span>
              

                <span>
                    <input type="radio" id="option-two" name="option" class="radio" value="optionB" />
                    <label for="option-two" class="option" id="option-two-label"></label>
                </span>
              

                <span>
                    <input type="radio" id="option-three" name="option" class="radio" value="optionC" />
                    <label for="option-three" class="option" id="option-three-label"></label>
                </span>
              

                <span>
                    <input type="radio" id="option-four" name="option" class="radio" value="optionD" />
                    <label for="option-four" class="option" id="option-four-label"></label>
                </span>


            </div>
		
			
			
			<div>
                <button onclick="handleNextQuestion()">Next Question</button>
            </div>

        </div>
    </main>
	<script>







const questions = [
    {
        question: "Who is making the Web standards?",
        optionA: "Google",
        optionB: "Mozilla",
        optionC: "Worldwideweb Consortium",
        optionD: "Microsoft",
        correctOption: "optionC"
    },

    {
        question: "How many tags are in a regular element?",
        optionA: "2",
        optionB: "1",
        optionC: "4",
        optionD: "3",
        correctOption: "optionA"
    },

    {
        question: "< br  / > What type of tag is this?",
        optionA: "An opening tag",
        optionB: "Break tag",
        optionC: "A broken one",
        optionD: "None",
        correctOption: "optionB"
    },

    {
        question: "Which of the following property is used to control the scrolling of an image in the background?",
        optionA: "background",
        optionB: "background-attachment",
        optionC: "background-repeat",
        optionD: "background-position",
        correctOption: "optionA"
    },

    {
        question: "Which of the following property is used to set the width of an image border?",
        optionA: "border",
        optionB: "height",
        optionC: "width",
        optionD: "moz-opacity",
        correctOption: "optionA"
    },

    {
        question: "Javascript is an _______ language?",
        optionA: "Object-Oriented",
        optionB: "Object-Based",
        optionC: "Procedural",
        optionD: "None of the above",
        correctOption: "optionA"
    },

    {
        question: "How can a datatype be declared to be a constant type?",
        optionA: "Constant",
        optionB: "var",
        optionC: "let",
        optionD: "Const",
        correctOption: "optionD"
    },


    {
        question: "A Function Associated With An object is Called?",
        optionA: "Function",
        optionB: "method",
        optionC: "Link",
        optionD: "None",
        correctOption: "optionB"
    },

    {
        question: "Who developed Python Programming Language?",
        optionA: "Wick van Rossum",
        optionB: "Rasmus Lerdorf",
        optionC: "Guido van Rossum",
        optionD: "Niene Stom",
        correctOption: "optionC"
    },

    {
        question: "Which of the following is the correct extension of the Python file?",
        optionA: ".python",
        optionB: ".pl",
        optionC: ".py",
        optionD: ".p",
        correctOption: "optionC"
    },

]


let shuffledQuestions = [] //empty array to hold shuffled selected questions

function handleQuestions() { 
    //function to shuffle and push 10 questions to shuffledQuestions array
    while (shuffledQuestions.length <= 9) {
        const random = questions[Math.floor(Math.random() * questions.length)]
        if (!shuffledQuestions.includes(random)) {
            shuffledQuestions.push(random)
        }
    }
}


let questionNumber = 1
let playerScore = 0  
let wrongAttempt = 0 
let indexNumber = 0

// function for displaying next question in the array to dom
function NextQuestion(index) {
    handleQuestions()
    const currentQuestion = shuffledQuestions[index]
    document.getElementById("question-number").innerHTML = questionNumber
    //document.getElementById("player-score").innerHTML = playerScore
    document.getElementById("display-question").innerHTML = currentQuestion.question;
    document.getElementById("option-one-label").innerHTML = currentQuestion.optionA;
    document.getElementById("option-two-label").innerHTML = currentQuestion.optionB;
    document.getElementById("option-three-label").innerHTML = currentQuestion.optionC;
    document.getElementById("option-four-label").innerHTML = currentQuestion.optionD;
	
    
}


function checkForAnswer() {
    const currentQuestion = shuffledQuestions[indexNumber] //gets current Question 
    const currentQuestionAnswer = currentQuestion.correctOption //gets current Question's answer
    const options = document.getElementsByName("option"); //gets all elements in dom with name of 'option' (in this the radio inputs)
    let correctOption = null

    options.forEach((option) => {
        if (option.value === currentQuestionAnswer) {
            //get's correct's radio input with correct answer
            correctOption = option.labels[0].id
        }
    })
   
    //checking to make sure a radio input has been checked or an option being chosen
    if (options[0].checked === false && options[1].checked === false && options[2].checked === false && options[3].checked == false) {
        document.getElementById('option-modal').style.display = "flex"
    }

    //checking if checked radio button is same as answer
    options.forEach((option) => {
        if (option.checked === true && option.value === currentQuestionAnswer) {
            document.getElementById(correctOption).style.backgroundColor = ""
            playerScore++
            indexNumber++
            //set to delay question number till when next question loads
            setTimeout(() => {
                questionNumber++
            }, 1000)
        }

        else if (option.checked && option.value !== currentQuestionAnswer) {
            const wrongLabelId = option.labels[0].id
            document.getElementById(wrongLabelId).style.backgroundColor = ""
            document.getElementById(correctOption).style.backgroundColor = ""
            wrongAttempt++
            indexNumber++
			
            //set to delay question number till when next question loads
            setTimeout(() => {
                questionNumber++
            }, 1000)
        }
		document.getElementsByName('ra')[0].value = playerScore;
    })
	 document.getElementsByName('wa')[0].value = wrongAttempt;
	
	
}



//called when the next button is called
function handleNextQuestion() {
    checkForAnswer()
    unCheckRadioButtons()
    //delays next question displaying for a second
    setTimeout(() => {
        if (indexNumber <= 9) {
            NextQuestion(indexNumber)
        }
        else {
            handleEndGame()
        }
        resetOptionBackground()
    }, 1000);
}

//sets options background back to null after display the right/wrong colors
function resetOptionBackground() {
    const options = document.getElementsByName("option");
    options.forEach((option) => {
        document.getElementById(option.labels[0].id).style.backgroundColor = ""
    })
}

// unchecking all radio buttons for next question(can be done with map or foreach loop also)
function unCheckRadioButtons() {
    const options = document.getElementsByName("option");
    for (let i = 0; i < options.length; i++) {
        options[i].checked = false;
    }
}

// function for when all questions being answered
function handleEndGame() {
    let remark = null
    let remarkColor = null

    // condition check for player remark and remark color
    if (playerScore <= 3) {
        remark = "Bad Grades, Keep Practicing."
        remarkColor = "red"
    }
    else if (playerScore >= 4 && playerScore < 7) {
        remark = "Average Grades, You can do better."
        remarkColor = "orange"
    }
    else if (playerScore >= 7) {
        remark = "Excellent, Keep the good work going."
        remarkColor = "green"
    }
    const playerGrade = (playerScore / 10) * 100
	document.getElementsByName('gp')[0].value = playerGrade;

    //data to display to score board
    document.getElementById('remarks').innerHTML = remark
    document.getElementById('remarks').style.color = remarkColor
    document.getElementById('grade-percentage').innerHTML = playerGrade
    document.getElementById('wrong-answers').innerHTML = wrongAttempt
    document.getElementById('right-answers').innerHTML = playerScore
    document.getElementById('score-modal').style.display = "flex"
   
}

//closes score modal and resets game
function closeScoreModal() {
    questionNumber = 1
    playerScore = 0
    wrongAttempt = 0
    indexNumber = 0
    shuffledQuestions = []
    NextQuestion(indexNumber)
    document.getElementById('score-modal').style.display = "none"
	
}

//function to close warning modal
function closeOptionModal() {
    document.getElementById('option-modal').style.display = "none"
}


</script>
    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
	 
   
   
  </body>
 
</html>




 




