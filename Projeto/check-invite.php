<?php
  include_once('database/connection.php');
  include_once('database/events.php');

  try {
    $result = checkInvite($dbh, $_GET['uid'], $_GET['eid']);
  } catch (PDOexception $e) {
    die($e->getMessage());
  }

  echo json_encode($result);
?>
