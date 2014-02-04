<?php
session_start();
require_once "dao.php";
$dao = new Dao();
?>

<html>
<head>
   <!-- favicon -->
   <link rel="icon" href="favicon.ico" type="image/x-icon"> 
   <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

   <!-- Title for Home page -->
   <title>Find a Group</title>

   <!-- CSS -->
   <link rel="stylesheet" type="text/css" href="code/css/amstyles.css">
   <link rel="stylesheet" type="text/css" href="code/css/findgroup.css">

   <!-- JavaScript -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type="text/javascript" src="code/javascript/findgroup.js"></script>

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
               <a href="dashboard.php">Dashboard</a>
            </li>
            <li id="current-page">
               <a href="findGroup.php">Find a Group</a>
            </li>
            <li>
               <a href="startGroup.php">Start a Group</a>
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
   <div>
      <center><h1>
         Find a Study Group
      </h1></center>
   </div>

   <!-- Content of the page -->
   <div class="find-content">
      <!-- Side bar -->
      <div class="find-sidebar">
         <form action="handlers/searchUpdate.php" method="POST" enctype="multipart/form-data">
            <div>
               <label for="collegename">College Name:</label>
               <select class="target" id="collegename" name="collegename">
                  <option value=""></option>
                  <option value="Arts & Sciences">Arts & Sciences</option>
                  <option value="Business & Economics">Business & Economics</option>
                  <option value="Education">Education</option>
                  <option value="Engineering">Engineering</option>
                  <option value="Health Sciences">Health Sciences</option>
                  <option value="Social Sciences & Public Affairs">Social Sciences & Public Affairs</option>
               </select>
            </div>

            <div>
               <label for="coursename">Course Name:</label>
               <?php
               $courses = $dao->getCourses();
               echo "<select id=\"coursename\" name=\"coursename\">";
               echo "<option></option>";
               foreach ($courses as $course) 
               {
                  echo "<option value=".$course["course_name"].">".$course["course_name"]."</option>";
               }
               echo "</select>";
               ?>
            </div>
            <div>
               <label for="days">Meeting Days:</label>
               <ul id= "daycheck">
                  <li><input type="checkbox" name="days" id="customcheck" value="Sunday">Sunday</input></li>
                  <li><input type="checkbox" name="days" id="customcheck" value="Monday">Monday</input></li>
                  <li><input type="checkbox" name="days" id="customcheck" value="Tuesday">Tuesday</input></li>
                  <li><input type="checkbox" name="days" id="customcheck" value="Wednesday">Wednesday</input></li>
                  <li><input type="checkbox" name="days" id="customcheck" value="Thursday">Thursday</input></li>
                  <li><input type="checkbox" name="days" id="customcheck" value="Friday">Friday</input></li>
                  <li><input type="checkbox" name="days" id="customcheck" value="Satuday">Saturday</input></li>
               </ul>
            </div>
            <div>
               <label for="location">Location:</label>
               <?php
               $locations = $dao->getLocations();
               echo "<select id=\"location\" name=\"location\">";
               echo "<option></option>";
               foreach ($locations as $location) 
               {
                  echo "<option value=".$location["location"].">".$location["location"]."</option>";
               }
               echo "</select>";
               ?>
            </div>
            <div>
               <label for="time">Meeting Time:</label>
               <select id="time" name="time">
                  <option value="null"></option>
                  <option value="Early Morning">Early Morning</option>
                  <option value="Late Morning">Late Morning</option>
                  <option value="Afternoon">Afternoon</option>
                  <option value="Prevening">Prevening</option>
                  <option value="Evening">Evening</option>
               </select>
            </div>
         </div>
      </form>

      <div class="find-results">
         <?php
            $groups = $dao->searchGroups($_SESSION["email"]);
            foreach ($groups as $group) 
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
         ?>
         <p class="not-there">Not finding what you are looking for? Create your own group by going </p><a href="startGroup.php">here</a> 
      </div>
   </div>

   <!-- Clear the content of the page like a break -->
   <div class="clear"></div>

   <!-- Footer -->
   <div id="footer">
      <li>&copy;2013 Hank Gibson</li>
      <li><a href="http://www.boisestate.edu">Boise State University</a></li>
   </div>
</body>
</html>