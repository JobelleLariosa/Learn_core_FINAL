<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: LearnCore_Login_V2.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mathematics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

     <!-- google font cdn link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt&display=swap" rel="stylesheet">

    <!-- import jqueryy and bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    
    <link rel="website icon" type="png" href="img/LearnCore3.png" id="logo1" style="border-radius: 100%;">

    <style>
        .Maincontainer {
            background-image: url(img/backgroundlearn_core.png);
            min-height: 100vh;
            justify-items: center;
        }

        :root {
            --gradient: linear-gradient(90deg, #806905dc, #d4902a);
        }

        * {
            font-family: 'Rokkitt', serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border: none;
            text-decoration: none;
            transition: all linear;
        }

        *::selection {
            background: #ebb70c;
            color: #fff12cec;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }

        html::-webkit-scrollbar {
            width: 1.5rem;
        }

        html::-webkit-scrollbar-track {
            background: #ebcf32d7;
        }

        html::-webkit-scrollbar-thumb {
            background: linear-gradient(#ffd382e7, #e6b531);
        }

        .wrapper {
            padding-top: 100px;
            padding-bottom: 100px;
            justify-content: center;
            justify-items: center;
            text-align: center;
        }

        .selection-img {
            width: 50%;
        }

        .selection-img2 {
            width: 100%;
        }

        .card-img-container {
            text-align: center;
            padding-top: 10px;
            border-radius: 100%;
        }

        .card-shadow {
            box-shadow: 0px 8px 20px 0px rgb(0 0 0 / 15%);
            border-radius: 2rem;
        }

        .row {
            padding-bottom: 20px;
            row-gap: 20px;
        }

        .card-text {
            text-align: left;
            font-size: 17px;
        }

        .card-title {
            text-align: left;
            justify-content: center;
            font-size: 25px;
        }

        .logo {
            border-radius: 100%;
        }

        .Subjects {
            font-size: 10px;
            color: black;
            border-radius: 100%;
        }

        .image {
            border-radius: 30%;
        }

        .card-img-container {
            border-radius: 100%;
        }

        header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 1.5rem 7%;
            background-image: url(img/backgroundlearn_core.png);
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: 0 0.1rem 0.3rem rgba(0, 0, 0, 0.4);
        }

        .logo-link {
            display: block;
        }

        .logo {
            border-radius: 50%;
        }

        .navigation ul {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navigation ul li {
            margin: 0 1rem;
        }

        .navigation ul li a {
            font-size: 2rem;
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navigation ul li a:hover {
            color: #802409;
        }

        .card-img-top-selection-img {
            text-align: center;
            padding-top: 10px;
            border-radius: 100%;
        }

        body {
            -webkit-text-size-adjust: 50%;
            background-image: url(img/backgroundpic.webp);
        }

        .quiz-container {
            background: aliceblue;
            box-shadow: 0 0 20px 2px rgb(100, 100, 100, 1.5rem);
            width: 450px;
        }

        .quiz-header {
            padding: 4rem;
        }

        h2 {
            padding: 1rem;
            text-align: center;
            margin: 0;
            font-size: 35px;
        }

       
        button {
            background: #0c22eb;
            color: #ffff;
            border: none;
            display: block;
            width: 50%;
            cursor: pointer;
            font-size: 1.3rem;
            padding: 1.1rem;
        }

       .card-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 15px;
        }

        .image-materials {
            height: 215px;
            width: 100%;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .btn-primary {
            font-size: 18px;
        }

        .ml-3 {
            margin-left: 15px;
            font-size: 75px;
            font-weight: bold;
        }

        .content-container {
            margin-top: 50px;
            margin-bottom: 20px;
        }
    </style>

    <script>

        $(document).ready(function(Addname){
            $('#div-addition').hide();
            $('#div-subtraction').hide();
            $('#div-multiplication').hide();
            $('#div-division').hide();
            $('#div-factorial').hide()
            $('#div-Pemdas').hide();
    });

    function Addname(){
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const name = urlParams.get('name');

        if (name !== null) {
            document.getElementById('welcomeName').innerHTML = "Welcome " + name + "! Please select a topic to learn.";
            document.getElementById('modalTitle').innerHTML = "Hi " + name + "!";
        }
    }
    

    function showDiv(name){
        if (name=="Addition"){
            $('#div-addition').slideToggle(1500);
            $('#main-menu').hide();
            $('#div-subtraction').hide();
            $('#div-multiplication').hide();
            $('#div-division').hide();
            $('#div-compare').hide()
            $('#div-multip').hide();
        }

        if (name=="Subtraction"){
            $('#div-subtraction').slideToggle(1500);
            $('#div-addition').hide();
            $('#main-menu').hide();
            $('#div-multiplication').hide();
            $('#div-division').hide();
            $('#div-compare').hide()
            $('#div-multip').hide();
        }

        if (name=="Multiplication"){
            $('#div-multiplication').slideToggle(1500);
            $('#div-addition').hide();
            $('#div-subtraction').hide();
            $('#main-menu').hide();
            $('#div-division').hide();
            $('#div-compare').hide()
            $('#div-multip').hide();
        }

        if (name=="Division"){
            $('#div-division').slideToggle(1500);
            $('#div-addition').hide();
            $('#div-subtraction').hide();
            $('#main-menu').hide();
            $('#div-multiplication').hide();
            $('#div-compare').hide()
            $('#div-multip').hide();
        }

        if (name=="CompNum"){
            $('#div-compare').slideToggle(1500);
            $('#div-addition').hide();
            $('#div-subtraction').hide();
            $('#main-menu').hide();
            $('#div-multiplication').hide();
            $('#div-multip').hide();
            $('#div-division').hide();
        }

        if (name=="MultiplicationTabs"){
            $('#div-multip').slideToggle(1500);
            $('#div-addition').hide();
            $('#div-subtraction').hide();
            $('#main-menu').hide();
            $('#div-multiplication').hide();
            $('#div-compare').hide();
            $('#div-division').hide();
        }

        if (name=="Menu"){
            $('#main-menu').slideToggle(1500);
            $('#div-addition').hide();
            $('#div-subtraction').hide();
            $('#div-multiplication').hide();
            $('#div-division').hide();
            $('#div-compare').hide()
            $('#div-multip').hide(); 
            $('#LectureAdd').hide();
            $('#VideosAdd').hide();
            $('#QuizAdd').hide();
            $('#LectureSub').hide();
            $('#QuizSub').hide();
            $('#VideosSub').hide();
            $('#LectureMul').hide();
            $('#QuizMul').hide();
            $('#VideosMul').hide();
            $('#LectureDiv').hide();
            $('#VideosDiv').hide();
            $('#QuizDiv').hide();
            $('#LectureCompare').hide();
            $('#VideosCompare').hide();
            $('#QuizCompare').hide();
            $('#QuizMultip').hide();
            $('#LectureMultip').hide();
            $('#VideosMultip').hide();

        }
    }

        function LectureComAddition(name){

            if (name == "LecMaterialsAdd"){
                $('#LectureAdd').slideToggle(1500);
                $('#VideosAdd').hide();
                $('#QuizAdd').hide();
                $('#div-addition').hide();
                $('#main-menu').hide();
            }
            if (name == "LecVideosAdd"){
                $('#VideosAdd').slideToggle(1500);
                $('#LectureAdd').hide();
                $('#QuizAdd').hide();
                $('#div-addition').hide();
            }

            if (name == "FunQuizAdd"){
                $('#QuizAdd').slideToggle(1500);
                $('#LectureAdd').hide();
                $('#VideosAdd').hide();
                $('#div-addition').hide();
            }

            if(name == "Menu1"){
                $('#div-addition').slideToggle(1500);
                $('#LectureAdd').hide();
                $('#VideosAdd').hide();
                $('#QuizAdd').hide();
                $('#hidden').hide();

            }


    }

            function LectureComSubration(name){
            if (name == "LecMaterialsSub"){
                $('#LectureSub').slideToggle(1500);
                $('#VideosSub').hide();
                $('#QuizSub').hide();
                $('#div-subtraction').hide();

            }

            if (name == "LecVideosSub"){
                $('#VideosSub').slideToggle(1500);
                $('#LectureSub').hide();
                $('#QuizSub').hide();
                $('#div-subtraction').hide();
            }

            if (name == "FunQuizSub"){
                $('#QuizSub').slideToggle(1500);
                $('#LectureSub').hide();
                $('#VideosSub').hide();
                $('#div-subtraction').hide();
            }

            if(name == "Menu2"){
                $('#div-subtraction').slideToggle(1500);
                $('#LectureSub').hide();
                $('#VideosSub').hide();
                $('#QuizSub').hide();
                $('#hidden').hide();

            }
            }

        function LectureComMultiplication(name){

            if (name == "LecMaterialsMul"){
                $('#LectureMul').slideToggle(1500);
                $('#VideosMul').hide();
                $('#QuizSubMul').hide();
                $('#div-multiplication').hide();

            }

            if (name == "LecVideosMul"){
                $('#VideosMul').slideToggle(1500);
                $('#LectureMul').hide();
                $('#QuizMul').hide();
                $('#div-multiplication').hide();
            }

            if (name == "FunQuizMul"){
                $('#QuizMul').slideToggle(1500);
                $('#LectureMul').hide();
                $('#VideosMul').hide();
                $('#div-multiplication').hide();
            }

            if(name == "Menu3"){
                $('#div-multiplication').slideToggle(1500);
                $('#LectureMul').hide();
                $('#VideosMul').hide();
                $('#QuizMul').hide();
                $('#hidden').hide();
            }
        }

        function LectureComDivision(name){
            if (name == "LecMaterialsDiv"){
                $('#LectureDiv').slideToggle(1500);
                $('#VideosDiv').hide();
                $('#QuizDiv').hide();
                $('#div-division').hide();

            }

            if (name == "LecVideosDiv"){
                $('#VideosDiv').slideToggle(1500);
                $('#LectureDiv').hide();
                $('#QuizDiv').hide();
                $('#div-division').hide();
            }

            if (name == "FunQuizDiv"){
                $('#QuizDiv').slideToggle(1500);
                $('#LectureDiv').hide();
                $('#VideosDiv').hide();
                $('#div-division').hide();

            }

            if(name == "Menu4"){
                $('#div-division').slideToggle(1500);
                $('#LectureDiv').hide();
                $('#VideosDiv').hide();
                $('#QuizDiv').hide();
                $('#hidden').hide();
            }
        }

        function LectureComCompare(name){
            if (name == "LecMaterialsCompare"){
                $('#LectureCompare').slideToggle(1500);
                $('#VideosCompare').hide();
                $('#QuizCompare').hide();
                $('#div-compare').hide();
            }

            if (name == "LecVideosCompare"){
                $('#VideosCompare').slideToggle(1500);
                $('#LectureCompare').hide();
                $('#QuizCompare').hide();
                $('#div-compare').hide();
            }

            if (name == "FunQuizCompare"){
                $('#QuizCompare').slideToggle(1500);
                $('#LectureCompare').hide();
                $('#VideosCompare').hide();
                $('#div-compare').hide();
            }

            if(name == "Menu5"){
                $('#div-compare').slideToggle(1500);
                $('#LectureCompare').hide();
                $('#VideosCompare').hide();
                $('#QuizCompare').hide();
                $('#hidden').hide();
            }
        }

        function LectureComMultip(name){
            if (name == "LecMaterialsMultip"){
                $('#LectureMultip').slideToggle(1500);
                $('#VideosMultip').hide();
                $('#QuizMultip').hide();
                $('#div-multip').hide();

            }

            if (name == "LecVideosMultip"){
                $('#VideosMultip').slideToggle(1500);
                $('#LectureMultip').hide();
                $('#QuizMultip').hide();
                $('#div-multip').hide();
            }

            if (name == "FunQuizMultip"){
                $('#QuizMultip').slideToggle(1500);
                $('#LectureMultip').hide();
                $('#VideosMultip').hide();
                $('#div-multip').hide();
            }

            if(name == "Menu6"){
                $('#div-multip').slideToggle(1500);
                $('#LectureMultip').hide();
                $('#VideosMultip').hide();
                $('#QuizMultip').hide();
                $('#hidden').hide();
            }
        }

</script>

   </head>
   <body onload="Addname()">
     <!---Header starts-->
     <div class = "Maincontainer">
        <header>
            <a href="LearnCore_Homepage.html" class="logo-link">
                <img src="img/LearnCore3.png" width="100" height="100" alt="LearnCore Logo" class="logo">
            </a>
            <nav class="navigation">
                <ul>
                    <li><a href="mathematics_2.php">Home</a></li>
                    <li><a href="aboutus.html">About</a></li>
                    <li><a href="homepage_loginpage.html">Sign Out</a></li>
                </ul>
            </nav>
        </header>
        
        <div class="mainContainer">
            <div class="container wrapper">
              <div class="content-container">
                <div class="col-sm-12">
                    <div class="card card-shadow">
                        <div class="card-img-container"></div>
                        <div class="card-body">
                          <h4 class="card-title"><a href="welcome.html"><img style="height:100px;" src="img/math1.jpg" alt="Card image" class="logo"></a>
                          <b>Enjoy, learning Mathematics <?php echo htmlspecialchars($_SESSION['name']); ?>!</b>                       
                        </div>
                    </div>
                </div>
              </div>
                <div class="row" id="main-menu">
                  <div class="col-sm-3">
                      <div class="card card-shadow">
                          <div class="card-img-container"><img  class="card-img-top selection-img" src="img/Addition1.jpg" alt="Card image"></div>
                          <div class="card-body">
                            <h4 class="card-title"><b>Addition</b></h4>
                            <p class="card-text">Enjoy Learning Addition.</p>
                            <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="showDiv('Addition');">Start Learning</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="card card-shadow">
                          <div class="card-img-container"><img class="card-img-top selection-img" src="img/subtraction1.jpg" alt="Card image"></div>
                          <div class="card-body">
                            <h4 class="card-title"><b>Subtraction</b></h4>
                            <p class="card-text">Enjoy Learning Subtraction</p>
                            <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="showDiv('Subtraction');">Start Learning</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="card card-shadow">
                          <div class="card-img-container"><img class="card-img-top selection-img" src="img/multipllication.png" alt="Card image"></div>
                          <div class="card-body">
                            <h4 class="card-title"><b>Multiplication</b></h4>
                            <p class="card-text">Enjoy Learning Multiplication.</p>
                            <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="showDiv('Multiplication');">Start Learning</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="card card-shadow">
                          <div class="card-img-container"><img class="card-img-top selection-img" src="img/division.webp" alt="Card image"></div>
                          <div class="card-body">
                            <h4 class="card-title"><b>Division</b></h4>
                            <p class="card-text">Enjoy Learning Division.</p>
                            <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="showDiv('Division');">Start Learning</a>
                          </div>
                      </div>
                  </div>

               <div style="text-align:right;">
                 <a href="homepage_xample.php" class="btn btn-primary btn-lg" style="font-size: 18px;">Back</a></div>
               </div>

                <div class="row" id="div-addition" style="display:none;">
                    <div class="col-sm-12">
                        <div class="card card-shadow">
                            <div class="card-body" id="lecture">
                                <div class="d-flex align-items-center">
                                    <div class="card-img-container">
                                        <img style="height:75px;" src="img/Addition1.jpg" alt="Card image">
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="card-title"><b>Addition</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class = "col-sm-4">
                            <div class="card card-shadow">
                                 <div class="card-img-container">
                                     <img src="img/LearningMaterials.png" alt="Card image" style="height: 230px; width: 220px;">
                               </div>
                             <div class="card-body">
                                        <h4 class="card-title"><b>Lecture Materials</b></h4>
                                        <p class="card-text">Enjoy Learning with the help of this Fun Collection of Knowledges.</p>
                                        <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComAddition('LecMaterialsAdd');">Start Learning</a>     
                              </div>
                          </div>
                            </div>
                                <div class="col-sm-4">
                                   <div class="card card-shadow">
                                      <div class="card-img-container"><img style="height:255px; width: 270px;" src="https://miro.medium.com/v2/resize:fit:1025/1*37s0vlgwz_O0m0jAwDDl6g.png" alt="Card image"></div>
                                          <div class="card-body">
                                            <h4 class="card-title"><b>Practice your Learning</b></h4>
                                                <p class="card-text">Test your learning</p>
                                               <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComAddition('LecVideosAdd');">Start Learning</a>
                                          </div>
                                      </div>
                                  </div>
                                        <div class="col-sm-4">
                                           <div class="card card-shadow">
                                              <div class="card-img-container"><img style="height:250px" style="width: 25px;" src="img/LearningMaterials1.jpg" alt="Card image"></div>
                                                   <div class="card-body">
                                                          <h4 class="card-title"><b>Fun Quiz</b></h4>
                                                                <p class="card-text">Test your learnings</p>
                                                                <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComAddition('FunQuizAdd');">Start Learning</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                             <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="showDiv('Menu');">Back</a></div>
                                       </div>
              <div class="row" id="div-subtraction" style="display:none;">
                <div class="col-sm-12">
                    <div class="card card-shadow">
                        <div class="card-body" id="lecture">
                            <div class="d-flex align-items-center">
                                <div class="card-img-container">
                                    <img style="height:75px;" src="img/subtraction1.jpg" alt="Card image">
                                </div>
                                <div class="ml-3">
                                    <h4 class="card-title"><b>Subtraction</b></h4>
                                </div>
                                  </div>
                                     </div>
                                        </div>
                                    </div>
                                        <div class = "col-sm-4">
                                            <div class="card card-shadow">
                                                <div class="card-img-container"><img src="img/LearningMaterials.png" alt="Card image" style="height: 230px; width: 220px;"></div>
                                                    <div class="card-body">
                                                        <h4 class="card-title"><b>Lecture Materials</b></h4>
                                                            <p class="card-text">Enjoy Learning with the help of this Fun Collection of Knowledges.</p>
                                                            <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComSubration('LecMaterialsSub');">Start Learning</a>     
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-sm-4">
                                                    <div class="card card-shadow">
                                                        <div class="card-img-container"><img style="height:255px; width: 270px;" src="https://miro.medium.com/v2/resize:fit:1025/1*37s0vlgwz_O0m0jAwDDl6g.png" alt="Card image"></div>
                                                            <div class="card-body">
                                                                <h4 class="card-title"><b>Practice your Learning</b></h4>
                                                                  <p class="card-text">Test your learning</p>
                                                                  <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComSubration('LecVideosSub');">Start Learning</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                         <div class="card card-shadow">
                                                             <div class="card-img-container"><img style="height:250px" style="width: 25px;" src="img/LearningMaterials1.jpg" alt="Card image"></div>
                                                                <div class="card-body">
                                                                  <h4 class="card-title"><b>Fun Quiz</b></h4>
                                                                   <p class="card-text">Test your learnings</p>
                                                                <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComSubration('FunQuizSub');">Start Learning</a>
                                                            </div>
                                                        </div>
                                                       </div>  
                                                     <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="showDiv('Menu');">Back</a></div>                        
                                                </div>

                                               <div class="row" id="div-multiplication" style="display:none;">
                                                  <div class="col-sm-12">
                                                     <div class="card card-shadow">
                                                         <div class="card-body" id="lecture">
                                                             <div class="d-flex align-items-center">
                                                            <div class="card-img-container">
                                                               <img style="height:75px;" src="img/multipllication.png" alt="Card image">
                                                           </div>
                                                   <div class="ml-3">
                                                  <h4 class="card-title"><b>Multiplication</b></h4>
                                                 </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                        <div class = "col-sm-4">
                            <div class="card card-shadow">
                                 <div class="card-img-container">
                                     <img src="img/LearningMaterials.png" alt="Card image" style="height: 230px; width: 220px;">
                               </div>
                             <div class="card-body">
                                        <h4 class="card-title"><b>Lecture Materials</b></h4>
                                        <p class="card-text">Enjoy Learning with the help of this Fun Collection of Knowledges.</p>
                                        <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComMultiplication('LecMaterialsMul');">Start Learning</a>     
                              </div>
                          </div>
                            </div>
                                <div class="col-sm-4">
                                   <div class="card card-shadow">
                                      <div class="card-img-container"><img style="height:255px; width: 270px;" src="https://miro.medium.com/v2/resize:fit:1025/1*37s0vlgwz_O0m0jAwDDl6g.png" alt="Card image"></div>
                                          <div class="card-body">
                                            <h4 class="card-title"><b>Practice your Learning</b></h4>
                                                <p class="card-text">Test your learning</p>
                                               <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComMultiplication('LecVideosMul');">Start Learning</a>
                                          </div>
                                      </div>
                                  </div>
                                        <div class="col-sm-4">
                                           <div class="card card-shadow">
                                              <div class="card-img-container"><img style="height:250px" style="width: 25px;" src="img/LearningMaterials1.jpg" alt="Card image"></div>
                                                   <div class="card-body">
                                                          <h4 class="card-title"><b>Fun Quiz</b></h4>
                                                                <p class="card-text">Test your learnings</p>
                                                                <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComMultiplication('FunQuizMul');">Start Learning</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                             <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="showDiv('Menu');">Back</a></div>
                                          </div>
             
            <div class="row" id="div-division" style="display:none;">
            <div class="col-sm-12">
                        <div class="card card-shadow">
                            <div class="card-body" id="lecture">
                                <div class="d-flex align-items-center">
                                    <div class="card-img-container">
                                        <img style="height:75px;" src="img/division.webp" alt="Card image">
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="card-title"><b>Division</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class = "col-sm-4">
                            <div class="card card-shadow">
                                 <div class="card-img-container">
                                     <img src="img/LearningMaterials.png" alt="Card image" style="height: 230px; width: 220px;">
                               </div>
                             <div class="card-body">
                                        <h4 class="card-title"><b>Lecture Materials</b></h4>
                                        <p class="card-text">Enjoy Learning with the help of this Fun Collection of Knowledges.</p>
                                        <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComDivision('LecMaterialsDiv');">Start Learning</a>     
                              </div>
                          </div>
                            </div>
                                <div class="col-sm-4">
                                   <div class="card card-shadow">
                                      <div class="card-img-container"><img style="height:255px; width: 270px;" src="https://miro.medium.com/v2/resize:fit:1025/1*37s0vlgwz_O0m0jAwDDl6g.png" alt="Card image"></div>
                                          <div class="card-body">
                                            <h4 class="card-title"><b>Practice your Learning</b></h4>
                                                <p class="card-text">Test your learning</p>
                                               <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComDivision('LecVideosDiv');">Start Learning</a>
                                          </div>
                                      </div>
                                  </div>
                                        <div class="col-sm-4">
                                           <div class="card card-shadow">
                                              <div class="card-img-container"><img style="height:250px" style="width: 25px;" src="img/LearningMaterials1.jpg" alt="Card image"></div>
                                                   <div class="card-body">
                                                          <h4 class="card-title"><b>Fun Quiz</b></h4>
                                                                <p class="card-text">Test your learnings</p>
                                                                <a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="LectureComDivision('FunQuizDiv');">Start Learning</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                             <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg" style ="font-size: 18px;" onclick="showDiv('Menu');">Back</a></div>
                                     </div>
            <div class = "container1" id="Addition-Menu" >
                    <div class="row" id="LectureAdd" style="display:none; ">
                        <div class="col-sm-12">
                            <div class="card card-shadow">
                                <div class="card-body" id="lecture">
                                    <div class="d-flex align-items-center">
                                        <div class="card-img-container">
                                            <img style="height:75px;" src="img/LearningMaterials.png" alt="Card image">
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="card-title"><b>LearningMaterials</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "col-sm-4">
                            <div class="card card-shadow">
                                 <div class="card-body">
                                      <h4 class="card-title"><b>Adding Single-Digit Numbers (basic)</b></h4>
                                    <p class="card-text">Enjoy learning: </p>
                                   <iframe width="300" height="200" src="https://www.youtube.com/embed/tVHOBVAFjUw?si=Kc6JSKv9bD_DiFQB"></iframe>
                                 </div>
                             </div>
                               </div>
                                    <div class = "col-sm-4">
                                        <div class="card card-shadow">
                                                <div class="card-body">
                                                    <h4 class="card-title"><b>Adding Double-Digits Numbers </b></h4>
                                                        <p class="card-text">Enjoy learning:</p>
                                                        <iframe width="300" height="200" src="https://www.youtube.com/embed/Q9sLfMrH8_w?si=uDA_CKTuI1_amQ05"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "col-sm-4">
                                            <div class="card card-shadow">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><b>Adding with Regrouping (Carrying) </b></h4>
                                                            <p class="card-text">Enjoy learning: </p>
                                                            <iframe width="300" height="200" src="https://www.youtube.com/embed/_NN8g2jWIAs?si=AlwMgOHkBpw40tWy"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Adding Three or More Numbers: </b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/OCMK-G1ZC5s?si=OMfTF-2Y6avPDRCK"></iframe>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Addition Word Problems (Average) </b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/tbrh8q0QPvw?si=JoOLhgICPRNyvVme"></iframe>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Properties of Addition (Average) </b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/a0deCn5QNFI?si=KFrI6FLIDWKGftBr"></iframe>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComAddition('Menu1');">Back</a>  </div>
                                   </div>
                               
                                   <div class="row" id="VideosAdd" style="display:none">
                                        <div class="col-sm-12">
                                            <div class="card card-shadow">
                                                <div class="card-body" id="lecture">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-img-container">
                                                            <img style="height:75px;" src="img/quiztime.png" alt="Card image">
                                                        </div>
                                                        <div class="ml-3">
                                                            <h4 class="card-title"><b>Practice Learning</b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Adding Single-Digit Numbers (Basic)</b></h4>
                                                            <a><img class="image-materials" src="https://cdn.sanity.io/images/zm8ai1fm/production/d1c7e836afb1b6b4066299701a7a94989caca87e-960x613.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\addition_practice1.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                       <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Adding Double-Digits Numbers </b></h4>
                                                            <a><img class="image-materials" src="https://i.pinimg.com/736x/87/ab/0b/87ab0bc53aef0c2be6b1a86afa89aa8b.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\two_digit_number.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Adding with Regrouping (Carrying)</b></h4>
                                                            <a><img class="image-materials" src="https://i.pinimg.com/474x/f5/fa/d5/f5fad5f95866b710ef8fd247424193fc.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\two_digit_carry.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Adding Three Digit Numbers: </b></h4>
                                                            <a><img class="image-materials" src="https://www.wikihow.com/images/thumb/6/6e/Add-Large-Numbers-Step-3-Version-3.jpg/v4-460px-Add-Large-Numbers-Step-3-Version-3.jpg.webp" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\adding_3digit.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Addition Word Problems (Average)</b></h4>
                                                            <a><img class="image-materials" src="https://i.pinimg.com/736x/13/c5/05/13c5056b1b99c8b887c6bcdbc55625c0.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\3-wordproblem.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Properties of Addition (Average)</b></h4>
                                                            <a><img class="image-materials" src="https://i.pinimg.com/474x/fc/ef/65/fcef650ce8a8bf9aad9cea7c725e3c76.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\properties_of_math.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComAddition('Menu1');">Back</a>  
                                              </div>
                                            </div>
                           <div class="row" id="QuizAdd" style="display:none">
                           <div class="col-sm-12">
                            <div class="card card-shadow">
                                <div class="card-body" id="lecture">
                                    <div class="d-flex align-items-center">
                                        <div class="card-img-container">
                                            <img style="height:75px;" src="img/quiz.png" alt="Card image">
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="card-title"><b>Fun Quiz</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                              <div class="card card-shadow">
                                    <div class="card-body text-center">
                                          <h4 class="card-title"><b>Adding Single-Digit Numbers (Basic)</b></h4>
                                              <a><img class="image-materials" src="https://cdn.sanity.io/images/zm8ai1fm/production/d1c7e836afb1b6b4066299701a7a94989caca87e-960x613.jpg" alt="Adding Single-Digit Numbers"></a>
                                                     <a href="mathematics\Addition\addition_fun_task\adding_quiz1.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                         </div>
                                                         </div>
                                                         <div class="col-sm-4">
                                                            <div class="card card-shadow">
                                                                 <div class="card-body text-center">
                                                                     <h4 class="card-title"><b>Adding Double-Digits Numbers</b></h4>
                                                                                <a><img class="image-materials" src="https://i.pinimg.com/736x/87/ab/0b/87ab0bc53aef0c2be6b1a86afa89aa8b.jpg" alt="Adding Single-Digit Numbers"></a>
                                                                                <a href="mathematics/Addition/addition_fun_task/addition_quiz2.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                             </div>
                                                                        </div>
                                                                  </div>
                                                                 
                                                                  <div class="col-sm-4">
                                                                    <div class="card card-shadow">
                                                                       <div class="card-body text-center">
                                                                           <h4 class="card-title"><b>Adding with Regrouping (Carrying)</b></h4>
                                                                                <a><img class="image-materials" src="https://i.pinimg.com/474x/f5/fa/d5/f5fad5f95866b710ef8fd247424193fc.jpg" alt="Adding Single-Digit Numbers"></a>
                                                                                <a href="mathematics\Addition\addition_fun_task\addition_quiz3.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                             </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-4">
                                                                    <div class="card card-shadow">
                                                                       <div class="card-body text-center">
                                                                           <h4 class="card-title"><b>Adding Three Digit Numbers: </b></h4>
                                                                                <a><img class="image-materials" src="https://www.wikihow.com/images/thumb/6/6e/Add-Large-Numbers-Step-3-Version-3.jpg/v4-460px-Add-Large-Numbers-Step-3-Version-3.jpg.webp" alt="Adding Single-Digit Numbers"></a>
                                                                                <a href="mathematics\Addition\addition_fun_task\adding_quiz4.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                             </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-4">
                                                                    <div class="card card-shadow">
                                                                       <div class="card-body text-center">
                                                                           <h4 class="card-title"><b>Addition Word Problems (Average)</b></h4>
                                                                                <a><img class="image-materials" src="https://i.pinimg.com/736x/13/c5/05/13c5056b1b99c8b887c6bcdbc55625c0.jpg"></a>
                                                                                <a href="mathematics\Addition\addition_fun_task\adding_quiz5.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                             </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-sm-4">
                                                                    <div class="card card-shadow">
                                                                       <div class="card-body text-center">
                                                                           <h4 class="card-title"><b>Properties of Addition (Average)</b></h4>
                                                                                <a><img class="image-materials" src="https://i.pinimg.com/474x/fc/ef/65/fcef650ce8a8bf9aad9cea7c725e3c76.jpg"></a>
                                                                                <a href="mathematics\Addition\addition_fun_task\adding_quiz6.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                             </div>
                                                                        </div>
                                                                  </div>
                                                                <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="showDiv('Menu');">FINISH</a>
                                                            </div>
                                                        </div>
                                
                                                    <div class="container1" id="Subtraction-Menu">
                                                        <div class="row" id="LectureSub" style="display:none">
                                                            <div class="col-sm-12">
                                                                <div class="card card-shadow">
                                                                    <div class="card-body" id="lecture">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="card-img-container">
                                                                                <img style="height:75px;" src="img/subtraction1.6.jpg" alt="Card image">
                                                                            </div>
                                                                            <div class="ml-3">
                                                                                <h4 class="card-title"><b>Subtraction</b></h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="col-sm-4">
                                                                <div class="card card-shadow">
                                                                   <div class="card-body">
                                                                        <h4 class="card-title"><b>Basic Subtraction Facts</b></h4>
                                                                        <p class="card-text">Enjoy learning:</p>
                                                                       <iframe width="300" height="200" src="https://www.youtube.com/embed/XJ37VcX1LzY?si=fX7_SXsxUA-ZOEpP"></iframe>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                        <div class="col-sm-4">
                                                            <div class="card card-shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title"><b>Subtraction with Regrouping</b></h4>
                                                                    <p class="card-text">Enjoy learning:</p>
                                                                    <iframe width="300" height="200" src="https://www.youtube.com/embed/H4TCqWaacrI?si=715w6WwaoyUr0_a3"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="card card-shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title"><b>Subtraction Word Problems</b></h4>
                                                                    <p class="card-text">Enjoy learning:</p>
                                                                    <iframe width="300" height="200" src="https://www.youtube.com/embed/d3Voh8r21Es?si=Qk1TYCFy-2YUwBxd"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="card card-shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title"><b>Subtraction of Large Numbers</b></h4>
                                                                    <p class="card-text">Enjoy learning:</p>
                                                                    <iframe width="300" height="200" src="https://www.youtube.com/embed/HlxqCdDrbdc?si=w5_qa8ut6YlI270H"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="card card-shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title"><b>Properties of Subtraction</b></h4>
                                                                    <p class="card-text">Enjoy learning:</p>
                                                                    <iframe width="300" height="200" src="https://www.youtube.com/embed/YNuq3ioz21A?si=Kz-vxniU6i6KMGHq"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="card card-shadow">
                                                                <div class="card-body">
                                                                    <h4 class="card-title"><b>mental math strategies for subtraction</b></h4>
                                                                    <p class="card-text">Enjoy learning:</p>
                                                                    <iframe width="300" height="200" src="https://www.youtube.com/embed/Y6M89-6106I?si=Lfs5KOezqQUNftF0"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style="font-size: 18px;" onclick="LectureComSubration('Menu2');">Back</a>
                                                    </div>
                                                </div>
                                                
                                    <div class="row" id="VideosSub" style="display:none">
                                        <div class="col-sm-12">
                                            <div class="card card-shadow">
                                                <div class="card-body" id="lecture">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-img-container">
                                                            <img style="height:75px;" src="img/subtraction1.jpg" alt="Card image">
                                                        </div>
                                                        <div class="ml-3">
                                                            <h4 class="card-title"><b>Subtraction</b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                              <div class="card card-shadow">
                                                    <div class="card-body text-center">
                                                          <h4 class="card-title"><b>Basic Subtraction Facts</b></h4>
                                                              <a><img class="image-materials" src="https://cdnblogdiscover.leverageedu.com/discover/wp-content/uploads/2024/07/11161054/Facts-About-Subtraction.jpg" alt="Adding Single-Digit Numbers"></a>
                                                                     <a href="mathematics\Subtraction\subtraction_practice_task\subtraction_pract1.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                         </div>
                                                                         </div>
                                                                         </div>
                                                                         <div class="col-sm-4">
                                                                            <div class="card card-shadow">
                                                                                 <div class="card-body text-center">
                                                                                     <h4 class="card-title"><b>Subtraction with Regrouping</b></h4>
                                                                                                <a><img class="image-materials" src="https://slideplayer.com/12795153/77/images/slide_1.jpg" alt="Adding Single-Digit Numbers"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_practice_task\subtraction_pract2.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div>
                                                                                 
                                                                                  <div class="col-sm-4">
                                                                                    <div class="card card-shadow">
                                                                                       <div class="card-body text-center">
                                                                                           <h4 class="card-title"><b>Subtraction Word Problems</b></h4>
                                                                                                <a><img class="image-materials" src="https://www.shutterstock.com/image-photo/math-problem-word-cloud-collage-260nw-1604423194.jpg" alt="Adding Single-Digit Numbers"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_practice_task\subtraction_pract3.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div>
                                                                                  <div class="col-sm-4">
                                                                                    <div class="card card-shadow">
                                                                                       <div class="card-body text-center">
                                                                                           <h4 class="card-title"><b>Subtraction of Large Numbers</b></h4>
                                                                                                <a><img class="image-materials" src="https://www.wikihow.com/images/thumb/3/36/Subtract-Thousands-Step-14.jpg/v4-460px-Subtract-Thousands-Step-14.jpg.webp" alt="Adding Single-Digit Numbers"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_practice_task\subtraction_pract4.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div>
                                                                                  <div class="col-sm-4">
                                                                                    <div class="card card-shadow">
                                                                                       <div class="card-body text-center">
                                                                                           <h4 class="card-title"><b>Properties of Subtraction</b></h4>
                                                                                                <a><img class="image-materials" src="https://i.ytimg.com/vi/Qp5cIzQToD4/maxresdefault.jpg"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_practice_task\subtraction_pract5.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div>
                                                                                  <div class="col-sm-4">
                                                                                    <div class="card card-shadow">
                                                                                       <div class="card-body text-center">
                                                                                           <h4 class="card-title"><b>Mental Math Strategies for Subtraction</b></h4>
                                                                                                <a><img class="image-materials" src="https://www.mathcoachscorner.com/wp-content/uploads/2012/10/Mental-Math-Strategies.png"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_practice_task\subtraction_pract6.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div> 
                                                                                  <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComSubration('Menu2');">Back</a></div> 
                                                                            </div>                       
                                                                     </div>
                                    <div class="row" id="QuizSub" style="display:none">
                                        <div class="col-sm-12">
                                            <div class="card card-shadow">
                                                <div class="card-body" id="lecture">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-img-container">
                                                            <img style="height:75px;" src="img/subtraction1.jpg" alt="Card image">
                                                        </div>
                                                        <div class="ml-3">
                                                            <h4 class="card-title"><b>Subtraction</b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                              <div class="card card-shadow">
                                                    <div class="card-body text-center">
                                                          <h4 class="card-title"><b>Basic Subtraction Facts</b></h4>
                                                              <a><img class="image-materials" src="https://cdnblogdiscover.leverageedu.com/discover/wp-content/uploads/2024/07/11161054/Facts-About-Subtraction.jpg" alt="Adding Single-Digit Numbers"></a>
                                                                     <a href="mathematics\Subtraction\subtraction_fun_quiz\subtraction_funquiz1.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                         </div>
                                                                         </div>
                                                                         </div>
                                                                         <div class="col-sm-4">
                                                                            <div class="card card-shadow">
                                                                                 <div class="card-body text-center">
                                                                                     <h4 class="card-title"><b>Subtraction with Regrouping</b></h4>
                                                                                                <a><img class="image-materials" src="https://slideplayer.com/12795153/77/images/slide_1.jpg" alt="Adding Single-Digit Numbers"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_fun_quiz\subtraction_funquiz2.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div>
                                                                                 
                                                                                  <div class="col-sm-4">
                                                                                    <div class="card card-shadow">
                                                                                       <div class="card-body text-center">
                                                                                           <h4 class="card-title"><b>Subtraction Word Problems</b></h4>
                                                                                                <a><img class="image-materials" src="https://www.shutterstock.com/image-photo/math-problem-word-cloud-collage-260nw-1604423194.jpg" alt="Adding Single-Digit Numbers"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_fun_quiz\subtraction_funquiz3.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div>
                                                                                  <div class="col-sm-4">
                                                                                    <div class="card card-shadow">
                                                                                       <div class="card-body text-center">
                                                                                           <h4 class="card-title"><b>Subtraction of Large Numbers</b></h4>
                                                                                                <a><img class="image-materials" src="https://www.wikihow.com/images/thumb/3/36/Subtract-Thousands-Step-14.jpg/v4-460px-Subtract-Thousands-Step-14.jpg.webp" alt="Adding Single-Digit Numbers"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_fun_quiz\subtraction_funquiz4.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div>
                                                                                  <div class="col-sm-4">
                                                                                    <div class="card card-shadow">
                                                                                       <div class="card-body text-center">
                                                                                           <h4 class="card-title"><b>Properties of Subtraction</b></h4>
                                                                                                <a><img class="image-materials" src="https://i.ytimg.com/vi/Qp5cIzQToD4/maxresdefault.jpg"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_fun_quiz\subtraction_funquiz4.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div>
                                                                                  <div class="col-sm-4">
                                                                                    <div class="card card-shadow">
                                                                                       <div class="card-body text-center">
                                                                                           <h4 class="card-title"><b>Mental Math Strategies for Subtraction</b></h4>
                                                                                                <a><img class="image-materials" src="https://www.mathcoachscorner.com/wp-content/uploads/2012/10/Mental-Math-Strategies.png"></a>
                                                                                                <a href="mathematics\Subtraction\subtraction_fun_quiz\subtraction_funquiz4.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                                                             </div>
                                                                                        </div>
                                                                                  </div> 
                                                                                  <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComSubration('Menu2');">Back</a></div> 
                                                                            </div>
                                                                        </div>             
                            <div class = "container1" id="Multiplication-Menu">
                               <div class="row" id="LectureMul" style="display: none;">
                                  <div class="col-sm-12">
                                    <div class="card card-shadow">
                                        <div class="card-body" id="lecture">
                                           <div class="d-flex align-items-center">
                                              <div class="card-img-container">
                                                <img style="height:75px;" src="img/LearningMaterials.png" alt="Card image">
                                             </div>
                                           <div class="ml-3">
                                                <h4 class="card-title"><b>LearningMaterials</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "col-sm-4">
                            <div class="card card-shadow">
                                 <div class="card-body">
                                      <h4 class="card-title"><b>Introduction to Multiplication</b></h4>
                                    <p class="card-text">Enjoy learning: </p>
                                   <iframe width="300" height="200" src="https://www.youtube.com/embed/dPksJHBZs4Q?si=l7h8GknNxIgn-pd3"></iframe>
                                 </div>
                             </div>
                               </div>
                                    <div class = "col-sm-4">
                                        <div class="card card-shadow">
                                                <div class="card-body">
                                                    <h4 class="card-title"><b>Multiplication Tables</b></h4>
                                                        <p class="card-text">Enjoy learning:</p>
                                                        <iframe width="300" height="200" src="https://www.youtube.com/embed/oPINS56lDes?si=pdS0wdE051cuYd9e"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "col-sm-4">
                                            <div class="card card-shadow">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><b>Properties of Multiplication</b></h4>
                                                            <p class="card-text">Enjoy learning: </p>
                                                            <iframe width="300" height="200" src="https://www.youtube.com/embed/ENDAn9S8U6k?si=69jb1to-kjMpQawq"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Multiplying Larger Numbers </b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/RVYwunbpMHA?si=K-vnFiojfN6FaUir"></iframe>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Word Problems Involving Multiplication</b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/eHv_xf6pDRc?si=ZtCltxaafy1vBshh"></iframe>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Multiplication with Fractions and Decimals</b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/dSFja7Jsg6c?si=pLWuPOrttjLHpuT6"></iframe>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComMultiplication('Menu3');">Back</a>  </div>
                                        </div>

                                            <div class="row" id="VideosMul" style="display: none;">
                                            <div class="col-sm-12">
                                            <div class="card card-shadow">
                                                <div class="card-body" id="lecture">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-img-container">
                                                            <img style="height:75px;" src="img/quiztime.png" alt="Card image">
                                                        </div>
                                                        <div class="ml-3">
                                                            <h4 class="card-title"><b>Practice Learning</b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Introduction to Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://c4.wallpaperflare.com/wallpaper/330/785/205/equations-math-wallpaper-preview.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Multipllication\multiplication_practice_task\multiplication_practice1.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                       <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplication Tables</b></h4>
                                                            <a><img class="image-materials" src="https://img.freepik.com/free-vector/times-tables-with-kids-background_1308-2976.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Multipllication\multiplication_practice_task\multiplication_practice2.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Properties of Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://i.pinimg.com/474x/f5/fa/d5/f5fad5f95866b710ef8fd247424193fc.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Multipllication\multiplication_practice_task\multiplication_practice3.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplying Larger Numbers </b></h4>
                                                            <a><img class="image-materials" src="https://pbs.twimg.com/media/GFx_4FubUAAcDax.jpg:large" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\adding_3digit.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Word Problems Involving Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://m.media-amazon.com/images/I/71GGzTc9mkL._AC_UF1000,1000_QL80_.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\3-wordproblem.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplication with Fractions and Decimals</b></h4>
                                                            <a><img class="image-materials" src="https://cdn.hswstatic.com/gif/Multiply-fractions.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\properties_of_math.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComMultiplication('Menu3');">Back</a>  
                                               </div> 
                                            </div>  

                                             <div class="row" id="QuizMul" style="display: none;">
                                             <div class="col-sm-12">
                                            <div class="card card-shadow">
                                                <div class="card-body" id="lecture">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-img-container">
                                                            <img style="height:75px;" src="img/quiztime.png" alt="Card image">
                                                        </div>
                                                        <div class="ml-3">
                                                            <h4 class="card-title"><b>Fun Quiz</b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Introduction to Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://c4.wallpaperflare.com/wallpaper/330/785/205/equations-math-wallpaper-preview.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Multipllication\multiplication_fun_quiz\multiplication_funquiz.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                       <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplication Tables</b></h4>
                                                            <a><img class="image-materials" src="https://img.freepik.com/free-vector/times-tables-with-kids-background_1308-2976.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Multipllication\multiplication_fun_quiz\multiplication_funquiz1.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Properties of Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://i.pinimg.com/474x/f5/fa/d5/f5fad5f95866b710ef8fd247424193fc.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Multipllication\multiplication_fun_quiz\multiplication_funquiz3.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplying Larger Numbers </b></h4>
                                                            <a><img class="image-materials" src="https://pbs.twimg.com/media/GFx_4FubUAAcDax.jpg:large" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\adding_3digit.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Word Problems Involving Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://m.media-amazon.com/images/I/71GGzTc9mkL._AC_UF1000,1000_QL80_.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\3-wordproblem.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplication with Fractions and Decimals</b></h4>
                                                            <a><img class="image-materials" src="https://cdn.hswstatic.com/gif/Multiply-fractions.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\properties_of_math.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComMultiplication('Menu3');">Back</a> </div>
                                             </div>   
                                            </div>

                                              <div class = "container1" id="Division-Menu">
                                                   <div class="row" id="LectureDiv" style="display: none;">
                                                        <div class="col-sm-12">
                                                            <div class="card card-shadow">
                                                               <div class="card-body" id="lecture">
                                                                    <div class="d-flex align-items-center">
                                                                       <div class="card-img-container">
                                                                           <img style="height:75px;" src="img/LearningMaterials.png" alt="Card image">
                                                                       </div>
                                                            <div class="ml-3">
                                                                <h4 class="card-title"><b>LearningMaterials</b></h4>
                                                            </div>
                                                       </div>
                                                 </div>
                                         </div>
                                   </div>
                        <div class = "col-sm-4">
                            <div class="card card-shadow">
                                 <div class="card-body">
                                      <h4 class="card-title"><b>Introduction to Multiplication</b></h4>
                                    <p class="card-text">Enjoy learning: </p>
                                   <iframe width="300" height="200" src="https://www.youtube.com/embed/dPksJHBZs4Q?si=l7h8GknNxIgn-pd3"></iframe>
                                 </div>
                             </div>
                               </div>
                                    <div class = "col-sm-4">
                                        <div class="card card-shadow">
                                                <div class="card-body">
                                                    <h4 class="card-title"><b>Multiplication Tables</b></h4>
                                                        <p class="card-text">Enjoy learning:</p>
                                                        <iframe width="300" height="200" src="https://www.youtube.com/embed/oPINS56lDes?si=pdS0wdE051cuYd9e"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "col-sm-4">
                                            <div class="card card-shadow">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><b>Properties of Multiplication</b></h4>
                                                            <p class="card-text">Enjoy learning: </p>
                                                            <iframe width="300" height="200" src="https://www.youtube.com/embed/ENDAn9S8U6k?si=69jb1to-kjMpQawq"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Multiplying Larger Numbers </b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/RVYwunbpMHA?si=K-vnFiojfN6FaUir"></iframe>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Word Problems Involving Multiplication</b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/eHv_xf6pDRc?si=ZtCltxaafy1vBshh"></iframe>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class = "col-sm-4">
                                                <div class="card card-shadow">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><b>Multiplication with Fractions and Decimals</b></h4>
                                                                <p class="card-text">Enjoy learning: </p>
                                                                <iframe width="300" height="200" src="https://www.youtube.com/embed/dSFja7Jsg6c?si=pLWuPOrttjLHpuT6"></iframe>
                                                        </div>
                                                    </div>
                                              </div>
                                              <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComDivision('Menu4');">Back</a> </div>
                                             </div>
                                        <div class="row" id="VideosDiv" style="display: none;">
                                        <div class="col-sm-12">
                                            <div class="card card-shadow">
                                                <div class="card-body" id="lecture">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-img-container">
                                                            <img style="height:75px;" src="img/quiztime.png" alt="Card image">
                                                        </div>
                                                        <div class="ml-3">
                                                            <h4 class="card-title"><b>Fun Quiz</b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Introduction to Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://c4.wallpaperflare.com/wallpaper/330/785/205/equations-math-wallpaper-preview.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\addition_practice1.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                       <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplication Tables</b></h4>
                                                            <a><img class="image-materials" src="https://img.freepik.com/free-vector/times-tables-with-kids-background_1308-2976.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\two_digit_number.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Properties of Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://i.pinimg.com/474x/f5/fa/d5/f5fad5f95866b710ef8fd247424193fc.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\two_digit_carry.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplying Larger Numbers </b></h4>
                                                            <a><img class="image-materials" src="https://pbs.twimg.com/media/GFx_4FubUAAcDax.jpg:large" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\adding_3digit.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Word Problems Involving Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://m.media-amazon.com/images/I/71GGzTc9mkL._AC_UF1000,1000_QL80_.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\3-wordproblem.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplication with Fractions and Decimals</b></h4>
                                                            <a><img class="image-materials" src="https://cdn.hswstatic.com/gif/Multiply-fractions.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\properties_of_math.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComDivision('Menu4');">Back</a> </div>
                                             </div>   

                                             <div class="row" id="QuizDiv" style="display: none;">
                                             <div class="col-sm-12">
                                            <div class="card card-shadow">
                                                <div class="card-body" id="lecture">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-img-container">
                                                            <img style="height:75px;" src="img/quiztime.png" alt="Card image">
                                                        </div>
                                                        <div class="ml-3">
                                                            <h4 class="card-title"><b>Fun Quiz</b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Introduction to Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://c4.wallpaperflare.com/wallpaper/330/785/205/equations-math-wallpaper-preview.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\addition_practice1.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                       <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplication Tables</b></h4>
                                                            <a><img class="image-materials" src="https://img.freepik.com/free-vector/times-tables-with-kids-background_1308-2976.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\two_digit_number.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Properties of Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://i.pinimg.com/474x/f5/fa/d5/f5fad5f95866b710ef8fd247424193fc.jpg" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\two_digit_carry.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplying Larger Numbers </b></h4>
                                                            <a><img class="image-materials" src="https://pbs.twimg.com/media/GFx_4FubUAAcDax.jpg:large" alt="Adding Single-Digit Numbers"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\adding_3digit.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Word Problems Involving Multiplication</b></h4>
                                                            <a><img class="image-materials" src="https://m.media-amazon.com/images/I/71GGzTc9mkL._AC_UF1000,1000_QL80_.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\3-wordproblem.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div class="col-sm-4">
                                                <div class="card card-shadow">
                                                   <div class="card-body text-center">
                                                       <h4 class="card-title"><b>Multiplication with Fractions and Decimals</b></h4>
                                                            <a><img class="image-materials" src="https://cdn.hswstatic.com/gif/Multiply-fractions.jpg"></a>
                                                            <a href="mathematics\Addition\addition_practice_task\properties_of_math.html" class="btn btn-primary btn-lg mt-3"> Start Learning</a>
                                                         </div>
                                                    </div>
                                              </div>
                                              <div style="text-align:right;"><a href="#" class="btn btn-primary btn-lg"  style ="font-size: 18px;" onclick="LectureComDivision('Menu4');">Back</a> </div>
                                             </div>   
                                                   </div>
                                                         </div>
                                                             </div>
                                                                  </div>
                                                                       </div>
                                                                            </div>
                                                                               </div>
                                                                                   </div>
                                                                                       </div>
                                                                                          </body>
                                                                                              </html>
