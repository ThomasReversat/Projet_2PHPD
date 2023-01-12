<?php
include 'includes/header.php';

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
    <link rel="shortcut icon" type="image/ico" href="all_images/icone.ico">
    <link rel="stylesheet" href="css/connexion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/cat.js"></script>
</head>
<body>
   <section>
       <h1> Connexion</h1>
       <form action="" method="POST"> 
            <!-- Username -->
           <label>Username</label>
           <input type="text" name="username">
            <!-- Mot de passe -->
           <label >Mots de Passe</label>
           <input type="password" name="passwords">
            <!-- Boutton -->
           <input type="submit" name="send">
           <!-- Crée un compte -->
           <p>Première visite sur notre site ?</p>
           <?php
            echo '<a href="http://localhost/Projet_2PHPD/inscription.php">Incription</a>';
            echo '<a href="http://localhost/Projet_2PHPD/accueil.php">Retour</a>';

            ?>

       </form>
   </section> 
</body>
<?php include 'includes/footer.php'; ?>
