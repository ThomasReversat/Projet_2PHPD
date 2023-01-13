<?php
session_start();
if(isset($_SESSION['connecter'])==true)
{
    $_SESSION['connecter'] = false;
     session_destroy();
    header("Location:accueil.php");
}
?>