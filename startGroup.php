<html>
<head>
  <!-- favicon -->
  <link rel="icon" href="favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<!-- Title for Home page -->
	<title>Create a Group</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="code/css/amstyles.css">
	<link rel="stylesheet" type="text/css" href="code/css/startgroup.css">

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
              <li>
                <a href="findGroup.php">Find a Group</a>
              </li>
              <li id="current-page">
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
    <h1>
    	<center>
        	Start a Study Group
        </center>
    </h1>


    <!-- Content of the page -->
    <div class="startgroup-content">
		<form action="handlers/groupUpdate.php" method="POST" enctype="multipart/form-data">
			<div>
	        <label id="collegename">College Name:</label>
		        <select id="collegename" name="collegename">
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
	          <label id="coursename">Course Name:</label>
	          <input type="text" name="coursename"/>
	        </div>
	        <div>
	          <label for="instructor">Instructor:</label>
	          <input type="text" name="instructor"/>
	        </div>
	        <div>
	          <label for="semester">Semester:</label>
	          <select id="semester" name="semester">
	            <option value="null"></option>
	            <option value="Fall13">Fall 2013</option>
	            <option value="Spring14">Spring 2014</option>
	            <option value="Fall14">Fall 2014</option>
	            <option value="Spring15">Spring 2015</option>
	            <option value="Fall2015">Fall 2015</option>
	          </select>
	        </div>
	        <div>
	        	<label for="days">Meeting Days:</label>
	        	<ul>
          		  <li><input type="checkbox" name="days[]" id="customcheck" value="Sunday">Sunday</input></li>
		          <li><input type="checkbox" name="days[]" id="customcheck" value="Monday">Monday</input></li>
		          <li><input type="checkbox" name="days[]" id="customcheck" value="Tuesday">Tuesday</input></li>
		          <li><input type="checkbox" name="days[]" id="customcheck" value="Wednesday">Wednesday</input></li>
		          <li><input type="checkbox" name="days[]" id="customcheck" value="Thursday">Thursday</input></li>
		          <li><input type="checkbox" name="days[]" id="customcheck" value="Friday">Friday</input></li>
		          <li><input type="checkbox" name="days[]" id="customcheck" value="Satuday">Saturday</input></li>
		        </ul>
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
	        <div>
	          <label for="membernum">Max Number of Members:</label>
	          <select id="membernum" name="membernum">
	            <option value="null"></option>
	            <option value="2">2</option>
	            <option value="4">4</option>
	            <option value="6">6</option>
	            <option value="8">8</option>
	            <option value="10">10</option>
	          </select>
	        </div>
	        <div>
	          <label for="location">Location:</label>
	          <input type="text" name="location"/><br>
	          <input type="submit" name="submit" value="Create Group">
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
