<?php
  session_start();
  require_once "../dao.php";
  $dao = new Dao();

  // save a product, including name, description, and an image path
  
  $id = (isset($_POST["id"])) ? $_POST["id"] : "bad";

  $dao->addUserToGroupSearch($id, $_SESSION["email"]);