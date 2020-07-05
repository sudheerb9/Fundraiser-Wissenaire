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
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="css/style.sea.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/fav.png">

<style>
    
    h6{
        color:#fff;
        font-weight:400;
    }
    
    .btn{
        background-color:#2c3e9c;
        border-radius:19px;
        padding: 8px 20px;
        color:#fff;
    }
    
    .btn hover{
        color:#fff;
        background-color:#000;
    }
    
    .card-body{
        padding-left:10px;
        padding-top:10px;
    }
    
    .title{
        font-size:2rem;    
    }
    
    .card-title{
        margin-top:5px;
        margin-left:10px;
        padding-left:15px;
        margin-bottom:5px;
        padding-bottom:0;
        font-size:1.25rem;
    }
    
    .prize {
        list-style:none;
        padding-left:0;
    }
    
    .rules {
        list-style:none;
        padding-left:0;
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
          <li class="active"><a href="rules.php"> <i class="icon-padnote"></i>Rules and Regulations </a></li>
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
            <h2 class="h5 no-margin-bottom">Rules and  Regulations</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          
          <div class="container">
            <div class="row">
                <h6>1. All events are open for all and one can register for any no. of events at the register section.</h6>
                <h6>2. Submissions for photography and arts competitions and quizzing are being carried out at the respective sections under the participate section.</h6>
                <h6>3. Participants will get access sections under participate section as soon as the registration is successful. </h6>
                <h6>4. Last date for submissions is 14th May, 2020</h6>
                <h6>5. For pubg competition only team leader must register.</h6>
                
            </div>
          </div>
          <br><br>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12 col-md-6">
                      <div class="title" style="color:#fff;">
                         <h5>Through the lens</h5> 
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <button class="btn" onclick="window.open('pdf/photography.pdf')"> Know More </button>
                  </div>
              </div><br>
              <div class="row">
                  <div class="col-12 col-md-6">
                      <p style="color:#fff;">Take this opportunity to create your perfect shot with perfect lighting, angle and composition to win it</p>
                      <div class="card" style="background:green; color:#fff;">
                          <div class="card-title">
                              Incentives 
                          </div>
                          <div class="card-body">
                              <ul class="prize">
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Total prizes worth 2k </li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> TSS Vouchers</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Exclusive Wissenaire Merchandise</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> E-certificates from Wissenaire, IIT Bhubaneswar</li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <div class="card" style="background:#ff2f27; color:#fff;">
                          <div class="card-title">
                              Rules 
                          </div>
                          <div class="card-body">
                              <ul class="rules">
                                  <li><i class="fa fa-check"></i> No specific theme for the competition. </li>
                                  <li><i class="fa fa-check"></i> Photographs must be submitted in either JPG or JPEG format.</li>
                                  <li><i class="fa fa-check"></i> Plagiarism is not allowed, leading to disqualification of the entry.</li>
                                  <li><i class="fa fa-check"></i> Incase of multiple submissions, latest two submissions will be evaluated.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              
              
              <div class="row">
                  <div class="col-12 col-md-6">
                      <div class="title" style="color:#fff;">
                         <h5>Artistas Manos Amigas</h5> 
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <button class="btn" onclick="window.open('pdf/arts.pdf')"> Know More </button>
                  </div>
              </div><br>
              <div class="row">
                  <div class="col-12 col-md-6">
                      <p style="color:#fff;">An online Arts competition with the theme altruism</p>
                      <div class="card" style="background:green; color:#fff;">
                          <div class="card-title">
                              Incentives 
                          </div>
                          <div class="card-body">
                              <ul class="prize">
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Total prizes worth 2k </li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> TSS Vouchers</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Exclusive Wissenaire Merchandise</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> E-certificates from Wissenaire, IIT Bhubaneswar</li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <div class="card" style="background:#ff2f27; color:#fff;">
                          <div class="card-title">
                              Rules 
                          </div>
                          <div class="card-body">
                              <ul class="rules">
                                  <li><i class="fa fa-check"></i> Theme of the Competition is altruism. </li>
                                  <li><i class="fa fa-check"></i> Photographs of paintings must be submitted in either JPG or JPEG format.</li>
                                  <li><i class="fa fa-check"></i> Plagiarism is not allowed, leading to disqualification of the entry.</li>
                                  <li><i class="fa fa-check"></i> Judging will be done by BIJAY BISWAL ,and will be final.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
                  
              <div class="row">
                  <div class="col-12 col-md-6">
                      <div class="title" style="color:#fff;">
                         <h5>XI Factor</h5> 
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <button class="btn" onclick="window.open('pdf/quiz.pdf')"> Know More </button>
                  </div>
              </div><br>
              <div class="row">
                  <div class="col-12 col-md-6">
                      <p style="color:#fff;">Ever had someone asked you what you're going to do with all the "knowledge on sports" ? Well, you'll be helping our nation fight against the pandemic !</p>
                      <div class="card" style="background:green; color:#fff;">
                          <div class="card-title">
                              Incentives 
                          </div>
                          <div class="card-body">
                              <ul class="prize">
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Total prizes worth 2k </li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> TSS Vouchers</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Exclusive Wissenaire Merchandise</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> E-certificates from Wissenaire, IIT Bhubaneswar</li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <div class="card" style="background:#ff2f27; color:#fff;">
                          <div class="card-title">
                              Rules 
                          </div>
                          <div class="card-body">
                              <ul class="rules">
                                  <li><i class="fa fa-check"></i> There is no negative marking. You are free to take guesses. </li>
                                  <li><i class="fa fa-check"></i> A participant can attempt the quiz only once.</li>
                                  <li><i class="fa fa-check"></i> Questions whuch are a multiple of 3, will be considered for resolving ties.</li>
                                  <li><i class="fa fa-check"></i> Even if tie exists, the participant who submitted earlier will be declared winner .</li>
                                  <li><i class="fa fa-check"></i> Decisions with respect to leaderboard will be made by Wissenaire and the Quiz club of IIT Bhubaneswar and will be final.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>              

              <div class="row">
                  <div class="col-12 col-md-6">
                      <div class="title" style="color:#fff;">
                         <h5>HydroChloroQuizone</h5> 
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <button class="btn" onclick="window.open('pdf/quiz.pdf')"> Know More </button>
                  </div>
              </div><br>
              <div class="row">
                  <div class="col-12 col-md-6">
                      <p style="color:#fff;">Ever had someone asked you what you're going to do with all the useless knowledge in that big head of yours ? Well, you'll be helping our nation fight against the pandemic !</p>
                      <div class="card" style="background:green; color:#fff;">
                          <div class="card-title">
                              Incentives 
                          </div>
                          <div class="card-body">
                              <ul class="prize">
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Total prizes worth 2k </li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> TSS Vouchers</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Exclusive Wissenaire Merchandise</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> E-certificates from Wissenaire, IIT Bhubaneswar</li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <div class="card" style="background:#ff2f27; color:#fff;">
                          <div class="card-title">
                              Rules 
                          </div>
                          <div class="card-body">
                              <ul class="rules">
                                  <li><i class="fa fa-check"></i> There is no negative marking. You are free to take guesses. </li>
                                  <li><i class="fa fa-check"></i> A participant can attempt the quiz only once.</li>
                                  <li><i class="fa fa-check"></i> Questions whuch are a multiple of 3, will be considered for resolving ties.</li>
                                  <li><i class="fa fa-check"></i> Even if tie exists, the participant who submitted earlier will be declared winner .</li>
                                  <li><i class="fa fa-check"></i> Decisions with respect to leaderboard will be made by Wissenaire and the Quiz club of IIT Bhubaneswar and will be final.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>                         

              <div class="row">
                  <div class="col-12 col-md-6">
                      <div class="title" style="color:#fff;">
                         <h5>Pubg</h5> 
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <button class="btn" onclick="window.open('pdf/pubg.pdf')"> Know More </button>
                  </div>
              </div><br>
              <div class="row">
                  <div class="col-12 col-md-6">
                      <p style="color:#fff;">If just moving through public lobbies and killing everyone in PUBG has gotten a little stale for you, jump in with your squad to compete with other people and show us what you got !If just moving through public lobbies and killing everyone in PUBG has gotten a little stale for you, jump in with your squad to compete with other people and show us what you got !</p>
                      <div class="card" style="background:green; color:#fff;">
                          <div class="card-title">
                              Incentives 
                          </div>
                          <div class="card-body">
                              <ul class="prize">
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Total prizes worth 2k </li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> TSS Vouchers</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> Exclusive Wissenaire Merchandise</li>
                                  <li><i class="fa fa-trophy" style="color:gold;"></i> E-certificates from Wissenaire, IIT Bhubaneswar</li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-6">
                      <div class="card" style="background:#ff2f27; color:#fff;">
                          <div class="card-title">
                              Rules 
                          </div>
                          <div class="card-body">
                              <ul class="rules">
                                  <li><i class="fa fa-check"></i> Emulators are not allowed. </li>
                                  <li><i class="fa fa-check"></i> No teamups with other teams, if caught both the teams will be disqualified.</li>
                                  <li><i class="fa fa-check"></i> Everyone must take the screenshot of their game result.</li>
                                  <li><i class="fa fa-check"></i> Top 6 teams will be qualified for final round.</li>
                                  <li><i class="fa fa-check"></i> Incase of tie at 6th position, no.of kills will be considered. </li>
                                  <li><i class="fa fa-check"></i> Points in the qualifier are added to the points in final, to decide the winner.</li>
                                  <li><i class="fa fa-check"></i> Judgement made by Wissenaire, will be final and binding.</li>
                              </ul>
                          </div>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="js/front.js"></script>
  </body>
</html>