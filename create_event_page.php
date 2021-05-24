<?php include('server.php') ?>
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
         <a href="#news">Help</a>
         <a href="Home.php">Home</a>

      </div>
   </div>
   <div class="top_heading">
      <p id="top_heading_text">CREATE EVENT</p>
   </div>
   <div class="col-lg-3 col-sm-12 col-md-9">
      <img id="text_symbol" src="text_symbol_eventbee.png">
   </div>
   <form method="post" novalidate id="form1" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
      <div class="content">

         <div class="row">

            <div class="col-lg-9 col-sm-12 col-md-9">
               <p class="headings">Basic Info</p>
               <p class="matter">Name your event and tell event-goers why they should come. Add details that highlight what makes it unique.</p>


               <br>
               <input class="blocks" type="text" placeholder="Event Title" name="event_title" required=true><br><br>
               <input class="blocks" type="text" placeholder="Organizer" name="org" required=true><br><br>

               <select class="blocks_drop" name="a_Type" id="type">
                  <option value="Type">Type</option>
                  <option value="Concertorperformance">Concert Or Performance</option>
                  <option value="opel">Training & Workshop</option>
                  <option value="audi">Seminar</option>
                  <option value="audi">Game Or Competition</option>
               </select>

               <select class="blocks_drop" style="margin-left: 10px;" name="b_Type" id="type">
                  <option value="Category">Category</option>
                  <option value="technology">Technology</option>
                  <option value="sports">Sports & Fitness</option>
                  <option value="cooking">Cooking</option>
                  <option value="Photography">Photography</option>
               </select>


            </div>

         </div>

         <hr id="ihr">

      </div>
      <div class="col-lg-3 col-sm-12 col-md-9">
         <img id="text_symbol" src="location.png">
      </div>

      <div class="content">
         <div class="row">

            <div class="col-lg-9 col-sm-12 col-md-9">
               <p class="headings">Location</p>
               <p class="matter">Help the people in the area discover your event and let attendes know where to show</p>
               <div id="bt_hover_create">
                  <script>
                     var a = "Venue";
                     var b = "online";
                  </script>
                  <input type="button" onclick="myFunction(a,b)" class="btn" value="Venue"></input>
                  <input type="button" class="btn active" onclick="myFunction(a,b)" style="margin-left: 10px;" value="Online"></input>
                  <br><br>
                  <div id="Venue" style="display: none;">

                     <label>Venue</label>
                     <input type="text" class="blocks" placeholder="Venue Name" name="venue_name">
                     <br>
                     <br>
                     <label>Street Address</label>
                     <br>
                     <input type="text" class="blocks_drop1" name="add1" placeholder="Address 1">

                     <input type="text" class="blocks_drop1" style="margin-left: 10px;" name="add2" placeholder="Address 2">
                     <br>

                     <br>

                     <input type="text" class="blocks_drop1" name="city" placeholder="City">
                     <input type="text" class="blocks_drop2" style="margin-left: 10px;" name="state" placeholder="State">
                     <input type="number" class="blocks_drop2" style="margin-left: 5px;" name="zipcode" placeholder="ZipCode">
                     <br>
                     <br>
                     <select class="blocks_drop1" name="country" id="type">
                        <option value="Type">Country</option>
                        <option value="Concertorperformance">India</option>
                        <option value="opel">USA</option>
                        <option value="audi">UK</option>
                        <option value="audi">Canada</option>
                     </select>
                     <br>

                  </div>
                  <div id="online" style="display: block;">
                     <label>Event Link</label>
                     <br>
                     <input class="blocks" type="text" placeholder="Event Link" name="e_link" required=true><br><br>
                  </div>
               </div>
            </div>

         </div>
         <hr id="ihr">

      </div>
      <div class="col-lg-3 col-sm-12 col-md-9">
         <img id="text_symbol" src="time.png">
      </div>
      <div class="content">

         <div class="row">

            <div class="col-lg-9 col-sm-12 col-md-9">
               <p class="headings">Time & Date</p>
               <p class="matter">Tell The Event goers when your event starts and ends so they can plan to attend.</p>

               <br>
               <label>Start Date</label>
               <label style="margin-left: 212px;">Start Time</label>
               <br>
               <input class="blocks_drop1" type="date" name="e_s_date" placeholder="Event starts" required=true>
               <input class="blocks_drop1" type="time" name="e_s_time" placeholder="Event starts" style="margin-left: 10px;" required=true>
               <br><br>
               <label>End Date</label>
               <label style="margin-left: 214px;">End Time</label>
               <br>
               <input class="blocks_drop1" type="date" name="e_e_date" placeholder="End Date" required=true>
               <input class="blocks_drop1" type="time" name="e_e_time" placeholder="End Time" style="margin-left: 10px;" required=true>
               <br>


            </div>

         </div>

         <hr id="ihr">


      </div>

      <div class="col-lg-3 col-sm-12 col-md-9">
         <img id="text_symbol" src="tickets.png">
      </div>
      <div class="content">

         <div class="row">

            <div class="col-lg-9 col-sm-12 col-md-9">
               <p class="headings">Create Ticket</p>
               <p class="matter">What type of tickets would you like to start with?</p>

               <div>
                  <button type="button" class="btn" data-toggle="modal" data-target="#myModal2">
                     Create tickets
                  </button>
                  <!-- Modal -->
                  <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">

                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel2">Add Tickets</h4>
                           </div>

                           <div class="modal-body">

                              <button type="button" class="buts " onclick="myenable()">Paid Tickets</button>
                              <button type="button" style="margin-left: 15px;" class="buts act" onclick="mydisable()">Free Tickets</button>
                              <br>
                              <br>
                              <label>Ticket Name</label>
                              <input type="text" class="blocks_drop1" name="t_name" placeholder="Ticket Name" form="form1">
                              <br>
                              <br>
                              <label>Ticket Price</label>
                              <input type="number" class="blocks_drop1" name="t_price" id="to_dis_price" form="form1" placeholder="price" disabled>
                              <br>
                              <br>
                              <label>Ticket Quantity</label>
                              <input type="number" class="blocks_drop1" name="t_quantity" form="form1" placeholder="Quantity">
                              <br>
                              <br>
                              <label>Sales Start</label><br>
                              <input class="blocks_drop3" type="date" placeholder="Event starts" required=false>
                              <input class="blocks_drop3" type="time" placeholder="Event starts" style="margin-left: 10px;" required=false>
                              <br>
                              <br>
                              <label>Sales End</label><br>
                              <input class="blocks_drop3" type="date" placeholder="Event starts" required=false>
                              <input class="blocks_drop3" type="time" placeholder="Event starts" style="margin-left: 10px;" required=false>
                              <br><br>
                              <input type="button" class="btn" style="background-color: yellowgreen;" value="Save"></input>
                              <input type="reset" class="btn" style="background-color: yellow;" value="Reset"></input>
                           </div>

                        </div><!-- modal-content -->
                     </div><!-- modal-dialog -->
                  </div><!-- modal -->

               </div>
               <br><br>
            </div>
         </div>
         <hr id="ihr">

      </div>

      <div class="col-lg-3 col-sm-12 col-md-9">
         <img id="text_symbol" src="image_up.png">
      </div>

      <div class="content">

         <div class="row">

            <div class="col-lg-9 col-sm-12 col-md-9">
               <p class="headings">Event Posters</p>
               <p class="matter">Tell The Event goers when your event starts and ends so they can plan to attend.</p>



               <input type='file' name="file" id="demo" />
               <img id="myid" src="#" alt="new image" />

            </div>

         </div>

         <hr id="ihr">


      </div>

      <div class="col-lg-3 col-sm-12 col-md-9">
         <img id="text_symbol" src="description.jpg">
      </div>
      <div class="content">

         <div class="row">

            <div class="col-lg-9 col-sm-12 col-md-9">
               <p class="headings">Event Description</p>
               <p class="matter">Tell The Event goers when more about your Event.</p>



               <textarea name="message" rows="5" cols="80"></textarea>
               <br><br>

            </div>
         </div>
         <hr id="ihr">
      </div>


      <div style="text-align: center;">
         <input type="submit" class="btn" name="c_event" value="save" style="background-color: yellowgreen; ">
      </div>
   </form>
</body>
<script>
   $(document).ready(function() {
      var intials = $('#name').text().charAt(0);
      var proimage = $('#proimage').text(intials);
   });

   // Add active class to the current button (highlight it)
   var header = document.getElementById("bt_hover_create");
   var btns = header.getElementsByClassName("btn");
   for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
         var current = document.getElementsByClassName("active");
         current[0].className = current[0].className.replace(" active", "");
         this.className += " active";
      });
   }

   var cts = document.getElementsByClassName("buts");
   for (var j = 0; j < cts.length; j++) {
      cts[j].addEventListener("click", function() {
         var curr = document.getElementsByClassName("act");
         curr[0].className = curr[0].className.replace(" act", "");
         this.className += " act";
      });
   }

   function myFunction(a, b) {
      var x = document.getElementById(a);
      var y = document.getElementById(b);
      if (x.style.display === "none") {
         x.style.display = "block";
         y.style.display = "none";
      } else {
         x.style.display = "none";
         y.style.display = "block";
      }
   }

   function mydisable() {
      document.getElementById("to_dis_price").disabled = true;
   }

   function myenable() {
      document.getElementById("to_dis_price").disabled = false;
   }

   function display(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(event) {
            $('#myid').attr('src', event.target.result);
         }
         reader.readAsDataURL(input.files[0]);
      }
   }

   $("#demo").change(function() {
      display(this);
   });
</script>

</html>