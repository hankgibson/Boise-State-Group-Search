<?php
  session_start();
  require_once "../dao.php";
  $dao = new Dao();

  // save a product, including name, description, and an image path
  
  $id = (isset($_POST["id"])) ? $_POST["id"] : "bad";

  $dao->leaveGroup($id, $_SESSION["email"]);

 	$userInfo = $dao->getUserInfo($_SESSION["email"]);
	$numGroups = $dao->getNumUserGroups($userInfo["id"]);
	echo "<div class = \"info\">";
	echo "<li>Name: ". $userInfo["fname"]." ". $userInfo["lname"]. "</li>";
	echo "<li>E-Mail: ". $userInfo["email"]."</li>";
	echo "<li id=\"numGroup\">Number of Groups: ". $numGroups["count(*)"]."</li>";
	echo "</div>";

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

