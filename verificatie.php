<?php

require ('../../../../../../private/connectie.php');

$email = $_GET['email'];
$hash = $_GET['hash'];

// Checken of de mail klopt met de hash
$query = "SELECT gebruikersID FROM thewall WHERE email = ? AND hash = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing for select');
$stmt->bind_param('ss', $email, $hash);
$stmt->execute();
$stmt->bind_result($gebruikersID);
$row = $stmt->fetch();
if (!$gebruikersID) {
    echo 'Sorry, maar deze combinatie van mailadres en hash ken ik niet.';
    exit();
}

$stmt->close();

// Account activeren
$query = "UPDATE thewall SET active = 1 WHERE gebruikersID = ?";
$stmt = $mysqli->prepare($query) or die ('Error prepairing for update');
$stmt->bind_param('i', $gebruikersID);
$stmt->execute() or die('Error updating');

header('Location: inloggen.php');