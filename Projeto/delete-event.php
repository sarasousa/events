<?php
  include_once('database/connection.php');
  include_once('database/events.php');

  try {
    deleteEvent($dbh, $_POST['eid']);
  } catch (PDOexception $e) {
    die($e->getMessage());
  }

  header("Location: home.php");
?>
