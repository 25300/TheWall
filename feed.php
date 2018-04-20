<!doctype html>

<?php

require ('../../../../../../private/connectie.php');
require ('ingelogd__check.php');
// PHP & MYSQL ESSENTIALS

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="feedstyle.css">-->
    <link rel="stylesheet" href="css/feedstyle.css">
    <script defer src="js/fontawesome-all.js"></script>
    <title>The Wall | Home</title>
</head>
<body>
<div class="wrapper">
    <div class="topnav">
        <div id="title">
<!--            <a href="feed.php"><img class="feedlogo" src="siteimg/logo.png" alt="Webstie Logo"></a>-->
            <a href="feed.php"><img class="feedlogo" src="css/img/logo.png" alt="Webstie Logo"></a>
        </div>
        <div class="dropdown">
            <button id="butt1" class="dropbutt"><i class="fas fa-ellipsis-v"></i></button>
            <div id="myDropcontent" class="dropContent show">
                <a class=" topnavLink" href="upload.php">Upload</a>
                <a class=" topnavLink" href="uitlogpoort.php">Uitloggen</a>
            </div>
        </div>
        <a class="active topnavLink" href="feed.php">Feed</a>
    </div>
    <div class="feed" onload="loadDoc()">
        <?php
        //                $query = "SELECT afbeelding FROM post";
        //                $query = "SELECT afbeelding FROM post";
        //                $result = mysqli_query($mysqli, $query) or die ("ERROR LOADING IMAGES");
        //
        //                $queryID = "SELECT postID from post";
        //                $resultID = mysqli_query($mysqli, $queryID) or die ("ERROR ADDING ID");
        //
        //                                while ($row = mysqli_fetch_array($result)) {
        //                                    $zieAfbeelding = $row['afbeelding'];
        //                                    $user = $row['u']
        //
        //                                    $rowID = mysqli_fetch_array($resultID);
        //                                    $zieID = $rowID['postID'];
        //                                    echo $zieID . ' - ';
        //
        //
        //
        //                                    $queryUserID = "SELECT userID FROM post";
        //                                    $resultUserID = mysqli_query($mysqli, $queryUserID) or die ("ERROR GETTING UPLOADER ID");
        //                                    $rowUserID = mysqli_fetch_array($resultUserID);
        //                                    $zieUserID = $rowUserID['userID'];
        //                                    echo $zieUserID;
        //
        //                                    $queryUserName = "SELECT gebruikersnaam FROM user WHERE userID = $zieUserID ";
        //                                    $resultUserName = mysqli_query($mysqli, $queryUserName) or die ("ERROR GETTING USERNAME");
        //                                    $rowUserName = mysqli_fetch_array($resultUserName);
        //                                    $zieUserName = $rowUserName['gebruikersnaam'];
        //                                    echo $zieUserName;

        $query = "SELECT afbeelding, postID, gebruikersID FROM post";
        $result = mysqli_query($mysqli, $query) or die ("ERROR LOADING IMAGES");

        while ($row = mysqli_fetch_array($result)) {
            $zieAfbeelding = $row['afbeelding'];
            $zieUser = $row['gebruikersID'];
            $ziePost = $row['postID'];

            $queryUserName = "SELECT gebruikersnaam FROM thewall WHERE gebruikersID = $zieUser";
            $resultUserName = mysqli_query($mysqli, $queryUserName) or die ("ERROR GETTING USERNAME");
            $rowUserName = mysqli_fetch_array($resultUserName);
            $zieUserName = $rowUserName['gebruikersnaam'];
            //echo $zieUserName;


            echo '<div class="imgHolder ' . $ziePost . '" ">
                         <img value ="'. $zieUserName .'" id="' . $ziePost . '" class="imgEnt" src="' . $zieAfbeelding . '" />
                  </div>';
        }
        ?>
    </div>
</div>
<!--<script src="feedscript.js"></script>-->
<script src="js/feedscript.js"></script>
</body>
</html>