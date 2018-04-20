<?php

if (isset($_COOKIE['gebruikersID']) OR isset($_SESSION['gebruikersID'])) {
//header('Location: httpdocs/feed.php');
header('Location: feed.php');
}

?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>The Wall | Inloggen</title>
        <link rel="stylesheet" href="css/form.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <section class="form__container">
            <!-- Wrapper -->
            <div class="form__wrapper">
                <!-- Logo -->
                <div class="logo">
                    <img class="logo" src="css/img/logo.png" alt="Logo The Wall">
                </div>
                <!-- Form inloggen -->
                <form class="form" action="inlogpoort.php" method="post">
                    <div class="form__text">
                        <label class="block text" for="gebruikersnaam">Gebruikersnaam:</label>
                        <input class="input" type="text" id="gebruikersnaam" name="gebruikersnaam" value="">
                        <label class="block text" for="wachtwoord">Wachtwoord:</label>
                        <input class="input last__input" id="wachtwoord" type="password" name="wachtwoord" value="">
                        <button class="button" type="submit" name="submit">Aanmelden</button>
                    </div>
                    <div class="block">
                        <p class="registreer">Geen account?</p>
                        <a href="registreren.php" class="registreer">Registreer hier!</a>
                    </div>
<!--                    <a class="block wachtwoord" href="wachtwoord__vergeten.php"> Wachtwoord vergeten?</a>-->
                </form>
            </div>
        </section>
    </body>
</html>
