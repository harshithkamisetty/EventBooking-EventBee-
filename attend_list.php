<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);
$event_id = $_GET['id'];
$query2 = "select event_title from event_details where event_id='$event_id';";
$result = mysqli_query($con, $query2) or die(mysqli_error($con));
$event_name = mysqli_fetch_assoc($result);
$query1 = "select * from tickets_list where event_id='$event_id';";
$event_result = mysqli_query($con, $query1) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>

<head>
  <style>
    @media print {
      .noprint {
        visibility: hidden;
      }
    }

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #F16334;
      color: white;
    }

    #box_1 {
      height: 50px;
      width: auto;
      background-color: #F16334;
      text-align: center;
    }

    h2 {
      color: white;
    }

    .button {
      background-color: #4CAF50;
      /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .button2 {
      background-color: #F16334;
    }

    /* Blue */
  </style>
</head>

<body>

  <div id="box_1">
    <h2> <?php echo $event_name['event_title'] ?> </h2>
  </div>
  <table id="customers">
    <tr>
      <th>Order Id</th>
      <th>Name</th>
    </tr>
    <?php
    while ($row = $event_result->fetch_assoc()) {
    ?>
      <tr>
        <td><?php echo $row['ticket_id'] ?></td>
        <td><?php echo $row['name'] ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
  <div class="noprint">
    <a href="Home.php"><button class="button">click here Home Page</button></a>
    <button onclick="window.print()" class="button button2">Print</button>
  </div>

</body>

</html>