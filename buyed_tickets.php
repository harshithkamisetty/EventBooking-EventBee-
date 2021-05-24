<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);
$user_id = $_SESSION['u_id'];
$event_display_query = "select * from login where u_id= '$user_id'; ";
$event_result = mysqli_query($con, $event_display_query) or die(mysqli_error($con));
$profile_name = mysqli_fetch_assoc($event_result);
$buyed_events_query = "select DISTINCT event_id from tickets_list where user_id='$user_id'; ";
$buyed_events_result = mysqli_query($con, $buyed_events_query) or die(mysqli_error($con));
$rowcount = mysqli_num_rows($buyed_events_result);


?>
<!doctype html>
<html lang="en">

<head>


	<!-- Required meta tags -->

	<!-- SEO DATA -->
	<title> </title>
	<meta name="description" content="Discover Great Events or Create Your Own &amp; Sell Tickets">
	<meta name="keywords" content="Eventz, Event, Events, Create event, Manage event">
	<!-- SEO DATA -->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap-toggle.min.css" />
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/tempusdominus-bootstrap-4.min.css" />
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap-formhelpers.min.css" />
	<link rel="stylesheet" href="home_style.css">
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/font-awesome/css/font-awesome.min.css" />

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




			<a href="logout.php">Log Out</a>
			<a href="Home.php">Home</a>
			<a href="create_event_page.php">Create An Event</a>
		</div>
	</div>

	<div class="" style="padding-top:3.3%;">

		<div class="page-main-contain">
			<section class="user-tickets">
				<div class="container">
					<h2 class="text-heading">My Tickets</h2>
					<p class="order-details text-center"><?php print($profile_name['f_name']); ?></p>
					<div class="row">
						<div class="col-xl">
							<div class="user-tab-contain">
								<div class="row tab-header">

								</div>

								<div class="tab-content col-lg-8">
									<div id="item1" class="tab-pane fade in active">
										<?php
										if ($rowcount > 0) {
											while ($row = $buyed_events_result->fetch_assoc()) {
												$num = $row['event_id'];
												$query2 = "select event_title,event_poster,start_date,start_time from event_details where event_id='$num';";
												$query2_result = mysqli_query($con, $query2) or die(mysqli_error($con));
												$query2_out = mysqli_fetch_assoc($query2_result);

												$datetime = DateTime::createFromFormat('Y-m-d', $query2_out['start_date']);
												$time = $query2_out['start_time'];
												$s_t = date('h:i a', strtotime($time));
												$month_name = $datetime->format('F');
												$event_strt = $datetime->format('D') . ", " . $month_name . " " . $datetime->format('d') . ", " . $datetime->format('Y') . ", " . $s_t;
										?>


												<a href='print_ticket.php?id=<?php print $num ?>'>
													<div class="rev-box rev-box-border row">
														<div class="col-lg-3 col-sm-12 col-md-4 box-imager-wrapper">
															<img src="uploads/<?php echo $query2_out['event_poster']; ?>" class="box-image-rev">
														</div>
														<div class="col-lg-9 col-sm-12 col-md-8 col-xs-12">
															<p class="text-uppercase box-rev-box-title"><?php echo $event_strt ?></p>
															<h5 class="text-capitalize box-conetent-title"><?php echo $query2_out['event_title']; ?></h5>

														</div>
													</div>
												</a>
											<?php
											}
										} else {
											?>
											<p class="text-uppercase box-rev-box-title"><?php echo "No Tickets Yet" ?></p>

										<?php
										}
										?>

									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>

</html>