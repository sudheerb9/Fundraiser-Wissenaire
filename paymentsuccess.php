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
    
    $api = new Instamojo\Instamojo('de7a09f65c863d2fe7d13569e710ba69', 'af3c091d3e630443cef0e11edb0fdc6c','https://www.instamojo.com/api/1.1/');
    $payid = $_GET["payment_request_id"];
    try {
        $response = $api->paymentRequestStatus($payid);
        $event = $response['purpose'];
        if($response['status']=='Completed'){
            $contact = $response['payment_request']['buyer_phone'];
             $sql = "UPDATE `payments` SET `status` ='".$response['status']."' WHERE `id` = '".$response['id']."' ";
            if(mysqli_query($conn,$sql)){
                $sql = "INSERT INTO `events` (`email`, `contact`, `event`) VALUES ('".$email."','".$contact."', '".$event."')";
    		    if(mysqli_query($conn,$sql)){ 
    		        header("refresh:1 url='$event.php'");
    	            echo '<script type="text/javascript">alert("Congratulations!! You have registered for '.$event.' ")</script>';
    		    }
            }
            else {
                echo '<script type="text/javascript">alert("Please check the payment ! If money is deducted, please contact our team! ")</script>';
            }
        }
        else{
            echo '<script type="text/javascript">alert("Please check the payment ! If money is deducted, please contact our team! ")</script>';
        }
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
    
?>