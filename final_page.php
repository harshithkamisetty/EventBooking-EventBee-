<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);
$event_id = $_SESSION['event_no'];
$event_display_query = "select * from event_details  where event_id='$event_id';";
$event_result = mysqli_query($con, $event_display_query) or die(mysqli_error($con));
$event_details = mysqli_fetch_assoc($event_result);
$_SESSION['no_tic_count'] = $_POST['no_count'];
$_SESSION['tic_name'] = $event_details['t_name'];
if ($event_details['t_price'] == 0) {
   $price = "FREE";
} else {
   $price = "₹" . " " .   $event_details['t_price'];
}
if (empty($event_details['venue_name'])) {
   $venue = "Online";
} else {
   $venue = $event_details['venue_name'];
}
$datetime = DateTime::createFromFormat('Y-m-d', $event_details['start_date']);
$time = $event_details['start_time'];
$s_t = date('h:i a', strtotime($time));
$time2 = $event_details['end_time'];
$e_t = date('h:i a', strtotime($time2));
$day_num = $datetime->format('d');
$month_name = $datetime->format('F');
$event_strt = $datetime->format('D') . ", " . $month_name . " " . $datetime->format('d') . ", " . $datetime->format('Y') . ", " . $s_t;
$datetime = DateTime::createFromFormat('Y-m-d', $event_details['end_date']);
$event_end = $datetime->format('D') . ", " . $month_name . " " . $datetime->format('d') . ", " . $datetime->format('Y') . ", " . $e_t;
$total = (int)$event_details['t_price'] * (int)$_SESSION['no_tic_count'];
$_SESSION['total'] = $total;
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Events</title>
   <link rel="stylesheet" href="home_style.css">
   <link rel="stylesheet" href="create_event_page.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/custom.css" />
   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/style.css" />
   <link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/dharmesh.css" />


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
         <span id="name" style="color: white;">Harshith</span>
         <a href="logout.php">Log Out</a>
         <a href="Home.php">Home</a>
         <a href="#news">Help</a>
      </div>
   </div>
   <div class="top_heading">
      <p id="top_heading_text">BOOKING CONFIRMATION</p>
   </div>
   <div class="" style="padding-top:3.3%;">

      <div class="container mb-5">
         <div class="row page-main-contain">

            <div class="clearfix"></div>
            <div class="col-lg-9 col-sm-12 col-md-9">
               <div class="booking-event">
                  <h3 class="event-title"> <?php echo $event_details['event_title'] ?></h3>
                  <p class="organiser-name"><b>Organizer : </b><?php echo $event_details['organizer'] ?> </p>
                  <p class="event-location"><strong>Venue</strong> : <?php echo $venue ?></p>
                  <p class="event-datetime">
                     <span><?php echo $event_strt ?> -</span>
                     <span> <?php echo $event_end ?></span>
                  </p>
                  <hr />
                  <div class="event-address booking-box">
                     <h3 class="box-title">Order Summary</h3>
                     <div class="box-descroptoin">
                        <div class="table-responsive">
                           <table class="table">
                              <thead class="table-head">
                                 <tr>
                                    <th>Ticket Type</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Fee</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Subtotal</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td width="45%"><?php echo $event_details['t_name'] ?></td>
                                    <td class="text-right"> ₹ <?php echo $event_details['t_price'] ?></td>
                                    <td class="text-right"> 0</td>
                                    <td class="text-center"><?php echo $_SESSION['no_tic_count'] ?></td>
                                    <td class="text-right">
                                       ₹ <?php
                                          echo $total ?>
                                    </td>
                                 </tr>
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th colspan="4" class="text-right">Order Total</th>
                                    <th class="text-right">₹ <?php
                                                               echo $total ?></th>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                  </div>


                  <div class="ticket-info booking-box">
                     <h3 class="box-title">Tickets Information</h3>
                     <div class="box-descroptoin">
                        <form method="POST" action="payment.php" accept-charset="UTF-8" id="booktickets"><input name="_token" type="hidden" value="sgkTkvPRu3ZJkOQNN3M8MPn935LpVRaRs0HUK3xk">
                           <input type="hidden" name="user_id" value="6196921986">
                           <input type="hidden" name="event_id" value="9547461591">
                           <input type="hidden" name="order_id" value="5H5O9B9Y51">
                           <input type="hidden" name="ticket_id[]" value=" MH165-92S4R-CN145-KL97A" />
                           <div class="form-ticket">
                              <h4 class="ticket-title">Name</h4>
                              <p class="ticket-id">(MH165-92S4R-CN145-KL97A-1)</p>
                              <?php
                              for ($i = 0; $i < $_SESSION['no_tic_count']; $i++) {
                              ?>
                                 <div class="row form-group">
                                    <div class="col-md-3 col-xs-12">
                                       <label class="label-text" style="width:100%;">Name On Tickets</label>
                                    </div>
                                    <div class="col-md-9 col-xs-12">
                                       <input type="text" name="fname_on_ticket[]" value="" class="form-control form-textbox" required />
                                    </div>
                                 </div>
                              <?php
                              }
                              ?>

                           </div>

                           <div class="form-ticket">
                              <h4 class="ticket-title">Other Information</h4>
                              <p class="policy">I accept the <a href="">terms of service</a> and have read the<a href=""> privacy policy.</a>. <br />I agree that EventBee may <a href="">share my information</a> with the event organizer.</p>
                              <div class="payment-btn">
                                 <a href="#reload" class="btn-p btn-cancel text-uppercase">CANCEL</a>

                                 <input type="submit" name="paynow" class="btn-p btn-payment text-uppercase" value="PAY NOW" />
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>

               </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-3">
               <div class="booking-event">
                  <div class="event-image">
                     <img src="uploads/<?php echo $event_details['event_poster']; ?>" class="image">
                  </div>
                  <div class="event-address booking-box">
                     <h3 class="box-title text-center">When & Where</h3>
                     <div class="box-descroptoin">
                        <div class="address">
                           <label>Venue</label>
                           <span><?php echo $venue ?></span>
                        </div>
                        <div class="date-time">
                           <label>Date and Time</label>
                           <p><?php echo $event_strt ?></p>
                           <p>TO</p>
                           <p> <?php echo $event_end ?></p>

                        </div>
                     </div>
                  </div>
                  <div class="event-organiser booking-box">
                     <h3 class="box-title">Organizer</h3>
                     <div class="box-descroptoin">
                        <div class="org-title">
                           <a href="#acm page" target="_blank"><?php echo $event_details['organizer'] ?></a>
                        </div>
                        <hr />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>