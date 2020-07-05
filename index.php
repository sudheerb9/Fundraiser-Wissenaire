<?php
     require_once "config.php";

  $loginURL = $gClient->createAuthUrl();
  
  $login_button = '<a href="'.$loginURL.'"><img class="img-fluid" src="assets/img/login.png" width="200px"></a>';
  
    $servername = "localhost";
    $username = "wissenaire_sudheer";
    $password = "sudheer@wissenaire";
    $database = "wissenaire_fundraiser";
    $conn = new mysqli($servername, $username, $password,$database);
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
   $user="SELECT * FROM users";
   $q=mysqli_query($conn,$user);
   $users=mysqli_num_rows($q);
   
   $reg= "SELECT * FROM events";
   $q1=mysqli_query($conn,$reg);
   $registrations=mysqli_num_rows($q1);
   
   $regusers = "SELECT  DISTINCT email  FROM events";
   $q6=mysqli_query($conn, $regusers);
   $regusers= mysqli_num_rows($q6);
   
   $photo="SELECT * FROM events WHERE event='photography'";
   $q2=mysqli_query($conn, $photo);
   $photoregusers= mysqli_num_rows($q2);
   
   $arts="SELECT * FROM events WHERE event='arts'";
   $q3=mysqli_query($conn, $arts);
   $artsregusers= mysqli_num_rows($q3);
   
   $quiz1="SELECT * FROM events WHERE event='quiz1'";
   $q4=mysqli_query($conn, $quiz1);
   $quiz1regusers= mysqli_num_rows($q4);
   
   $quiz2="SELECT * FROM events WHERE event='quiz2'";
   $q5=mysqli_query($conn, $quiz2);
   $quiz2regusers= mysqli_num_rows($q5);
   
   $pubg="SELECT * FROM events WHERE event='pubg'";
   $q7=mysqli_query($conn, $pubg);
   $pubgregusers= mysqli_num_rows($q7);
   
   $amount= $photoregusers*50 + $artsregusers*50 + $quiz1regusers*30 + $quiz2regusers*30 + $pubgregusers*100 ;
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fundraiser | Wissenaire </title>
  <meta name="google-signin-client_id" content="96689537530-jkk11ojp0i4r1ffq7q6u8idamsm59c9j.apps.googleusercontent.com" >
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/fav1.png">

  <style>
        
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:#000;
            overflow:hidden;
            z-index: 99;
        }
        #loader {
            display: block;
            position: relative;
            left: 50%;
            top: 50%;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
        #loader:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border-radius: 50%;
            border: 3px solid transparent;
            -webkit-animation: spin 3s linear infinite;
            animation: spin 3s linear infinite;
        }
        #loader:after {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #ff7e00;
            -webkit-animation: spin 1.5s linear infinite;
            animation: spin 1.5s linear infinite;
        }
        @-webkit-keyframes spin {
            0%   {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes spin {
            0%   {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        .hidden{
            display:none;
        }
        
        .text{
            font-weight:700;
            text-transform:uppercase;
            line-height:1.2;
            font-size: 10rem;
            background:-webkit-linear-gradient(#ffa500, #ff4500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }


  </style>
</head>
        <div id="preloader">
            <div id="loader"></div>
        </div>
<body onload="load()">
    <div id="body"  class="hidden">
        <div class="clouds"></div>
        <div id='stars3'></div>
        <div id='stars'></div>
        <div id='stars2'></div>
        
  <header id="header" class="header-tops">
    <div class="container">

      <h1><a href="index.php">Do4Nation</a></h1>
        
       <h2 align="center" class="d-lg-none"><img src="assets/img/new logo1.png" class="img-fluid" ></h2> 
       <h2 style="position:absolute; top:18%; right:0%;"><img class="d-none d-lg-block" src="assets/img/new logo1.png" style="max-width:700px;"></h2> 
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#motto">Motto</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#stats">Demographics</a></li>
        </ul>
      </nav>

        <h2 align="center" class="d-lg-none"><?php echo "$login_button" ?></h2>
        <h2><p class="d-none d-lg-block" style="margin-left:30px;"><br><?php echo "$login_button" ?></p></h2>
      <div class="social-links">
        <a href="https://www.facebook.com/wissenaireiitbbs/" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/wissenaire.iitbbs/" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="https://www.youtube.com/user/wissenaireiitbbs" class="youtube"><i class="icofont-youtube"></i></a>
        <a href="https://www.linkedin.com/company/wissenaireiitbbs/" class="linkedin"><i class="icofont-linkedin"></i></a>
      </div>
      
      <!--<div class="social-links d-none d-lg-block" style="position: absolute; right: 20px; top:22%;">-->
      <!--    <h2>-->
      <!--      <ul>-->
      <!--          <a href="https://www.facebook.com/wissenaireiitbbs/" class="facebook"><i class="icofont-facebook"></i></a><br>-->
      <!--          <a href="https://www.instagram.com/wissenaire.iitbbs/" class="instagram"><i class="icofont-instagram"></i></a><br>-->
      <!--          <a href="https://www.youtube.com/user/wissenaireiitbbs" class="youtube"><i class="icofont-youtube"></i></a><br>-->
      <!--          <a href="https://www.linkedin.com/company/wissenaireiitbbs/" class="linkedin"><i class="icofont-linkedin"></i></a><br>-->
      <!--      </ul>-->
      <!--    </h2>-->
      <!--  </div>-->
      
    </div>

  </header>

  <section id="about" class="about">

    <div class="about-me container">

      <div class="section-title">
        <h2>About</h2>
        <p>More about us</p>
      </div>

      <div class="row">
        <div class="col-lg-7 d-none d-lg-block" data-aos="fade-right">
          <iframe width="500" height="315" src="https://www.youtube.com/embed/KZ495bWE9gE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="d-block d-lg-none justify-contents-center" style="display: block; margin: auto;">
          <iframe width="auto" height="250" src="https://www.youtube.com/embed/KZ495bWE9gE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-5 pt-4 pt-lg-0 content" data-aos="fade-left">
        
          <p >
            <br>
            Wissenaire, the annual techno-management fest of IIT Bhubaneswar is one of the biggest of its kind in East India. Encompassing various sectors of technology, science and management this three-day extravaganza is maneuvers it's participants through the world of futuristic technologies. Every year Wissenaire comes up with a theme and in 2019 Wissenaire has got some unique ideas in store for you with the theme 
          </p>

          <p class="font-italic" style="color: #08e4fc;">
             Cosmic Expeditions: Astounding Odysseys Ensuring Humanity's Existence.
          </p>

        </div>
          
        <div class="col-12 content" data-aos="fade-left">   
          <p>
            <br><br>
            And here we are in the 21st century!Today, humanity has the potential to seek answers to the most fundamental questions posed about the existence of life beyond Earth. Telescopes have found planets around other stars. Robotic probes have identifiedpotential resources on the Moon, and evidence of water -- a key ingredient for life -- has been found on Marsand the moons of Jupiter. Going to the past, July 20th, 2019 was the 50th anniversary of Apollo 11’s historic flight to the moon, where astronauts Neil Armstrong and Buzz Aldrin became the first human beings to walk on the moon. 50 years ago, space flight inspired such awe that astronauts were hailed as heroes and celebrities by men, women, and children alike. 50 years later, the exploration still going on strong and with a full swing, there's no looking back. Because in the end, "Somewhere, something incredible is waiting to be known."
          </p>
        </div>
    
      </div>
    
    </div>

  </section>

  <section id="motto" class="resume">
    <div class="container">

      <div class="section-title">
        <h2>Motto</h2>
        <p>OUR MOTTO</p>
      </div>
        <p> The corona virus pandemic has hit our country and we are under lockdown. How ae you handling quarantine ? Maybe it isn't so bad for you , may be you're watching just Netflix , playing videogames and just chilling ! Some of you may even be doing productive . But almost everyone is bored.</p>
        <p> So, to cure your boredom  WISSENAIRE , is conducting 5 exciting events for you  to have a fun time, and in the process , also to contribute to our victim's fight against the corona virus .</p>
    </div>
  </section>

  <section id="events" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Events</h2>
        <p>Our Events</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-camera"></i></div>
            <h4><a href="photography.php">Through the lens</a></h4>
            <p>Take this opportunity to create your perfect shot with perfect lighting, angle and composition to win it</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-paint"></i></div>
            <h4><a href="arts.php">Artistas manos amigas</a></h4>
            <p>An online Arts competition with the theme altruism</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-baseball"></i></div>
            <h4><a href="quiz1.php">XI Factor</a></h4>
            <p>Ever had someone asked you what you're going to do with all the "knowledge on sports" ? Well, you'll be helping our nation fight against the pandemic !</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="quiz2.php">HydroxyChloroQuizone</a></h4>
            <p>Ever had someone asked you what you're going to do with all the useless knowledge in that big head of yours ? Well, you'll be helping our nation fight against the pandemic !</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-joystick-alt"></i></div>
            <h4><a href="pubg.php">Pubg </a></h4>
            <p>If just moving through public lobbies and killing everyone in PUBG has gotten a little stale for you, jump in with your squad to compete with other people and show us what you got ! </p>
          </div>
        </div>

      </div>

    </div>
  </section>
    
  <section id="stats" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Demographics</h2>
        <p>Check the statistics here</p>
      </div>
      
      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-been-here"></i></div>
            <h4><?php echo "$users"; ?></h4>
            <p>Total Users signed up </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-donate-heart"></i></div>
            <h4><?php echo "$regusers"; ?></h4>
            <p>No of registered users</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-award"></i></div>
            <h4><?php echo "$registrations"; ?></h4>
            <p>No of successful registrations</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-coin-stack"></i></div>
            <h4><?php echo "$amount"; ?></h4>
            <p>Total amount collected</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-camera"></i></div>
            <h4><?php echo "$photoregusers"; ?></h4>
            <p>No of registrations for Through the lens</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-paint"></i></div>
            <h4><?php echo "$artsregusers"; ?></h4>
            <p>No of registrations for Artistas manos amigas</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-baseball"></i></div>
            <h4><?php echo "$quiz1regusers"; ?></h4>
            <p>No of registrations for XI Factor</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><?php echo "$quiz2regusers"; ?></h4>
            <p>No of registrations for HydroChloroQuizone</p>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box" style="width:100%;">
            <div class="icon"><i class="bx bx-joystick-alt"></i></div>
            <h4><?php echo "$pubgregusers"; ?></h4>
            <p>No of registrations for pubg</p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <div class="credits">

    Designed by <a href="https://wissenaire.org">Team Wissenaire'21</a>
  </div>
</div>
<script>
    function load(){
        $("#preloader").addClass('hidden');
        $("#body").removeClass('hidden');
        $("#navbar-toggler").removeClass('hidden');
    }
</script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>