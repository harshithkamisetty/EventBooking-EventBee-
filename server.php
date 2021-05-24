<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "event_bee";
$con = mysqli_connect($host, $user, $password, $db);


if (isset($_POST['login_user'])) {
  $uname = $_POST['username'];
  $_SESSION['username'] = $uname;
  $password = md5($_POST['password']);
  $sql = "select * from login where email_id= '" . $uname . "' AND password='" . $password . "'";
  $result =  mysqli_query($con, $sql);
  $no_rows = mysqli_num_rows($result);
  $login_sucess = mysqli_fetch_assoc($result);
  $_SESSION['u_id'] = $login_sucess['u_id'];
  if ($no_rows > 0) {
    $_SESSION['login'] = 1;
?>
    <script>
      alert("succesfully logged in!");

      location.replace("Home.php");
    </script>
  <?php
  } else {

  ?>
    <script>
      alert("You have Entered Wrong Crentials");

      location.replace("login.php");
    </script>
    <?php

  }
}
if (isset($_POST['reg_user'])) {
  $f_name = $_POST['f_name'];
  $emailid = $_POST['emailid'];
  $l_name = $_POST['l_name'];
  $mobile = $_POST['mobile'];
  $country = $_POST['country'];
  $pass = md5($_POST['pass']);
  $c_pass = md5($_POST['pass1']);
  if ($pass == $c_pass) {
    $check_query = "select * from login where email_id='" . $emailid . "' or m_no='" . $mobile . "'";
    $insert_query_result = mysqli_query($con, $check_query);
    $user = mysqli_fetch_assoc($insert_query_result);
    if ($user) {
    ?>
      <script>
        alert("Already Existing User");
        location.replace("login.php");
      </script>
      <?php

    } else {
      $i_sql = "insert into login (email_id,f_name,l_name,m_no,password,country) values('$emailid','$f_name','$l_name','$mobile','$pass','$country'); ";
      $insert_query_result = mysqli_query($con, $i_sql);
      if ($insert_query_result) {

      ?>
        <script>
          alert("Susefully Submitted");
          location.replace("Home.php");
        </script>
      <?php

      } else {
      ?>
        <script>
          alert("Try again");
          location.replace("Signup.php");
        </script>
    <?php
      }
    }
  } else {
    ?>
    <script>
      alert("Passoword Didn't match");
      location.replace("Signup.php");
    </script>
  <?php
  }
}
if (isset($_POST['c_event'])) {
  $event_title = $_POST['event_title'];
  $orgnizer = $_POST['org'];

  $venue_name = $_POST['venue_name'];

  $e_link = $_POST['e_link'];
  $e_s_date = $_POST['e_s_date'];

  $e_s_time = $_POST['e_s_time'];
  $e_e_date = $_POST['e_e_date'];
  $t_name = $_POST['t_name'];
  $e_e_time = $_POST['e_e_time'];
  if (isset($_POST['t_price'])) {
    $t_price = $_POST['t_price'];
  } else {
    $t_price = 0;
  }
  $t_quantity = $_POST['t_quantity'];
  $desc = $_POST['message'];
  $u_id = $_SESSION['u_id'];

  $file = $_FILES["file"];
  $name = pathinfo($_FILES["file"]["name"], PATHINFO_BASENAME);
  $insert_query_events = "insert into event_details(event_title,organizer,online_link,venue_name,start_date,start_time,end_date,end_time,event_poster,event_desc,t_name,t_price,t_count,user_id)values('$event_title','$orgnizer','$e_link','$venue_name','$e_s_date','$e_s_time','$e_e_date','$e_e_time','$name','$desc','$t_name','$t_price','$t_quantity','$u_id');";
  $insert_query_event_result = mysqli_query($con, $insert_query_events) or die(mysqli_error($con));
  if ($insert_query_event_result) {
    move_uploaded_file($_FILES["file"]["tmp_name"], "Uploads/" . $name);
    $count_event_numbers = "select MAX(event_id) from event_details;";
    $c_result = mysqli_query($con, $count_event_numbers) or die(mysqli_error($con));
    $row=mysqli_fetch_assoc($c_result);
    $_SESSION['event_no'] = $row['MAX(event_id)'];
  ?>
    <script>
      alert(<?php echo $_SESSION['event_no'] ?>);
      location.replace("events_display.php");
    </script>
    <?php } else { ?>
      <script>
        alert("Try again");
        location.replace("create_event_page.php");
      </script>
  <?php
  }
}
  ?>