<?php

require ('../../../../../../private/connectie.php');

// Ophalen
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];
$herhaal__wachtwoord = $_POST['herhaal__wachtwoord'];
$email = $_POST['email'];

// Sanitizen
$gebruikersnaam = htmlentities($gebruikersnaam, ENT_QUOTES, 'utf-8');
$wachtwoord = htmlentities($wachtwoord, ENT_QUOTES, 'utf-8');
$herhaal__wachtwoord = htmlentities($herhaal__wachtwoord, ENT_QUOTES, 'utf-8');
$email = htmlentities($email, ENT_QUOTES, 'utf-8');

// submit?
if (!isset($_POST['submit__registratie'])) {
    header('Location: registreren.php');
    exit();
}

// Zijn alle velden ingevuld
if (empty($gebruikersnaam) OR empty($wachtwoord) OR empty($herhaal__wachtwoord) OR empty($email)) {
    $melding = 'Je bent vergeten iets in te vullen.';
    echo "<script>alert('$melding');</script>";
    echo "<script>window.location.replace('registreren.php')</script>";
    exit();
}

// Zijn beide wachtwoorden gelijk
if ($wachtwoord != $herhaal__wachtwoord) {
    $melding = 'Je hebt twee verschillende wachtwoorden ingevuld.';
    echo "<script>alert('$melding');</script>";
    echo "<script>window.location.replace('registreren.php')</script>";
    exit();
}

// Is het wel een ma-email
$position = strpos($email, '@ma-web.nl');
if (!$position) {
    $melding = 'Sorry, je kunt je alleen registreren met een emailadres van het mediacollege.';
    echo "<script>alert('$melding');</script>";
    echo "<script>window.location.replace('registreren.php')</script>";
    exit();
}

// Bestaat de gebruikersnaam al
$query = "SELECT gebruikersID FROM thewall WHERE gebruikersnaam = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $gebruikersnaam);
$result = $stmt->execute() or die('Error querying username');
$row = $stmt->fetch();
if ($row) {
    $melding = 'Sorry, deze gebruikersnaam is al bezet.';
    echo "<script>alert('$melding');</script>";
    echo "<script>window.location.replace('registreren.php')</script>";
    exit();
}

// Bestaat het mail adres al
$query = "SELECT gebruikersID FROM thewall WHERE email = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $email);
$result = $stmt->execute() or die('Error querying mailadres');
$row = $stmt->fetch();
if ($row) {
    $melding = 'Sorry, dit emailadres is al in gebruik.';
    echo "<script>alert('$melding');</script>";
    echo "<script>window.location.replace('registreren.php')</script>";
    exit();
}

// Gebruiker toevoegen aan de database
$query = "INSERT INTO thewall VALUES (0, ?, ?, ?, ?, 0)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssss', $gebruikersnaam, $email, $hash, $wachtwoord);
$random__nummer = rand(0, 1000000);
$hash = hash('sha512', $random__nummer);
$wachtwoord = hash('sha512', $_POST['wachtwoord']);
$result = $stmt->execute() or die ('Error inserting user');
$melding = 'U heeft een bevestigingsmail ontvangen.';
echo "<script>alert('$melding');</script>";
echo "<script>window.location.replace('inloggen.php')</script>";


// Gebruiker mailen
$to = $email;
$subject = 'Verifieer je account bij The Wall';
$message = 'Klik op de volgende link om je account te activeren: ';
$message .= 'http://25300.hosts.ma-cloud.nl/ma/bewijzenmap/periode1.3/proj/thewall/verificatie.php?email=' . $email . '&hash=' . $hash;
$headers = 'From: 25300@ma-web.nl';

mail($to, $subject, $message, $headers) or die('Error mailing.');