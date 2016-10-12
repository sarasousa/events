<?php

	$dbh = null;

	try {
		$dbh = new PDO('sqlite:ltw.db');
	  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	$stmt = $dbh->prepare('PRAGMA foreign_keys = ON');
	$stmt->execute();
?>
