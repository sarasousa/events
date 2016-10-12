<?php

  session_start();

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  include_once('database/connection.php');
  include_once('database/events.php');

  if (!isset($_POST['ed_title']) || trim($_POST['ed_title']) == '') {
    $_SESSION['error_msg'] = "Add a title!";
    header("Location: home.php?e=5");
    die;
  }
   if (!isset($_POST['ed_location']) || trim($_POST['ed_location']) == '') {
    $_SESSION['error_msg'] = "Add a location!";
    header("Location: home.php?e=5");
    die;
  }
  if (!isset($_POST['ed_description']) || trim($_POST['ed_description']) == ''){
    $_SESSION["error_msg"] = "Add a description!";
    header("Location: home.php?e=5");
    die;
  }
  if ($_FILES['ed_photo']['error'] !== 0) {
    $_SESSION["error_msg"] = "Add an image!";
    header("Location: home.php?e=5");
    die;
  }

  preg_match("/^([a-zA-Z0-9][a-zA-Z0-9 ]+)$/i", $_POST['ed_title'], $matches);

  if ($matches[1]=='') {
    $_SESSION["error_msg"] = "Invalid title!";
    header("Location: home.php?e=5");
    die;
  }

    preg_match("/^([a-zA-Z0-9][a-zA-Z0-9 ]+)$/i", $_POST['ed_location'], $matches);

  if ($matches[1]=='') {
    $_SESSION["error_msg"] = "Invalid location!";
    header("Location: home.php?e=5");
    die;
  }

  preg_match("/^([a-zA-Z0-9][a-zA-Z0-9 ]+)$/i", $_POST['ed_description'], $matches);

  if ($matches[1]=='') {
    $_SESSION["error_msg"] = "Invalid description!";
    header("Location: home.php?e=5");
    die;
  }

  $file_type = $_FILES['ed_photo']['type'];
  $allowed = array('image/jpeg', 'image/gif', 'image/png');

  if (!in_array($file_type, $allowed)) {
    $_SESSION['error_msg'] = "File must be an image!";
    header("Location: home.php?e=5");
    die;
  }

  $s_date = $_POST['ed_s_day'] . '-' . $_POST['ed_s_month'] . '-' . $_POST['ed_s_year'];
  $e_date = $_POST['ed_e_day'] . '-' . $_POST['ed_e_month'] . '-' . $_POST['ed_e_year'];
  $s_time = $_POST['ed_s_hour'] . ':' . $_POST['ed_s_min'];
  $e_time = $_POST['ed_e_hour'] . ':' . $_POST['ed_e_min'];

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
    editEvent($dbh, $_POST['edit-id'], $_POST['ed_title'], $_POST['ed_type'], $_POST['ed_description'], $s_date, $e_date, $s_time, $e_time, $_POST['ed_state'], $_POST['ed_location'], $_SESSION['user_id']);
  } catch (PDOexception $e) {
    $_SESSION["error_msg"] = "Error creating event!";
    header("Location: home.php?e=5");
    die($e->getMessage());
  }

  $id = $_POST['edit-id'];

  $filename = "img/$id.jpg";

  move_uploaded_file($_FILES['ed_photo']['tmp_name'], $filename);

  header("Location: home.php");

?>
