<?php	
session_start();
require_once "dao.php";
$dao = new Dao();
?>
<html>
<head>
	<!-- Title for Home page -->
	<title>Dashboard</title>

	<!-- favicon -->
	<link rel="icon" href="favicon.ico" type="image/x-icon"> 
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="code/css/amstyles.css">
	<link rel="stylesheet" type="text/css" href="code/css/dashboard.css">
	<link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.css' />



	<!-- JavaScript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="code/javascript/dashboard.js"></script>
	<script type='text/javascript' src='fullcalendar/fullcalendar.js'></script>

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
				<li id="current-page">
					<a href="dashboard.php">Dashboard</a>
				</li>
				<li>
					<a href="findGroup.php">Find a Group</a>
				</li>
				<li>
					<a href="startGroup.php">start a Group</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
			</ul>
		</div>

		<div class="topImage">
			<img src="code/css/images/logoGraySmall.png"/>
		</div>
	</div>

	<div class="link">
		<a href="handlers/logout.php">LOGOUT</a>
	</div>

	<!-- Content header -->
	<center><h1>
		Your Dashboard
	</h1></center>

	<!-- Content of the page -->
	<div class="dashboard-content">
		<div class="dashboard-your-information">
			<h3>User Information</h3>
			<div class="dashboard-your-groups">
				<?php
					$userInfo = $dao->getUserInfo($_SESSION["email"]);
					$numGroups = $dao->getNumUserGroups($userInfo["id"]);
					echo "<div class = \"info\">";
					echo "<li>Name: ". $userInfo["fname"]." ". $userInfo["lname"]. "</li>";
					echo "<li>E-Mail: ". $userInfo["email"]."</li>";
					echo "<li>Class: ". $userInfo["class_year"]."</li>";
					echo "<li id=\"numGroup\">Number of Groups: ". $numGroups["count(*)"]."</li>";
					echo "</div>";
					
					echo "<h3>Your Groups</h3>";
					
					$groups = $dao->getUserGroups($_SESSION["email"]);
					foreach ($groups as $group) 
					{
						echo "<div class=\" mygroup ".$group["id"]."\">";
							echo "<ul>";
								echo "<li> <strong>College:</strong> ".$group["college_name"]. " &nbsp;&nbsp;&nbsp;&nbsp";
								echo "<strong>Course:</strong> ".$group["course_name"]. "</li>";
								echo "<li> <strong>Location:</strong> ".$group["location"]. "&nbsp;&nbsp;&nbsp;&nbsp";
								echo "<strong>Meeting Time:</strong> ".$group["meettime"]. "</li>";
								echo "<li> <strong>Number Days:</strong> ".$group["days"]. "</li>";
								echo "<li> <strong>Number of Members:</strong> ".$group["num_members"]. " of " .$group["max_num_members"]. "</li>";
								echo "<li> <strong>Created By:</strong> ".$group["createdby"]. "</li>";
							echo "</ul>";
						echo "</div>";
					}
				?>
			</div>

		</div>
		<div class="dashboard-calendarholder">
			<div id='calendar'></div>
		</div>


		</div>
		<div class="clear">
	</div>

	<div class="clear">
	</div>

	<!-- Footer -->
	<div id="footer">
		<li>&copy;2013 Hank Gibson</li>
		<li><a href="http://www.boisestate.edu">Boise State University</a></li>
	</div>
</body>
</html>