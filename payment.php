<?php 
session_start();
$_SESSION['name_on_ticket']=$_POST['fname_on_ticket'];
$amount=$_SESSION['total']*100;
require_once('config_2.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment Checkout Form</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<link rel="stylesheet" href="pay-css.css">

</head>
<style>
      .razorpay-payment-button {
      
       
        height:3.5rem;
  width: 25rem;
  background: #F16334;
  text-align: center;
  color:blue;
  font-size: 1.5rem;
  cursor: pointer;
  margin:1rem 0;
  box-shadow: 0 .3rem .5rem #2196F3;
  opacity: .9;
  color: white;
  border-radius: 19px;
      }
    </style>
<body>
	

<div class="wrapper">
  <div class="payment">
    
    
    <h1>Payment Gateway</h1>
 
    <h2>Package <?php echo $_SESSION['payment_details'] ?>  </h2>
 
    <h2>amount: Rs.<?php echo $_SESSION['total'] ?>  </h2>
    <form action="booked_confirm.php" method="POST">
    
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $razor_api_key; ?>"
        data-amount="<?php echo $amount ?>"
        data-buttontext="Pay Now"
        data-name="EventBee"
        data-description="Test Txn with RazorPay"
        data-image="eventbee.PNG"
        data-prefill.name="card holder name"
        data-prefill.email="abc@gmail.com"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" value="Hidden Element" name="hidden">
    </form>      
  </div>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>
</html>