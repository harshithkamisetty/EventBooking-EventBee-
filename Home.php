<?php include('server.php') ?>
<?php

$event_display_query = "select * from event_details ";
$event_result = mysqli_query($con, $event_display_query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="home_style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body>
  <div class="topnav">
    <img id="logo" src="eventbee.PNG">
    <div class="search-container">
      <form>
        <input type="text" placeholder="Search Event" name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <div class="con">
      <?php
      if (isset($_SESSION['login'])) {
        if ($_SESSION['login'] == 1) {
          $check = "create_event_page.php"
      ?>
          <a href="logout.php">Log Out</a>
          <a href="profile_display.php">My Profile</a>


        <?php
        } else {
          $check = "login.php"
        ?>

          <a href="Signup.php">Signup</a>
          <a href="Login.php">Login</a>

        <?php
        }
      } else {
        $check = "login.php"
        ?>

        <a href="Signup.php">Signup</a>
        <a href="Login.php">Login</a>

      <?php
      }
      ?>
      <a href="help.html">Help</a>

      <a href="<?php echo $check ?>" id="change_link"><button name="check" style="padding: 0;
border: none;
background: none;">Create An Event</button></a>
    </div>
  </div>
  <section class="top_img">
    <div id="new_bg" style="background-image:url('test1.gif')">
    </div>

    <div class="slider_content">
      <h2 class="slider_title">Set up great Event, reach your audience, sell tickets and measure performance.</h2>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-6 col-sm-12">

        <p class="tit">Upcoming Events</p>
      </div>

    </div>

    <div class="row">
      <?php
      while ($row = $event_result->fetch_assoc()) {

        $datetime = DateTime::createFromFormat('Y-m-d', $row['start_date']);
        $time = $row['start_time'];
        $s_t = date('h:i a', strtotime($time));
        $month_name = $datetime->format('F');
        $event_strt = $datetime->format('D') . ", " . $month_name . " " . $datetime->format('d') . ", " . $datetime->format('Y') . ", " . $s_t;
        if (empty($row['venue_name'])) {
          $venue = "Online";
        } else {
          $venue = $row['venue_name'];
        }

        if (isset($_SESSION['login'])) {
          if ($_SESSION['login'] == 1) {

      ?>
            <div class="col-lg-4 col-md-6 col-sm-12 hover">
              <div class="box" style="position: relative;">
                <a href="events_display.php?id=<?php echo $row['event_id'] ?>"><img src="uploads/<?php echo $row['event_poster']; ?>" style="height:200px;width: 100%;"></a>
                <div class="box-content">
                  <p> <?php echo $event_strt ?></p>
                  <p class="event_name">
                    <a href="events_display.php?id=<?php echo $row['event_id'] ?>"><?php echo $row['event_title'] . " by " . $row['organizer'] ?></a>
                  </p>
                  <p class="venue"><?php echo $venue ?></p>
                  <a href='events_display.php?id=<?php echo $row['event_id'] ?>'><button class="button">Book Your Slot</button></a>
                </div>
              </div>
            </div>


          <?php
          } else {

          ?>

            <div class="col-lg-4 col-md-6 col-sm-12 hover">
              <div class="box" style="position: relative;">
                <a href="Login.php"><img src="uploads/<?php echo $row['event_poster']; ?>" style="height:200px;width: 100%;"></a>
                <div class="box-content">
                  <p> <?php echo $event_strt ?></p>
                  <p class="event_name">
                    <a href="Login.php"><?php echo $row['event_title'] . " by " . $row['organizer'] ?></a>
                  </p>
                  <p class="venue"><?php echo $venue ?></p>
                  <a href='Login.php'><button class="button">Book Your Slot</button></a>
                </div>
              </div>
            </div>

          <?php
          }
        } else {

          ?>


          <div class="col-lg-4 col-md-6 col-sm-12 hover">
            <div class="box" style="position: relative;">
              <a href="Login.php"><img src="uploads/<?php echo $row['event_poster']; ?>" style="height:200px;width: 100%;"></a>
              <div class="box-content">
                <p> <?php echo $event_strt ?></p>
                <p class="event_name">
                  <a href="Login.php"><?php echo $row['event_title'] . " by " . $row['organizer'] ?></a>
                </p>
                <p class="venue"><?php echo $venue ?></p>
                <a href='Login.php'><button class="button">Book Your Slot</button></a>
              </div>
            </div>
          </div>



      <?php
        }
      }
      ?>





    </div>

    <div class="row">
      <div class="col-lg text-center">
        <br>
        <button class="button">SEE MORE</button>

      </div>
    </div>


  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-6 col-sm-12">

        <p class="tit">Search By Category</p>
      </div>
    </div>
    <div class="row image-drawer">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 img-draw">
        <div class="hovereffect">
          <a href="#sports">
            <img class="img-responsive" src="sports_home.jpg" alt="">
            <div class="overlay">
              <p class="image-text">Sports </p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 img-draw">
        <div class="hovereffect">
          <a href="#food">
            <img class="img-responsive" src="food_home_img.jpg" alt="">
            <div class="overlay">
              <p class="image-text">Cooking</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 img-draw">
        <div class="hovereffect">
          <a href="http://eventz.clonegranny.com/events?cat=62">
            <img class="img-responsive" src="photo_home_img.jpg" alt="">
            <div class="overlay">
              <p class="image-text">Photography</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 img-draw">
        <div class="hovereffect">
          <a href="http://eventz.clonegranny.com/events?cat=118">
            <img class="img-responsive" src="tech_home_img.jpg" alt="">
            <div class="overlay">
              <p class="image-text">Bussiness & Technology</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 img-draw">
        <div class="hovereffect">
          <a href="#food">
            <img class="img-responsive" src="arts.png" alt="">
            <div class="overlay">
              <p class="image-text">other</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 img-draw">
        <div class="hovereffect">
          <a href="#sports">
            <img class="img-responsive" src="concerts_img_home.jpg" alt="">
            <div class="overlay">
              <p class="image-text">concerts & performances </p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 img-draw">
        <div class="hovereffect">
          <a href="#food">
            <img class="img-responsive" src="food_home_img.jpg" alt="">
            <div class="overlay">
              <p class="image-text">Cooking</p>
            </div>
          </a>
        </div>
      </div>

    </div>



  </div>
  </div>
</body>
<script>
  $(document).ready(function() {
    var intials = $('#name').text().charAt(0);
    var proimage = $('#proimage').text(intials);
  });
</script>

</html>