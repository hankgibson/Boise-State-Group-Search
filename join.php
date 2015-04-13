<html>
<head>
  <!-- favicon -->
  <link rel="icon" href="favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<!-- Title for Home page -->
	<title>Join</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="code/css/amstyles.css">
  <link rel="stylesheet" type="text/css" href="code/css/join.css">

  <!-- JavaScript -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="code/javascript/join.js"></script>

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
        Join Boise State Academic Meetup
    </h1></center>

    <!-- Conatent of the page -->
    <div class ="join-content">
      <form>
        <div>
          <label id = "fnamelabel" for="fname">First Name:</label>
          <input id ="fname" type="text" name="fname"/>
        </div>
        <div>
          <label id = "lnamelabel" for="lname">Last Name:</label>
          <input id = "lname" type="text" name="lname"/>
        </div>
        <div>
          <label id = "emaillabel" for="email">School E-Mail:</label>
          <input id = "email" type="text" name="email"/>
        </div>
        <div>
          <label id = "passwordlabel" for="password">Password:</label>
          <input id = "password" type="password" name="password"/>
        </div>
        <div>
          <label id="classlabel">Class:</label>
          <select id="class" name="class">
            <option value=""></option>
            <option value="Freshman">Freshman</option>
            <option value="Sophomre">Sophomore</option>
            <option value="Junior">Junior</option>
            <option value="Senior">Senior</option>
            <option value="Grad">Grad</option>
          </select>
        </div>
        <div>
          <label id="sexlabel">Sex:</label>
          <select id="sex" name="sex">
            <option value=""></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div>
          <label id = "bdatelabel">Birthdate:</label>
          <select id="bdateday" name="bdateday">
            <option value="">Date</option>
            <?php
              for ($i = 1; $i <= 31; $i++) 
              {
                echo "<option value=\"$i\">".$i."</option>";
              }
            ?>
          </select>
          <select id="bdatemonth" name="bdatemonth">
            <option value="">Month</option>
            <option value="January">January</option>
            <option value="Febuary">Febuary</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select>
          <select id="bdateyear" name="bdateyear">
            <option value="">Year</option>
            <?php
              for ($i = 1950; $i <= 2000; $i++) 
              {
                echo "<option value=\"$i\">".$i."</option>";
              }
            ?>
          </select>
        </div>
        <div>
          <input type="button" class="join-button" name="submit" value="Join">
        </div>
     </form>
    </div>

    <!-- Footer -->
    <div id="footer">
      <li>&copy;2015 Hank Gibson</li>
      <li><a href="http://www.boisestate.edu">Boise State University</a></li>
    </div>
	</body>
</html>