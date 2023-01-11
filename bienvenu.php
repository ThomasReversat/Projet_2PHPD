<?php 
session_start() ;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Internet Movies DataBase & co</title>
    <link rel="shortcut icon" type="image/ico" href="img/icone.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php
     echo "<p class ='message'> Bonjour " .  $_SESSION['email'] . "</p>";
    ?>
</body>
</html>