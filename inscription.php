<?php
    include 'includes/header.php';
    session_start();
    $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
    if (isset($_POST["send"])) {
        if (!empty($_POST["username"]) and !empty($_POST["passwords"])) {
            // Informations
            $name = htmlspecialchars($_POST["name"]);
            $first_name = htmlspecialchars($_POST["first_name"]);
            $email = htmlspecialchars($_POST["email"]);
            $age = htmlspecialchars($_POST["age"]);
            $username = htmlspecialchars($_POST["username"]);
            $passwords = sha1($_POST["passwords"]);
            $insertUser = $bdd->prepare("INSERT INTO users(name,first_name,email,age,username,passwords)VALUES(?,?,?,?,?,?)");
            $insertUser->execute(array($name, $first_name, $email, $age, $username, $passwords));
            $find = $bdd->prepare("SELECT * FROM users WHERE username = ? AND passwords = ?");
            $find->execute(array($username, $passwords));
            if($find->rowCount() > 0){
                $_SESSION["username"] = $username;
                $_SESSION["passwords"] = $passwords;
                $_SESSION["username"] = $find->fetch()["id_users"];
            }
        }
        else{
            echo "Veuillez remplir les champs.";
        }
    }
?>

<style><?php include 'css/connexion.css'; ?></style>

<body>
    <form method="POST" action="">
        <!-- Nom -->
        <label>Name</label>
        <input type="text" name="name">
        <!-- Prenom -->
        <label>First Name</label>
        <input type="text" name="first_name">
        <!-- E-mail -->
        <label>E-mail</label>
        <input type="text" name="email">
        <!-- Age -->
        <label>Age</label>
        <input type="text" name="age">
        <!-- Surnom -->
        <label>Username *</label>
        <input type="text" name="username">
        <!-- Mot de passe -->
        <label>Password *</label>
        <input type="password" name="passwords">
        <!-- Boutton -->
        <input type="submit" name="send">
        <p>* Obligatoire</p>
        <?php echo '<a href="http://localhost/Projet_2PHPD/connexion.php">Retour</a>';?>

    </form>
</body>
</html>