<?php

  session_start();

  ini_set('display_errors',1);
  error_reporting(E_ALL);

  if (!isset($_POST['login_email']) || trim($_POST['login_email']) == '') {header("Location: index.php?e=2"); die;}
  if (!isset($_POST['login_password']) || trim($_POST['login_password']) == '') {header("Location: index.php?e=3"); die;}

  preg_match("/^([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,})$/i", $_POST['login_email'], $matches);

   if ($matches[1]=='')
    {$_SESSION["error_msg"] = "Invalid Email!"; header("Location: index.php?e=5"); die;}

  //password may have . and * and _ and - and must have between 5-32 characters
   preg_match("/^([a-zA-Z0-9_*\-.]{5,32})/i", $_POST['login_password'], $matches);

   if ($matches[1]=='')
  {$_SESSION["error_msg"] = "Invalid Password!"; header("Location: index.php?e=5"); die;}



  include_once('database/connection.php');
  include_once('database/user.php');

  try {
    $result = login($dbh, $_POST['login_email'], $_POST['login_password']);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  if (empty($result)) {
  	header("Location: index.php?e=1");
    die;
  } else {
    $_SESSION['user_id'] = $result['uid'];
    $_SESSION['username'] = $result['username'];
    header("Location: home.php");
  }

?>
