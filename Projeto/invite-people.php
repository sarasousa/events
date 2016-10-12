<?php
  session_start();

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  $user_invited = $_POST['invited_email'];
  $invite_event_id = $_POST['eid'];


  include_once('database/connection.php');
  include_once('database/user.php');
  include_once('database/events.php');
  include_once('index.php');

  try {
     $id = getIdByEmail($dbh, $user_invited);
  } catch (PDOexception $e) {
    die($e->getmessage());
  }

  try {
     invitePeople($dbh, $id['uid'], $invite_event_id, 0);
  } catch (PDOexception $e) {
    {header("Location: home.php?e=8"); die;}
  }

  header("Location: home.php");

?>
