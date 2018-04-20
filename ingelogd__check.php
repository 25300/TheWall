<?php
session_start();

require ('../../../../../../private/connectie.php');


// Heeft een cookie?
if (!isset($_SESSION['gebruikersID'])) {
    if (!isset($_COOKIE['gebruikersID'])) {
    header('Location: uitlogpoort.php');
    } else {
    require ('cookie__check.php');
    $_SESSION['gebruikersID'] = $_COOKIE['gebruikersID'];
    $_SESSION['hash'] = $_COOKIE['hash'];
    }
}