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

        $sql = "SELECT * FROM events WHERE email = '$email' AND event = 'quiz1'";
		$r=mysqli_query($conn, $sql);
		$checkrow=mysqli_num_rows($r);
		if ($checkrow == 0) {
		   echo '<script type="text/javascript">alert("You have not registered for XI Factor yet ")</script>';
		   header('location:register.php');
		   mysqli_close($conn);
		}

		
    if(isset($_POST['submit'])){

	    $query = "INSERT INTO quiz1 (email, question1, question2, question3, question4, question5) VALUES ('".$result['email']."', '".$_POST['question1']."',  '".$_POST['question2']."',  '".$_POST['question3']."',  '".$_POST['question4']."',  '".$_POST['question5']."')";
	    if(mysqli_query($conn, $query)){
	        echo "<script>alert('Congratulations! You have successfully taken the quiz')</script>";
	        header('refresh:2 , url=home.php');
	    }
	    else{
	        echo "<script>alert('Error in posting your answers!')</script>";
	    }
	}
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script>
        function quiz(){
            $('#after').removeClass('hidden');
            $('#before').addClass('hidden');

        }
    </script>
    

    <style>
        .hidden{
            display:none;
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
          <li class="active"><a href="#play" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Participate </a>
            <ul id="play" class="collapse list-unstyled ">
              <li><a href="photography.php">Through the lens</a></li>
              <li><a href="arts.php">Artistas manos amigas</a></li>
              <li class="active"><a href="quiz1.php">XI Factor </a></li>
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
            <h2 class="h5 no-margin-bottom">XI Factor</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container">
                <div id="before" class="">
                    <p> Are you ready to attempt the quiz ? </p>
                    <p>Beware ! You can only attempt once !! </p><br>
                    <button class="btn btn-primary" onclick="quiz()"> Start the quiz </button>
                </div>
                <div id="after" class="hidden">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-12 form-control-label">the first question of the quiz is the first question of the quiz</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="question1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 form-control-label">the second question of the quiz is the first question of the quiz</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="question2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 form-control-label">the third question of the quiz is the first question of the quiz</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="question3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 form-control-label">the fourth question of the quiz is the first question of the quiz</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="question4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 form-control-label">the fifth question of the quiz is the first question of the quiz</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="question5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 offset-sm-2">
                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
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
    

    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="js/front.js"></script>
  </body>
</html>