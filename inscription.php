<?php
include 'includes/header.php';

session_start();
$bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
if (isset($_POST["send"])) {
    if (!empty($_POST["username"]) and !empty($_POST["passwords"])) {
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

<body>
    <form method="POST" action="">
        <label>Name</label>
        <input type="text" name="name">
        <label>First Name</label>
        <input type="text" name="first_name">
        <label>E-mail</label>
        <input type="text" name="email">
        <label>Age</label>
        <input type="text" name="age">
        <label>Username *</label>
        <input type="text" name="username">
        <label>Password *</label>
        <input type="password" name="passwords">

        <input type="submit" name="send">

        <p>* Obligatoire</p>
    </form>
</body>
</html>