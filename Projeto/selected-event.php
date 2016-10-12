<?php
  include_once('database/connection.php');
  include_once('database/events.php');

  try {
    $result = getEvent($dbh, $_GET['eid']);
  } catch (PDOexception $e) {
    die($e->getMessage());
  }

  echo json_encode($result);
?>
