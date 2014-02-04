<?php
  require_once "../dao.php";
  $dao = new Dao();
  session_start();
  $email = $_POST["email"];

  $password = hash('sha256', $_POST['password'].'hashit');

  if($dao->isPassWordCorrect($email, $password))
  {
    
    $_SESSION["email"] = $email;
    header("location:../dashboard.php");
  }

  else
  {
    $_SESSION["password"] = $password;
    $_SESSION["email"] = $email;
    header("location:../index.php");
  }
?>
