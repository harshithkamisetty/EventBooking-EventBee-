<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);
if (isset($_SESSION['event_no'])) {
	$event_id = $_SESSION['event_no'];
} else {
	$event_id = $_GET['id'];
	$_SESSION['event_no'] = $event_id;
}
$event_display_query = "select * from event_details  where event_id='$event_id';";
$event_result = mysqli_query($con, $event_display_query) or die(mysqli_error($con));
$event_details = mysqli_fetch_assoc($event_result);

if ($event_details['t_price'] == 0) {
	$price = "FREE";
} else {
	$price = "₹" . " " .	$event_details['t_price'];
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
$_SESSION['payment_details'] = $event_details['event_title'] . " by " . $event_details['organizer'];
$_SESSION['event_strt_date'] = $event_strt;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Events</title>
	<link rel="stylesheet" href="home_style.css">
	<link rel="stylesheet" href="events_display.css">
	<link rel="stylesheet" href="create_event_page.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/custom.css" />
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
		</div>
	</div>
	<br><br>
	<div class="" style="padding-top:200px;">
		<section class="blur" style="background:url('uploads/<?php echo $event_details['event_poster']; ?>');width: 100%;height: 150px;"></section>

		<div class="page-main-contain">
			<div class="container mt-minus-380">
				<div class="row detail-box-wrapper">
					<div class="col-lg-8 col-sm-12 detail-box-image">
						<img src="uploads/<?php echo $event_details['event_poster']; ?>" class="box-image-rev" style="height: 490px; width: 780px;">
					</div>
					<div class="col-lg-4 col-sm-12 detail-box-content">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 k-date">
								<span style="text-transform: uppercase;"><?php echo $month_name ?></span>
								<p><?php echo $day_num ?></p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h1 class="detail-title">
									<?php echo $event_details['event_title'] ?>
								</h1>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p> <?php echo $price ?></p>
							</div>
							<div class="col-lg-12 col-sm-12 col-md-12 date-time-set">
								<h6 class="descripton-content-title">Date and Time</h6>
								<p><?php echo $event_strt ?> -</p>
								<p> <?php echo $event_end ?></p>

							</div>
							<div class="col-lg-12 col-sm-12 col-md-12 ">
								<h6 class="descripton-content-title">Location</h6>
								<p><?php echo $venue ?></p>
								<p> </p>

							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-6 col-sm-8 col-lg-7 social-icon-box">

									</div>

									<div class="col-6 col-sm-4 col-lg-5">
										<button style="cursor: pointer;" class="register-btn hide-register text-uppercase " id="myBtn">Buy Tickets</button>

										<!-- The modal_top -->
										<div id="mymodal_top" class="modal_top">

											<!-- modal_top content -->
											<div class="modal_top-content">
												<!--- <span class="close">&times;</span>-->

												<div class="row">
													<div class="col-14 col-md-8">
														<p style="text-align: center;font-size: large;font-weight: 600;" id="font_1"><?php echo $event_details['event_title'] ?>
														</p>
														<p style="text-align: center;font-size: smaller;" id="font_1"><?php echo $event_strt ?>

														</p>

														<hr style="width:50%;text-align:left;margin-left:20">
														<div class="col-15 col-md-14" style="background-color: white;">
															<p style="text-align: left;font-size: large;font-weight: 300;" id="font_1"><?php echo $event_details['t_name'] ?>

															<form method="POST" action="final_page.php">

																<select class="blocks_drop123" name="no_count" id="type" style="float: right;">
																	<option value=1>01</option>
																	<option value=2>02</option>
																	<option value=3>03</option>
																	<option value=4>04</option>
																	<option value=5>05</option>

																</select>

																<p style="text-align: left;font-size: smaller;font-weight: 500;" id="font_1"><?php echo $price ?> </p>
																<p style="text-align: left;font-size: smaller;" id="font_1">sales ends on May 30 </p>
																</p>
														</div>
													</div>


													<div class="col-5 col-md-4">
														<div id="img_last" style="background-image:url('uploads/<?php echo $event_details['event_poster']; ?>');  background-size:cover;">
															<span class="close">&times;</span>

														</div>
														<p style="text-align: center;font-size: large;font-weight: 600;" id="font_1"><?php echo $event_strt ?></p>

													</div>
													<div class="row" style="text-align: center;">

														<div class="col-12 col-md-8" style="align-content: center;">
															<input type="submit" class="btn" name="tic_count" style="background-color: yellowgreen; " value="Register"></input>
														</div>
														</form>
													</div>
												</div>

											</div>
										</div>
										<script>
											// Get the modal_top
											var modal_top = document.getElementById("mymodal_top");

											// Get the button that opens the modal_top
											var btn = document.getElementById("myBtn");

											// Get the <span> element that closes the modal_top
											var span = document.getElementsByClassName("close")[0];

											// When the user clicks the button, open the modal_top 
											btn.onclick = function() {
												modal_top.style.display = "block";
											}

											// When the user clicks on <span> (x), close the modal_top
											span.onclick = function() {
												modal_top.style.display = "none";
											}

											// When the user clicks anywhere outside of the modal_top, close it
											window.onclick = function(event) {
												if (event.target == modal_top) {
													modal_top.style.display = "none";
												}
											}
										</script>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="container">
						<div class="row detail-box-wrapper" style="margin-top:0px;">
							<div class="col-lg-12 col-sm-12 col-md-12 cover-wrapper-details">
								<div class="container">
									<div class="row">
										<div class="col-lg-12 cover-wrapper-child">
											<div class="row">
												<div class="col-md-12 col-lg-12 col-sm-12 descripton-content">
													<h6>Description</h6>
													<p><span class="ILfuVd"><span class="e24Kjd"><?php echo $event_details['event_desc'] ?></span></span></p>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="share-with-social">
										<div class="col-lg-12 col-md-12 col-xs-12 descripton-content social-parent cover-wrapper-child">
											<h6>Share with friends</h6>
											<a href="##facebook" class="social-button social-logo-detail">
												<i class="fa fa-facebook"></i>
											</a>
											<a href="##twitter" class="social-button social-logo-detail">
												<i class="fa fa-twitter"></i>
											</a>
											<a href="##" class="social-button social-logo-detail">
												<i class="fa fa-linkedin"></i>
											</a>
											<a href="##google" class="social-button social-logo-detail">
												<i class="fa fa-google"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container" style="margin-top:40px;">
				<div class="row detail-box-wrapper">
					<div class="col-lg-12 col-sm-12 col-md-12 cover-wrapper-details">
						<div class="org-box-main">
							<div class="org-boxes">
								<div class="image-box-org">
									<a href="#org_profile"><img src="org_image.png"></a>
								</div>
								<div class="org-link-box text-center">
									<p class="org-box-tit text-center"><?php echo $event_details['organizer'] ?></p>
									<button class="btn k-btn-orga pro-choose-file mb-2 ctog" data-toggle="modal" data-target="#contact-org"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp; Contact The organizer</button>
									<span class="orge-prof">
										<a href="#org_profile" class="k-btn-orga pro-choose-file" target="_blank"><i class="fa fa-eye"></i>View Organizer profile</a>
									</span>
								</div>
							</div>
						</div>
						<!-- Start Model -->
						<div id="contact-org" class="modal fade bd-example-modal-lg" role="dialog">
							<div class="modal-dialog modal-xs">
								<div class="modal-content ticket-registion">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Organizer Contact</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<div id="errors" style="display: none;">
											<ul class="alert alert-danger"></ul>
										</div>
										<form id="org-con-form" method="post" action="#ocontact">

											<div class="form-group row">
												<label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
												<div class="col-sm-10">

													<input type="text" class="form-control" id="staticEmail" name="name">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
												<div class="col-sm-10">
													<input type="email" class="form-control" id="inputPassword" name="email">
												</div>
											</div>
											<div class="form-group row">
												<label for="subject" class="col-sm-2 col-form-label">Subject</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="subject" name="subject">
												</div>
											</div>
											<div class="form-group row">
												<label for="msg" class="col-sm-2 col-form-label">Message</label>
												<div class="col-sm-10">
													<textarea name="message" class="form-control" rows="5" id="msg" style="resize: none;"></textarea>
												</div>
											</div>
											<input type="submit" id="organizer-form" class="btn btn-flat btn-primary" value="Submit">
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- End Model -->
					</div>
				</div>

			</div>
		</div>
	</div>
	<?php
	if (isset($_POST['tic_count'])) {
		$_SESSION['no_tic_count'] = $_POST['no_count'];
	}
	?>