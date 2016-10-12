<?php
  include_once('database/connection.php');
  include_once('database/user.php');

  try {
    $results = getEventComments($dbh, $_GET['eid']);
  } catch (PDOexception $e) {
    die($e->getMessage());
  }

  echo json_encode($results);
?>
