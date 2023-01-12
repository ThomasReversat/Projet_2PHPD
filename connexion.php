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
                echo "<p>Votre mot de passe ou username n'est pas bon.</p>";
            }
        }else{
            echo "<p>Veuillez completer tous les champs.</p>";
        }
    }
?>

<style>
    <?php include 'css/connexion.css'; ?>
    <?php include 'css/default.css'; ?>
</style>

<body>
   <section>
       <h1>Connexion</h1>
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
                echo '<a class="link" href="http://localhost/Projet_2PHPD/inscription.php">Incription</a>';
                echo '<a class="link" href="http://localhost/Projet_2PHPD/accueil.php">Retour</a>';
            ?>
       </form>
   </section> 
</body>
<?php include 'includes/footer.php'; ?>
