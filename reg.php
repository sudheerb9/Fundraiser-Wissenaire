<?php 
define('BASEPATH', __DIR__.'/');

require __DIR__.'/instamojo/src/Instamojo.php';

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
	

    $name = $result['name'];
    $contact = $_POST['contact'];
	$event = $_POST['event'];
	$amount = $_POST['price'];
	
	$sql = "SELECT * FROM events WHERE email = '$email' AND event = '$event'";
	$r=mysqli_query($conn, $sql);
	$checkrow=mysqli_num_rows($r);
	if ($checkrow > 0) {
	   echo '<script type="text/javascript">alert("You have already registered for '.$event.' ")</script>';
	   header("refresh:1 url='$event.php'");
	   mysqli_close($conn);
	} 
	else {
    $api = new Instamojo\Instamojo('de7a09f65c863d2fe7d13569e710ba69', 'af3c091d3e630443cef0e11edb0fdc6c','https://www.instamojo.com/api/1.1/');


    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $event,
            "amount" => $amount,
            "buyer_name" => $name,
            "phone" => $contact,
            "send_email" => false,
            "send_sms" => false,
            "email" => $email,
            'allow_repeated_payments' => false,
            "redirect_url" => "http://fundraiser.wissenaire.org/paymentsuccess.php",  
            "webhook" => "http://fundraiser.wissenaire.org/paymentsuccess.php" 
            ));
        print_r($response);
    
        $pay_ulr = $response['longurl'];
    
        $sql = "INSERT INTO `payments` (`paymentid`, `email`, `contact`, `buyer_name`, `amount`, `purpose`, `status`) VALUES ('".$response['id']."','".$response['email']."', '".$response['phone']."',  '".$response['name']."', '".$response['amount']."', '".$response['purpose']."', '".$response['status']."')";
        if(mysqli_query($conn,$sql)){
            mysqli_close($conn);
        }
        else {
                echo '<script type="text/javascript">alert("Please check the payment ! If money is deducted, please contact our team! ")</script>';
        }
    
        header("Location: $pay_ulr");
        exit();
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }      

}
?>