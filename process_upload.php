<?php
session_start();

require ('../../../../../../private/connectie.php');

$userID = (int) $_SESSION['gebruikersID'];
//echo $userID;

//var_dump($_FILES);
$temp_location = $_FILES['userimage']['tmp_name'];
//$target_location = '../images/' . time() . $_FILES['userimage']['name'];
$target_location = 'images/' . time() . $_FILES['userimage']['name'];
//echo "1" . $target_location;
if ($_FILES['userimage']['size'] < 2000000) {
    $result = move_uploaded_file($temp_location, $target_location );
} else {
    echo "Image size is te groot";
}

//if (empty($_FILES['userimage'])) {
//    $melding = 'Je hebt geen foto gekozen';
//    echo "<script>alert('$melding');</script>";
//    echo "<script>window.location.replace('upload.php')</script>";
//}

if ($result) {
    echo "Result";
    echo $userID . " " . $target_location;
    $query = "INSERT INTO post VALUES (0, ?, ?)";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 1');
    $stmt->bind_param('is', $userID, $target_location) or die ('Error binding params.');
    $stmt->execute() or die ('Error executing.');

    header('Location: feed.php');
}
mysqli_close($mysqli);