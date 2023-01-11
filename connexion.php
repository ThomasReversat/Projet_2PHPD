<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");

if(isset($_POST["send"])){ 
    if(isset($_POST['username']) AND !empty($_POST["passwords"])){
        $username = htmlspecialchars($_POST["username"]);
        $passwords = sha1($_POST["passwords"]);
        $find = $bdd -> prepare("SELECT * FROM users WHERE username = ? AND passwords = ?");
        $find -> execute(array($username, $passwords));

        if($find -> rowCount() > 0){
            $_SESSION["username"] = $username;
            $_SESSION["passwords"] = $passwords;
            $_SESSION["id_users"] = $find->fetch()["id_users"];
            header("Location:accueil.php") ;

        }else{
            echo "Votre mot de passe ou username n'est pas bon.";
        }

    }else{
        echo "Veuillez completer tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Internet Movies DataBase & co</title>
    <link rel="shortcut icon" type="image/ico" href="img/icone.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
</head>
<body>
   <section>
       <h1> Connexion</h1>
       <form action="" method="POST"> 

           <label>Username</label>
           <input type="text" name="username">

           <label >Mots de Passe</label>
           <input type="password" name="passwords">

           <input type="submit" name="send">
       </form>
   </section> 
</body>
</html>