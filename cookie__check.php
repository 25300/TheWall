<?php

$gebruikersID = $_COOKIE['gebruikersID'];
$hash = $_COOKIE['hash'];

// Hash + gebruikersID = match?
$query = "SELECT gebruikersID FROM bapopdrachten WHERE gebruikersID =? AND hash = ?";
$stmt = $mysqli->prepare($query) or die('Error preparing.');
$stmt->bind_param('is', $gebruikersID, $hash) or die('Error binding');
$gebruikersID = $_COOKIE['gebruikersID'];
$wachtwoord = hash('sha512', $wachtwoord);
$stmt->execute() or die('Error executing');
$fetch_succes = $stmt->fetch();

if (!$fetch_succes) {
    header('Location: uitlogpoort.php');
}