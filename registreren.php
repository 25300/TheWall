<?php

if (isset($_COOKIE['gebruikersID']) OR isset($_SESSION['gebruikersID'])) {
    header('Location: httpdocs/feed.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Wall | Registreren</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<section class="form__container">
    <!-- Wrapper -->
    <div class="form__wrapper">
        <!-- Logo -->
        <div class="logo">
            <img class="logo" src="css/img/logo.png" alt="Logo The Wall">
        </div>
        <!-- Form registreren -->
        <form class="form" action="verwerk__registreren.php" method="post">
            <div class="form__text">
                <label class="block text" for="gebruikersnaam">Gebruikersnaam:</label>
                <input class="input" type="text" id="gebruikersnaam" name="gebruikersnaam" value="">
                <label class="block text" for="wachtwoord">Wachtwoord:</label>
                <input class="input" id="wachtwoord" type="password" name="wachtwoord" value="">
                <label class="block text" for="herhaal__wachtwoord">Herhaal wachtwoord:</label>
                <input class="input" id="herhaal__wachtwoord" type="password" name="herhaal__wachtwoord" value="">
                <label class="block text" for="email">E-mail:</label>
                <input class="input last__input" id="email" type="email" name="email" value="">
                <button class="button" type="submit" name="submit__registratie">Registreren</button>
            </div>
            <div class="block">
                <p class="registreer">Al een account?</p>
                <a href="inloggen.php" class="registreer">Log hier in!</a>
            </div>
        </form>
    </div>
</section>
</body>
</html>