<?php

  function newEvent($dbh, $user, $title, $type, $description, $s_date, $e_date, $s_time, $e_time, $state, $location) {
    $stmt = $dbh->prepare('INSERT INTO events VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($user, $title, $type, $description, $s_date, $e_date, $s_time, $e_time, $state, $location));
  }

  function editEvent($dbh, $eid, $title, $type, $description, $s_date, $e_date, $s_time, $e_time, $state, $location) {
    $stmt = $dbh->prepare('UPDATE events SET title = ?, type = ?, description = ?, s_date = ?, e_date = ?, s_time = ?, e_time = ?, state = ?, location = ? WHERE eid = ?');
    $stmt->execute(array($title, $type, $description, $s_date, $e_date,  $s_time, $e_time, $state, $location, $eid));
  }

  function getAllPublicEvents($dbh) {
    $stmt = $dbh->prepare('SELECT * FROM events WHERE state = \'public\'');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getUserEvents($dbh, $user) {
    $stmt = $dbh->prepare('SELECT * FROM events WHERE owner = ?');
    $stmt->execute(array($user));
    return $stmt->fetchAll();
  }

  function getJoinedEvents($dbh, $user) {
    $stmt = $dbh->prepare('SELECT * FROM joins WHERE user = ?');
    $stmt->execute(array($user));
    return $stmt->fetchAll();
  }

  function getOtherEvents($dbh, $user) {
    $stmt = $dbh->prepare('SELECT * FROM events WHERE eid NOT IN (SELECT event FROM joins WHERE user = ?) AND state = \'public\' AND owner != ?');
    $stmt->execute(array($user, $user));
    return $stmt->fetchAll();
  }

  function getInvites($dbh, $user) {
    $stmt = $dbh->prepare('SELECT * FROM invites WHERE user = ? AND  answered = 0');
    $stmt->execute(array($user));
    return $stmt->fetchAll();
  }

  function getEvent($dbh, $eid) {
    $stmt = $dbh->prepare('SELECT * FROM events WHERE eid = ?');
    $stmt->execute(array($eid));
    return $stmt->fetch();
  }

  function getTitleByIdEvent($dbh, $eid) {
    $stmt = $dbh->prepare('SELECT title FROM events WHERE eid = ?');
    $stmt->execute(array($eid));
    return $stmt->fetch();
  }

  function joinEvent($dbh, $user, $event) {
    $stmt = $dbh->prepare('INSERT INTO joins VALUES (?, ?)');
    $stmt->execute(array($user, $event));
  }

  function invitePeople($dbh, $user, $event, $answered) {
    $stmt = $dbh->prepare('INSERT INTO invites VALUES (?, ?, ?)');
    $stmt->execute(array($user, $event, $answered));
  }

  function leaveEvent($dbh, $user, $event) {
    $stmt = $dbh->prepare('DELETE FROM joins WHERE user = ? AND event = ?');
    $stmt->execute(array($user, $event));
  }

  function deleteEvent($dbh, $event) {
    $stmt = $dbh->prepare('DELETE FROM events WHERE eid = ?');
    $stmt->execute(array($event));
  }

  function checkJoin($dbh, $user, $event) {
    $stmt = $dbh->prepare('SELECT * FROM joins WHERE user = ? AND event = ?');
    $stmt->execute(array($user, $event));
    return $stmt->fetch();
  }

  function checkOwn($dbh, $user, $event) {
    $stmt = $dbh->prepare('SELECT * FROM events WHERE eid = ? AND owner = ?');
    $stmt->execute(array($event, $user));
    return $stmt->fetch();
  }

  function checkInvite($dbh, $user, $event) {
    $stmt = $dbh->prepare('SELECT * FROM invites WHERE user = ? AND event = ?');
    $stmt->execute(array($user, $event));
    return $stmt->fetch();
  }

  function deleteInvite($dbh, $event, $user) {
    $stmt = $dbh->prepare('DELETE FROM invites WHERE user = ? AND event = ?');
    $stmt->execute(array($user, $event));
  }
?>
