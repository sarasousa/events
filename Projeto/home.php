<?php

  session_start();

  $error_code = $_GET['e'];
  $error_msg = $_SESSION["error_msg"];

  ini_set('display_errors',1);
  error_reporting(E_ALL);


  include_once('database/connection.php');
  include_once('database/events.php');
  include_once('database/user.php');

  try {
    $result = getUserEvents($dbh, $_SESSION['user_id']);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  try {
    $result_joined = getJoinedEvents($dbh, $_SESSION['user_id']);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  try {
    $result_public = getOtherEvents($dbh, $_SESSION['user_id']);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  try {
    $result_invites = getInvites($dbh, $_SESSION['user_id']);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  try {
    $result_users = getAllUsers($dbh, $_SESSION['user_id']);
  } catch (PDOexception $e) {
    die($e->getmessage());
  }

  if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
  } else {
    include('templates/header.php');
    include('templates/home.php');
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
