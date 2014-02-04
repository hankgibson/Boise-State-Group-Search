<?php 
  session_start();
?>
<html>
<head>
  <!-- favicon -->
  <link rel="icon" href="favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<!-- Title for Home page -->
	<title>Sign In</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="code/css/amstyles.css">
  <link rel="stylesheet" type="text/css" href="code/css/signin.css">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>

</head>
<body>
	<!-- Header -->
  <div class="top">
    <div class="homeImage">
      <a href="http://www.boisestate.edu/"><img src="code/css/images/boisestate-B-gray.png"></a>
    </div>
    <!-- Navigation Bar -->
    <div class="navigation">
        <ul>
          <li>
              <a href="">Dashboard</a>
            </li>
            <li>
              <a href="">Find a Group</a>
            </li>
            <li>
              <a href="">Start a Group</a>
            </li>
            <li>
              <a href="">About</a>
            </li>
        </ul>
    </div>

    <div class="topImage">
      <img src="code/css/images/logoGraySmall.png"/>
    </div>
  </div>

  <!-- Content header -->
  <center><h1>
      Sign In
  </h1></center>

  <!-- Content of the page -->
  <div class ="sign-in">
    <form id="login" action="handlers/login.php" method="post">
      <div>
        <label for="email">Student E-Mail:</label>
        <input type="text" name="email" placeholder="example@u.boisestate.edu"/>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" name="password"/>
      </div>
      <div>
        <input type="submit" class="sign-in-button" value="Sign In">
        <a href="join.php">Join Now</a>
      </div>
    </form>

    <?php
      if (isset($_SESSION["email"]))
      {
        echo "<div class='badlogin'>**Invalid Username or Password**</p>";
      }
    ?>
    
  </div>

  <!-- Footer -->
  <div id="footer">
    <li>&copy;2013 Hank Gibson</li>
    <li><a href="http://www.boisestate.edu">Boise State University</a></li>
  </div>
</body>
</html>