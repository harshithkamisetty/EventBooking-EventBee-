<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);
$user_id = $_SESSION['u_id'];
$event_display_query = "select * from event_details where user_id= '$user_id'; ";
$event_result = mysqli_query($con, $event_display_query) or die(mysqli_error($con));
$count_events = mysqli_num_rows($event_result);
?>
<!doctype html>
<html lang="en">

<head>



	<title> - Manage Events</title>



	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="home_style.css">
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap-toggle.min.css" />
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/tempusdominus-bootstrap-4.min.css" />
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap-formhelpers.min.css" />


	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/timepicker/jquery.timepicker.min.css">
	<link rel="stylesheet" type="text/css" href="http://eventz.clonegranny.com/public/css/bootstrap-datetimepicker.css">

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

			<span id="name" style="color: white;">Harshith</span>


			<a href="logout.php">Log Out</a>
			<a href="Home.php">Home</a>
			<a href="create_event_page.php">Create An Event</a>
		</div>
	</div>
	<div class="" style="padding-top:3.3%;">
		<style>
			.kactive {
				background-color: #F16334 !important;
			}
		</style>

		<div class="page-main-contain">
			<section class="user-events">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						</div>
					</div>
					<h2 class="text-heading">Manage Events</h2>
					<hr />
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="event-sidebar margin-top" id="sidebar-hover">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link  ||  " href="buyed_tickets.php">
											My Tickets
											<span class="label">14</span>
										</a>
									</li>


									<li class="nav-item">
										<a class="nav-link kactive" href="profile_display.php">
											Published Events
											<span class="label"><?php echo $count_events ?> </span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="tab-content">
								<div class="" id="past">
									<div class="eventbox-main">
										<div class="row">
											<div class="col-lg-6">
												<div class="eventbox-header">
													<h2>Publish Events</h2>
												</div>
											</div>
											<div class="col-lg-6 pr-4">
												<form class="search-sm pull-right" action="#" method="GET">
													<input type="text" name="event_search" class="form-control input-sm" maxlength="64" placeholder="Search" id="searcchs" value="" required="" />
													<button type="submit" class="btn btn-primary btn-sm data-btn"><i class="fa fa-search"></i></button>
												</form>
											</div>
										</div>

										<div class="eventbox-events">
											<?php
											while ($row = $event_result->fetch_assoc()) {


												$datetime = DateTime::createFromFormat('Y-m-d', $row['start_date']);
												$time = $row['start_time'];
												$s_t = date('h:i a', strtotime($time));
												$month_name = $datetime->format('F');
												$event_strt = $datetime->format('D') . ", " . $month_name . " " . $datetime->format('d') . ", " . $datetime->format('Y') . ", " . $s_t;
											?>
												<div class="eventbox">
													<h3 class="event-title wordwap"><?php echo $row['event_title']; ?></h3>
													<p class="event-time">
														<?php echo $event_strt ?>
													</p>
													<div class="event-link">

														<a href='attend_list.php?id=<?php echo $row['event_id'] ?>'><i class="fa fa-cog"></i> Manage</a>

														<a href='events_display.php?id=<?php echo $row['event_id'] ?>'><i class="fa fa-eye"></i> View</a>

													</div>
													<div class="event-label">

														<label class="event-label label-publish">Publish</label>
													</div>
												</div>
											<?php } ?>
										</div>

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