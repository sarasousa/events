<?php
  session_start();

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  include_once('database/connection.php');
  include_once('database/events.php');

  try {
    leaveEvent($dbh, $_SESSION['user_id'], $_POST['eid']);
  } catch (PDOexception $e) {
    die($e->getmessage());
  }

  header("Location: home.php");

?>
