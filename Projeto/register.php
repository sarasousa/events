<?php
  session_start();

  ini_set('display_errors',1);
  error_reporting(E_ALL);

  if (!isset($_POST['register_name']) || trim($_POST['register_name']) == '') {header("Location: index.php?e=4"); die;}
  if (!isset($_POST['register_username']) || trim($_POST['register_username']) == ''){ $_SESSION["error_msg"] = "No Username?"; header("Location: index.php?e=5"); die;}
  if (!isset($_POST['register_email']) || trim($_POST['register_email']) == '') {header("Location: index.php?e=2"); die;}
  if (!isset($_POST['register_password']) || trim($_POST['register_password']) == '') {header("Location: index.php?e=3"); die;}


 preg_match("/^([a-zA-Z][a-zA-Z ]*)$/i", $_POST['register_name'], $matches);

   if ($matches[1]=='')
   {$_SESSION["error_msg"] = "Invalid Name!"; header("Location: index.php?e=5"); die;}

//only allows letters, numbers and _
   preg_match("/^([a-z0-9_-]{3,16})$/i", $_POST['register_username'], $matches);

   if ($matches[1]=='')
   {$_SESSION["error_msg"] = "Invalid Username!"; header("Location: index.php?e=5"); die;}

  preg_match("/^([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,})$/i", $_POST['register_email'], $matches);

   if ($matches[1]=='')
   {$_SESSION["error_msg"] = "Invalid Email!";  header("Location: index.php?e=5"); die;}


  //password may have . and * and _ and - and must have between 5-32 characters
   preg_match("/^([a-zA-Z0-9_*\-.]{5,32})/i", $_POST['register_password'], $matches);

   if ($matches[1]=='')
   {header("Location: index.php?e=6"); die;}


  include_once('database/connection.php');
  include_once('database/user.php');

  try {
    register($dbh, $_POST['register_email'], $_POST['register_password'], $_POST['register_username'], $_POST['register_name']);
  } catch (PDOException $e) {
    $_SESSION["error_msg"] = "Username or E-mail Unavailable!";
    header("Location: index.php?e=7");
    die($e->getMessage());
  }

  $_SESSION['user_id'] = $dbh->lastInsertId();
  $_SESSION['username'] = $_POST['register_username'];

  header('Location: index.php');
?>
