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
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="css/style.sea.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/fav.png">

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
            <div class="list-inline-item logout"><a id="logout" href="logout.php" class="nav-link"> <span class=" d-xs-inline">Logout&nbsp; </span><i class="icon-logout"></i></a></div>
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
          <li class="active"><a href="home.php"> <i class="icon-home"></i>Home </a></li>
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
          <li><a href="contact.php"> <i class="fa fa-comment"></i>Contact Us </a></li>
        </ul>
      </nav>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom services">
          <div class="container">
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
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom"> &copy; Designed and developed by team Wissenaire'21 .</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="js/front.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
