<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="Login_style.css">
</head>

<body>
   <centre>
      <div class="Reg_form">
         <h1>Login </h1>
         <form id="reg" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <label>UserName:</label><br>
            <input type="text" id="name" name="username" placeholder="Enter Your EmailId" required><br><br>
            <label>Password:</label><br>
            <input type="password" id="name" name="password" placeholder="Enter Your Password" required><br><br>
            <input type="submit" name="login_user" id="sub" value="Login"><br><br>
         </form>
         <p id="txt">Don't Have a account?</p>
         <a href="Signup.php">
            <p id="txt">Register</p>
         </a>
      </div>
   </centre>

</body>

</html>