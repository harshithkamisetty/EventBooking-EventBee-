<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);
$user_id = $_SESSION['u_id'];
$event_id = $_SESSION['event_no'];
$names_tostore = $_SESSION['name_on_ticket'];
$ticket_name = $_SESSION['tic_name'];
$razorpay_payment_id = $_POST['razorpay_payment_id'];
for ($i = 0; $i < count($names_tostore); $i++) {
   $ticket_tostore = "insert into tickets_list(ticket_name,event_id,user_id,name) values ('$ticket_name','$event_id','$user_id','$names_tostore[$i]')";
   $insert_query_result = mysqli_query($con, $ticket_tostore);
}
$count = count($names_tostore);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Scratch Card</title>
   <link rel="stylesheet" href="booked_confirm_style.css" />
   <link rel="stylesheet" href="home_style.css" />
   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap-toggle.min.css" />
   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/tempusdominus-bootstrap-4.min.css" />
   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap-formhelpers.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/custom.css" />
   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/style.css" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
   </script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
   </script>
   <style>
      .custom {
         width: 600px;
         min-height: 400px;
      }
   </style>
   <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
   <script src="./app.js" defer></script>
   <script src="./wScratchpad.min.js"></script>
</head>

<body>
   <div class="topnav">
      <img id="logo" src="eventbee.PNG">
      <div class="search-container">
         <form>
            <input type="text" placeholder="Search for Field" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
         </form>
      </div>
      <div class="con">

         <a href="logout.php">Log Out</a>
         <a href="#myprofile">My Profile</a>
         <a href="help.html">Help</a>
         <a href="Home.php">Home</a>
      </div>
   </div>
   <div class="top_heading">
      <p id="top_heading_text">Confirm</p>
   </div>
   <div class="container">
      <div class="row pb-5">
         <div class="col-md-10 col-sm-12 col-xs-12 col-lg-10 book-box offset-lg-1 col-lg-offset-1 offset-md-1 col-md-offset-1">
            <div class="row">
               <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 book-box-inner">
                  <div class="row">
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <h2>You're going to <span style="color:#f16334"><?php echo $_SESSION['payment_details'] ?></span></h2>
                        <h2><?php echo $names_tostore[0] ?></h2>
                     </div>
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <p class="cale-o">
                           <i class="fa fa-calendar-check-o"></i>
                           <span><?php echo $_SESSION['event_strt_date'] ?></span>
                        </p>
                     </div>
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <p class="toikcek-o">Your order has been saved to My Tickets </p>
                     </div>
                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <p class="book-list"><i class="fa fa-check"></i><a href="#print" target="_blank">Order Id : #<?php echo $razorpay_payment_id; ?> </a> <?php echo $count ?> Tickets</p>
                        <p class="book-list"><i class="fa fa-check"></i>Your tickets have been sent to <b>
                              your mail !
                           </b>
                        </p>
                     </div>
                     <div class="container-fluid">


                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">
                           Click Here to check exclusive offer for you!!
                        </button>

                        <!-- Modal Code -->
                        <div class="modal fade" id="modal" role="dialog">
                           <div class="modal-dialog">
                              <!-- '.custom' class added here to do the same -->
                              <div class="modal-content custom">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                       ×
                                    </button>
                                    <h4 class="modal-title">

                                    </h4>
                                 </div>
                                 <div class="modal-body">
                                    <div id="container">
                                       <div id="card"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>

</body>

</html>