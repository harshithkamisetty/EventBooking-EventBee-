<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);
$event_id = $_GET['id'];
$user_id = $_SESSION['u_id'];
$event_display_query = "select * from tickets_list  where event_id='$event_id' and user_id='$user_id';";
$event_result = mysqli_query($con, $event_display_query) or die(mysqli_error($con));

$query2 = "select event_title,start_date,start_time,end_date,end_time,t_price from event_details where event_id='$event_id';";
$query2_result = mysqli_query($con, $query2) or die(mysqli_error($con));
$query2_out = mysqli_fetch_assoc($query2_result);

$datetime = DateTime::createFromFormat('Y-m-d', $query2_out['start_date']);
$time = $query2_out['start_time'];
$s_t = date('h:i a', strtotime($time));
$month_name = $datetime->format('F');
$event_strt = $datetime->format('D') . ", " . $month_name . " " . $datetime->format('d') . ", " . $datetime->format('Y') . ", " . $s_t;


$datetime = DateTime::createFromFormat('Y-m-d', $query2_out['end_date']);
$time = $query2_out['end_time'];
$s_t = date('h:i a', strtotime($time));
$month_name = $datetime->format('F');
$event_end = $datetime->format('D') . ", " . $month_name . " " . $datetime->format('d') . ", " . $datetime->format('Y') . ", " . $s_t;
$count_number = mysqli_num_rows($event_result);
$order_total = (int)$query2_out['t_price'] * (int)$count_number;
?>
<!doctype html>
<html lang="en">

<head>


	<!-- Required meta tags -->

	<!-- SEO DATA -->
	<title> order</title>
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
<style>
	@media print {
		.topnav {
			visibility: hidden;
		}

		.noprint {
			visibility: hidden;
		}
	}
</style>

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
		<div class="container-fluid about-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 about-parents-wrapper-min">
						<h2 class="text-uppercase about-title">Order </h2>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row page-main-contain">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<h2 class="order-titles">Order For <a href='events_display.php?id=<?php echo $event_id ?>'><?php print $query2_out['event_title'] ?></a></h2>
								<p class="order-details">Order Info
									<br>
									<?php print $event_strt ?> TO <?php print "  "	?> <?php print $event_end ?>
								</p>
							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<br>

							</div>

							<div class="col-md-3 col-sm-12 col-xs-12 col-lg-3 order-boxes
					order-btn-books text-center">
								<div class="noprint">
									<a class="pro-choose-file text-uppercase" onclick="window.print()" target="_blank">PRINT TICKETS</a>
								</div>
								<br />
								<div>

								</div>

								<div>
									<br>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-lg-9 order-boxes col-md-9 order-details-box">
								<p class="tickets-pays">Tickets</p>
								<table class="table">
									<thead class="text-center">
										<th>TicketId</th>
										<th>Name</th>
										<th>Price</th>

									</thead>
									<tbody>
										<?php
										while ($row = $event_result->fetch_assoc()) {
										?>
											<tr class="text-center">
												<td><?php echo $row['ticket_id']; ?></td>
												<td>
													<?php echo $row['name']; ?>
												</td>
												<td>₹ <?php echo $query2_out['t_price']; ?></td>

											</tr>
										<?php
										}
										?>
										<tr>
											<th colspan="2" class="text-right">Order Total</th>
											<th class="text-center">₹ <?php echo $order_total ?></th>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-xs-12 col-sm-12 col-lg-9 order-boxes col-md-9">
								<a href="buyed_tickets.php" class="back-page-selected"><i class="fa fa-arrow-left"></i> Back to Current Orders </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Model Cialm -->

		<!-- Model Cialm -->
	</div>

</body>

</html>