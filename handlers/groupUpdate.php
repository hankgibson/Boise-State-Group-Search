<?php
  session_start();
  require_once "../dao.php";
  $dao = new Dao();

  // save a product, including name, description, and an image path
  $collegename = (isset($_POST["collegename"])) ? $_POST["collegename"] : "bad";
  $coursename = (isset($_POST["coursename"])) ? $_POST["coursename"] : "bad";
  $instructor = (isset($_POST["instructor"])) ? $_POST["instructor"] : "bad";
  $semester = (isset($_POST["semester"])) ? $_POST["semester"] : "bad";
  $days = (isset($_POST["days"])) ? $_POST["days"] : "bad";
  $time = (isset($_POST["time"])) ? $_POST["time"] : "bad";
  $membernum = (isset($_POST["membernum"])) ? $_POST["membernum"] : "bad";
  $location = (isset($_POST["location"])) ? $_POST["location"] : "bad";

  $collegename = htmlspecialchars($collegename);
  $coursename = htmlspecialchars($coursename);
  $instructor = htmlspecialchars($instructor);
  $semester = htmlspecialchars($semester);
  $time = htmlspecialchars($time);
  $membernum = htmlspecialchars($membernum);
  $location = htmlspecialchars($location);


  $dao->addGroup($collegename, $coursename, $instructor, $semester, $days, $time, $membernum, $location, $_SESSION["email"]);

  $dao->addUserToGroup($coursename, $_SESSION["email"]);
  header("location:../dashboard.php");