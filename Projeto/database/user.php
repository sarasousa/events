<?php

  function register($dbh, $email, $password, $username, $name) {
    $hash = hash("sha256", $password);
    $stmt = $dbh->prepare('INSERT INTO users VALUES (NULL, ?, ?, ?, ?)');
    $stmt->execute(array($email, $hash, $username, $name));
  }

  function login($dbh, $email, $password) {
    $hash = hash("sha256", $password);
    $stmt = $dbh->prepare('SELECT uid, username FROM users WHERE email = ? AND pass = ?');
    $stmt->execute(array($email, $hash));
    return $stmt->fetch();
  }

  function comment($dbh, $user, $event, $comment) {
    $stmt = $dbh->prepare('INSERT INTO comments VALUES (NULL, ?, ?, ?)');
    $stmt->execute(array($user, $event, $comment));
  }

  function getEventComments($dbh, $event) {
    $stmt = $dbh->prepare('SELECT user, comment FROM comments WHERE event = ?');
    $stmt->execute(array($event));
    return $stmt->fetchAll();
  }

  function getAllUsers($dbh, $id) {
    $stmt = $dbh->prepare('SELECT * FROM users WHERE uid != ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  function getUsername($dbh, $uid) {
    $stmt = $dbh->prepare('SELECT username FROM users WHERE uid = ?');
    $stmt->execute(array($uid));
    return $stmt->fetch();
  }

  function getIdByEmail($dbh, $email) {
    $stmt = $dbh->prepare('SELECT uid FROM users WHERE email = ?');
    $stmt->execute(array($email));
    return $stmt->fetch();
  }

?>
