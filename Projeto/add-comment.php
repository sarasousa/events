<?php
  session_start();

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  include_once('database/connection.php');
  include_once('database/user.php');

  if (!isset($_POST['comment']) || trim($_POST['comment']) == '') {
    $_SESSION['error_msg'] = "Add a title!";
    header("Location: home.php?e=5");
    die;
  }

  preg_match("/^([a-zA-Z0-9 .!?]+)$/i", $_POST['comment'], $matches);

  if ($matches[1]=='') {
    $_SESSION["error_msg"] = "Comment contains invalid characters!";
    header("Location: home.php?e=5");
    die;
  }

  try {
    comment($dbh, $_SESSION['username'], $_POST['eid'], $_POST['comment']);
  } catch (PDOexception $e) {
    $_SESSION["error_msg"] = "Error posting comment!";
    header("Location: home.php?e=5");
    die($e->getMessage());
  }

  header("Location: home.php");

?>
