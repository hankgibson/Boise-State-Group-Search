<?php
session_start();
require_once "../dao.php";
$dao = new Dao();

$_SESSION["findResults"] = array();

if(isset($_POST["collegenameid"]))
{
	$resultArrayCollegeName= $dao->getResultsCollegeName(($_POST["collegenameid"]));

	foreach($resultArrayCollegeName as $group)
	{
		if(!in_array($group, $_SESSION["findResults"], true))
		{
			array_push($_SESSION["findResults"], $group);
		}
	}
}

if(isset($_POST["coursenameid"]))
{
	$resultArrayCourseName = $dao->getResultsCourseName(($_POST["coursenameid"]));

	foreach($resultArrayCourseName as $group)
	{
		if(!in_array($group, $_SESSION["findResults"], true))
		{
			array_push($_SESSION["findResults"], $group);
		}
	}
}

if(isset($_POST["checkeddaysid"]))
{
	$resultArrayDays = $dao->getResultsDays(($_POST["checkeddaysid"]));
	
	foreach($resultArrayDays as $group)
	{
		if(!in_array($group, $_SESSION["findResults"], true))
		{
			array_push($_SESSION["findResults"], $group);
		}
	}
}

if(isset($_POST["locationid"]))
{
	$resultArrayLocation = $dao->getResultsLocation(($_POST["locationid"]));

	foreach($resultArrayLocation as $group)
	{
		if(!in_array($group, $_SESSION["findResults"], true))
		{
			array_push($_SESSION["findResults"], $group);
		}
	}
}

if(isset($_POST["timeid"]))
{
	$resultArrayTime = $dao->getResultsTime(($_POST["timeid"]));

	foreach($resultArrayTime as $group)
	{
		if(!in_array($group, $_SESSION["findResults"], true))
		{
			array_push($_SESSION["findResults"], $group);
		}
	}
}

foreach ($_SESSION["findResults"] as $group) 
{
	if ($group["num_members"] < $group["max_num_members"])
	{
		echo "<div class=\" result ".$group["id"]."\">";
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
}

echo "<p class=\"not-there\">Not finding what you are looking for? Create your own group by going </p><a href=\"startGroup.php\">here</a>";