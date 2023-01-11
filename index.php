<?php 
   session_start() ;
  if(isset($_POST['boutton-valider'])){ 
    if(isset($_POST['email']) && isset($_POST['mdp'])) {
        $email = $_POST['email'] ;
        $mdp = $_POST['mdp'] ;
        $erreur = "" ;
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe ="";
        $nom_base_données ="projet_php" ;
        $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
        $req = mysqli_query($con , "SELECT * FROM users WHERE email = '$email' AND mdp ='$mdp' ") ;
        $num_ligne = mysqli_num_rows($req) ;
        if($num_ligne > 0){
            header("Location:accueil.php") ;
            $_SESSION['email'] = $email ;
        }else {
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
   <section>
       <h1> Connexion</h1>
       <?php 
       if(isset($erreur)){
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
       <form action="" method="POST"> 
           <label>Adresse Mail</label>
           <input type="text" name="email">
           <label >Mots de Passe</label>
           <input type="password" name="mdp">
           <input type="submit" value="Valider" name="boutton-valider">
       </form>
   </section> 
</body>
</html>