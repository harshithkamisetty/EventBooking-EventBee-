<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sigup page</title>
   <link rel="stylesheet" href="sign_up_style.css">
   <script src="validation.js"></script>
</head>

<body>
   <div style="padding-top:30px;"></div>
   <div class="Reg_form">
      <h1>User Registration Form</h1>
      <form id="reg" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
         <label>Email Id</label><br>
         <input type="email" id="name" placeholder="Enter Your Email Id" name="emailid"><br><br>
         <label>First Name:</label>
         <label style="margin-left: 255px;"> </label>
         <label> Last Name:</label>
         <br>
         <input type="text" id="name" name="f_name" placeholder="Enter Your Firstname" required>
         <label style="margin-left: 80px;"> </label>
         <input type="text" id="name" name="l_name" placeholder="Enter Your Lastname" required><br><br>

         <label>Mobile Number:</label><br>
         <input type="number" id="name" name="mobile" placeholder="Enter Your Mobile Number"><br><br>

         <label>Country:</label><br>
         <select id="opt" name="country">
            <option class="opt1" value="India">India</option>
            <option class="opt1" value="Usa">USA</option>
            <option class="opt1" value="Uk">UK</option>
            <option class="opt1" value="Srilanka">SriLanka</option>
         </select><br><br>
         <label>Password:</label><br>
         <input type="password" id="name" placeholder="Enter Your Password" name="pass"><br><br>
         <label>Confirm Password:</label><br>
         <input type="password" id="name" placeholder="Confirm Your Password" name="pass1"><br><br>

         <input type="submit" id="sub" name="reg_user" value="Register.." onclick='myfun()'>
      </form>
   </div>

</body>

</html>