<?php
  require_once "../dao.php";
  $dao = new Dao();

  if(preg_match("/^[A-z]+$/", $_POST["fname"], $fname) 
    && preg_match("/^[A-z]+$/", $_POST["lname"], $lname)
    && preg_match("/\w*\@(boisestate|u.boisestate)+(.edu)/", $_POST["email"], $email)) 
  {
    $fname = (isset($_POST["fname"])) ? $_POST["fname"] : "bad";
    $lname = (isset($_POST["lname"])) ? $_POST["lname"] : "bad";
    $email = (isset($_POST["email"])) ? $_POST["email"] : "bad";
    $password = (isset($_POST["password"])) ? hash('sha256', $_POST['password'].'hashit') : "bad";
    $class = (isset($_POST["classgrade"])) ? $_POST["classgrade"] : "bad";
    $sex = (isset($_POST["sex"])) ? $_POST["sex"] : "bad";
    $bdateday = (isset($_POST["bdateday"])) ? $_POST["bdateday"] : "bad";
    $bdatemonth = (isset($_POST["bdatemonth"])) ? $_POST["bdatemonth"] : "bad";
    $bdateyear = (isset($_POST["bdateyear"])) ? $_POST["bdateyear"] : "bad";

    $fname = htmlspecialchars($fname);
    $lname = htmlspecialchars($lname);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $class = htmlspecialchars($class);
    $sex = htmlspecialchars($sex);
    $bdateday = htmlspecialchars($bdateday);
    $bdatemonth = htmlspecialchars($bdatemonth);
    $bdateyear = htmlspecialchars($bdateyear);

    $dao->addUser($fname, $lname, $email, $password, $class, $sex, $bdateday, $bdatemonth, $bdateyear);
    session_start();
    $_SESSION["email"] = $email;
    
  }

  else
  {
    header("location:../join.php");
  }
  
