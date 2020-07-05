<?php 
session_start();
if (empty($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}
    $email = $_SESSION['email'];
    $servername = "localhost";
    $username = "wissenaire_sudheer";
    $password = "sudheer@wissenaire";
    $database = "wissenaire_fundraiser";
    $conn = new mysqli($servername, $username, $password,$database);
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
   $user="SELECT * FROM users WHERE email='$email'";
   $q=mysqli_query($conn,$user);
   $result=mysqli_fetch_array($q);
?>
<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    
    <title>FundRaiser | Wissenaire</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="css/style.sea.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/fav.png">
    <style>
        .contact{
            color:#fff;
            margin-bottom:50px;
        }   
        a{
            color:#fff;
        }
        a:hover{
            color:#fff;
        }
    </style>
    
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
                <a href="https://wissenaire.org" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><img src="img/log.png"></div>
              <div class="brand-text brand-sm"><img src="img/logo.png"></div></a>
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
            <div class="list-inline-item logout"><a id="logout" href="logout.php" class="nav-link"> <span class=" d-xs-inline">Logout &nbsp;</span><i class="icon-logout"></i></a></div>
          </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="<?php echo $result['avatar']; ?>" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5"><?php echo $result['name']; ?></h1>
          </div>
        </div>
        <ul class="list-unstyled">
          <li><a href="home.php"> <i class="icon-home"></i>Home </a></li>
          <li><a href="rules.php"> <i class="icon-padnote"></i>Rules and Regulations </a></li>
          <li><a href="register.php"> <i class="icon-check"></i>Register </a></li>
          <li><a href="#play" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Participate </a>
            <ul id="play" class="collapse list-unstyled ">
              <li><a href="photography.php">Through the lens</a></li>
              <li><a href="arts.php">Artistas manos amigas</a></li>
              <li><a href="quiz1.php">XI Factor </a></li>
              <li><a href="quiz2.php">HydroxyChloroQuizone</a></li>   
              <li><a href="pubg.php">Pubg</a></li>
            </ul>
          </li>
          <li class="active"><a href="contact.php"> <i class="fa fa-comment"></i>Contact Us </a></li>
        </ul>
      </nav>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Contact</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row ">
                <div class="col-12 col-md-6 contact">
                    <p style="align-items:center;">For Registrations and Payment queries</p>
                
                    <h5><i class="fa fa-user"></i>&nbsp; Sudheer Bulusu</h5>
                    <i class="fa fa-graduation-cap"></i>&nbsp; CoreHead, Wissenaire'21<br>
                    <i class="fa fa-phone"><a href="tel:7675974963">&nbsp; +91 7675974963</a></i><br>
                    <i class="fa fa-envelope"><a href="mailto:bds15@iitbbs.ac.in">&nbsp;  bds15@itbbs.ac.in</a></i><br>
                </div>
                <div class="col-12 col-md-6 contact">
                    <p style="align-items:center;">For Pubg Competition</p>
                
                    <h5><i class="fa fa-user"></i>&nbsp; Abhinav Reddy</h5>
                    <i class="fa fa-graduation-cap"></i>&nbsp; CoreHead, Wissenaire'21<br>
                    <i class="fa fa-phone"></i><a href="tel:7386755009">&nbsp; +91 7386755009</a><br>
                    <i class="fa fa-envelope"></i><a href="mailto:sar10@iitbbs.ac.in">&nbsp;  sar10@itbbs.ac.in</a><br>
                </div>
                <div class="col-12 col-md-6 contact">
                    <p style="align-items:center;">For Quiz Competitions</p>
                
                    <h5><i class="fa fa-user"></i>&nbsp; Rahul Rajeev</h5>
                    <i class="fa fa-graduation-cap"></i>&nbsp; CoreHead, Wissenaire'21<br>
                    <i class="fa fa-phone"></i><a href="tel:9207504158">&nbsp; +91 9207504158</a><br>
                    <i class="fa fa-envelope"></i><a href="mailto:rr27@iitbbs.ac.in">&nbsp;  rr27@itbbs.ac.in</a><br>
                </div>
                <div class="col-12 col-md-6 contact">
                    <p style="align-items:center;">For Photography Competition</p>
                
                    <h5><i class="fa fa-user"></i>&nbsp; Kartheek Guntupalli</h5>
                    <i class="fa fa-graduation-cap"></i>&nbsp; CoreHead, Wissenaire'21<br>
                    <i class="fa fa-phone"></i><a href="tel:703987953">&nbsp; +91 703987953</a><br>
                    <i class="fa fa-envelope"></i><a href="malito:gk35@iitbbs.ac.in">&nbsp;  gk35@itbbs.ac.in</a><br>
                </div>
                <div class="col-12 col-md-6 contact">
                    <p style="align-items:center;">For Arts Competition</p>
                
                    <h5><i class="fa fa-user"></i>&nbsp; Sairam Reddy</h5>
                    <i class="fa fa-graduation-cap"></i>&nbsp; CoreHead, Wissenaire'21<br>
                    <i class="fa fa-phone"></i><a href="tel:7780740602">&nbsp; +91 7780740602</a><br>
                    <i class="fa fa-envelope"></i><a href="mailto:vsr10@iitbbs.ac.in">&nbsp;  vsr10@itbbs.ac.in</a><br>
                </div>
            </div>
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom"> &copy; Designed and developed by team Wissenaire'21 .</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="js/front.js"></script>
  </body>
</html>