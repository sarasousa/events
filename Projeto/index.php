<?php

  session_start();

  $error_code = $_GET['e'];
  $error_msg = $_SESSION["error_msg"];

  ini_set('display_errors',1);
  error_reporting(E_ALL);


  include_once('database/connection.php');
  include_once('database/events.php');

  try {
    $result = getAllPublicEvents($dbh);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  if(isset($_SESSION['user_id'])) {
    header("Location: home.php");
  } else {
    include('templates/header.php');
    include('templates/index.php');
    include('templates/popups.php');
    include('templates/footer.php');
  }
  
  if ($error_code == 1)
  {
    echo "<script language=javascript>showModal($('#popup-error'));</script>";
  }
  if ($error_code == 2)
  {
    echo "<script language=javascript>showModal($('#popup-error-wemail'));</script>";
  }
  if ($error_code == 3)
  {
    echo "<script language=javascript>showModal($('#popup-error-wpassword'));</script>";
  }
   if ($error_code == 4)
  {
    echo "<script language=javascript>showModal($('#popup-error-wname'));</script>";
  }
   if ($error_code == 5)
  {
    echo "<script language=javascript>showModal($('#popup-error-wusername'));</script>";
  }
   if ($error_code == 6)
  {
    echo "<script language=javascript>showModal($('#popup-error-invalidpass'));</script>";
  }
   if ($error_code == 7)
  {
    echo "<script language=javascript>showModal($('#popup-error-alre-regist'));</script>";
  }
   if ($error_code == 8)
  {
    echo "<script language=javascript>showModal($('#popup-error-invite'));</script>";
  }


?>
