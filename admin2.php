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
    <title>Admin</title>
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
                    <li><a href="admin2.php">Home</a></li>
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
                          <h4 class="card-title"><a href="welcome.html"><img style="height:100px;" src="https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-host-and-admin-marketing-job-vacancies-vector-png-image_6480101.png" alt="Card image" class="logo"></a>
                          <b>Hello Admin <?php echo htmlspecialchars($_SESSION['name']); ?>!</b>                       
                        </div>
                    </div>
                </div>
              </div>
                <div class="row" id="main-menu">
                  <div class="col-sm-6">
                      <div class="card card-shadow">
                          <div class="card-img-container"><img  class="card-img-top selection-img" src="https://blogimages.softwaresuggest.com/blog/wp-content/uploads/2022/12/18150129/Best-Student-Record-Management-System-for-Schools-Institutes-1.png" style="height:210px; width:300px"; alt="Card image"></div>
                          <div class="card-body">
                            <h4 class="card-title"><b>Supervise Student's Record</b></h4>
                            <a href="students_record.php" class="btn btn-primary btn-lg" style ="font-size: 18px;" >See student record</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="card card-shadow">
                          <div class="card-img-container"><img class="card-img-top selection-img" src="https://cdn-iheeh.nitrocdn.com/atmyVVfQtQxNaGDHHKmqlaSwXfloVquO/assets/images/optimized/rev-3880f03/dokka.com/wp-content/uploads/2024/03/How-To-Keep-Track-Of-Invoices-And-Payments-1Asset-2@2x-1024x618.png" style="height:210px; width:300px;" alt="Card image"></div>
                          <div class="card-body">
                            <h4 class="card-title"><b>Tracking Payments</b></h4>
                            <a href="student_record_payment.php" class="btn btn-primary btn-lg" style ="font-size: 18px;">Track payment</a>
                          </div>
                      </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>