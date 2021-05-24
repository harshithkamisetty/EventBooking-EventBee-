<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);
$count_event_numbers = "select MAX(event_id) from event_details;";
    $c_result = mysqli_query($con, $count_event_numbers) or die(mysqli_error($con));
    $row=mysqli_fetch_assoc($c_result);
    $_SESSION['event_no'] = $row['MAX(event_id)'];
    echo $_SESSION['event_no'];
    ?>