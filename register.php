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
    <script src="vendor/jquery/jquery.min.js"></script>

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
          <li><a href="home.php"> <i class="icon-home"></i>Home </a></li>
          <li><a href="rules.php"> <i class="icon-padnote"></i>Rules and Regulations </a></li>
          <li  class="active"><a href="register.php"> <i class="icon-check"></i>Register </a></li>
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
            <h2 class="h5 no-margin-bottom">Register </h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container">
            <form method="post" action="reg.php">
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Name of the Participant</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control is-valid" value="<?php echo $result['name']; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Email address</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control is-valid" value="<?php echo $result['email']; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Contact no.</label>
                    <div class="col-sm-9">
                      <input type="tel" name="contact" class="form-control phone" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Event </label>
                    <div class="col-sm-9">
                      <select class="custom-select priceClass" id="event" name="event">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="photography">Through the lens - Photography Competition</option>
                        <option value="arts">Artistas manos amigas - Arts competition</option>
                        <option value="quiz1">XI Factor - Cricket Quiz</option>
                        <option value="quiz2">HydroChloroQuizone - A SciTechBiz Quiz</option>
                        <option value="pubg">Pubg Competition</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Amount to be paid</label>
                    <div class="col-sm-9">
                      <input type="number" name="price" class="form-control" min="???" max="1000">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 offset-sm-2">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $(".priceClass").change(function(){
                console.log('function entered');
                console.log('' + $("select[name=event]").val() + '');
                var event =$("select[name=event]").val();
                console.log('event is '+ event +'');
                if($("select[name=event]").val()=='photography') var min= 50 ; 
                if($("select[name=event]").val()=='quiz1') var min= 30 ; 
                if($("select[name=event]").val()=='arts')  var min= 50 ; 
                if($("select[name=event]").val()=='quiz2') var min= 30 ; 
                if($("select[name=event]").val()=='pubg') var min= 100 ; 
                
                 $("input[name=price]").attr({
                   "max" : 1000,       
                   "min" : min         
                });
            });
            
        });
    </script>
       
    <script>
         $(document).ready(function(){
                console.log('phone');
                $(".phone").blur(function(e){
                    phone = $(this).val();
                    phone = phone.replace(/[^0-9]/g,'');
                    if (phone.length != 10)
                    {
                        alert('Enter a valid Phone no.');
                        $(".phone").addClass("is-invalid");
                        $(".phone").removeClass("is-valid");
                    }
                    else {
                        $(".phone").addClass("is-valid");
                        $(".phone").removeClass("is-invalid");
                    }
                    
                });
         });
    </script>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="js/front.js"></script>
  </body>
</html>