<?php

  session_start();

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  include_once('database/connection.php');
  include_once('database/events.php');

  if (!isset($_POST['event_title']) || trim($_POST['event_title']) == '') {
    $_SESSION['error_msg'] = "Add a title!";
    header("Location: home.php?e=5");
    die;
  }
  if (!isset($_POST['event_location']) || trim($_POST['event_location']) == '') {
    $_SESSION['error_msg'] = "Add a location!";
    header("Location: home.php?e=5");
    die;
  }
  if (!isset($_POST['event_description']) || trim($_POST['event_description']) == ''){
    $_SESSION["error_msg"] = "Add a description!";
    header("Location: home.php?e=5");
    die;
  }
  if ($_FILES['event_photo']['error'] !== 0) {
    $_SESSION["error_msg"] = "Add an image!";
    header("Location: home.php?e=5");
    die;
  }

  preg_match("/^([a-zA-Z0-9][a-zA-Z0-9 ]+)$/i", $_POST['event_title'], $matches);

  if ($matches[1]=='') {
    $_SESSION["error_msg"] = "Invalid title!";
    header("Location: home.php?e=5");
    die;
  }

  preg_match("/^([a-zA-Z0-9][a-zA-Z0-9 ]+)$/i", $_POST['event_location'], $matches);

  if ($matches[1]=='') {
    $_SESSION["error_msg"] = "Invalid location!";
    header("Location: home.php?e=5");
    die;
  }

  preg_match("/^([a-zA-Z0-9][a-zA-Z0-9 ]+)$/i", $_POST['event_description'], $matches);

  if ($matches[1]=='') {
    $_SESSION["error_msg"] = "Invalid description!";
    header("Location: home.php?e=5");
    die;
  }

  $file_type = $_FILES['event_photo']['type'];
  $allowed = array('image/jpeg', 'image/gif', 'image/png');

  if (!in_array($file_type, $allowed)) {
    $_SESSION['error_msg'] = "File must be an image!";
    header("Location: home.php");
    die;
  }

  $s_date = $_POST['s_day'] . '-' . $_POST['s_month'] . '-' . $_POST['s_year'];
  $e_date = $_POST['e_day'] . '-' . $_POST['e_month'] . '-' . $_POST['e_year'];
  $s_time = $_POST['s_hour'] . ':' . $_POST['s_min'];
  $e_time = $_POST['e_hour'] . ':' . $_POST['e_min'];

  if (strtotime($s_date) > strtotime($e_date)) {
    $_SESSION["error_msg"] = "End date is before start!";
    header("Location: home.php?e=5");
    die;
  } elseif (strtotime($s_date) == strtotime($e_date)) {
      if (strtotime($s_time) >= strtotime($e_time)) {
        $_SESSION["error_msg"] = "Ends before starting?";
        header("Location: home.php?e=5");
        die;
      }
    }

  try {
    newEvent($dbh, $_SESSION['user_id'], $_POST['event_title'], $_POST['event_type'], $_POST['event_description'], $s_date, $e_date, $s_time, $e_time, $_POST['event_state'], $_POST['event_location']);
  } catch (PDOexception $e) {
    $_SESSION["error_msg"] = "Error creating event!";
    header("Location: home.php?e=5");
    die($e->getMessage());
  }

  $id = $dbh->lastInsertId();

  $filename = "img/$id.jpg";

  move_uploaded_file($_FILES['event_photo']['tmp_name'], $filename);

  header("Location: home.php");

?>
