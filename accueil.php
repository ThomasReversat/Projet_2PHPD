<?php
    include 'includes/header.php';
    session_start() ;
?>
<!-- Import de style -->
<style>
    <?php include 'css/accueil.css'; ?>
    <?php include 'css/default.css'; ?>
</style>

<body>
    <!-- Principale information -->
    <div class="container text-center">
        <h1>Bienvenue sur notre site <?php if (isset($_SESSION["username"]))
            echo $_SESSION["username"];
        else
            echo ""; ?></h1>
        <p>Nous sommes heureux de vous accueillir sur notre site web.</p>
        <form class="" method="get">
            <input type="search" name="s" placeholder="Rechercher une information"/>
            <input type="submit" name="envoyer"/>
        </form>
        <section class="container text-center" class="research">
            <?php
                $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
                $req = $bdd->query("SELECT * FROM movies");
                if(isset($_GET["s"]) AND !empty($_GET["s"])){
                    $projet_php = htmlspecialchars($_GET["s"]);
                    $req = $bdd->query("SELECT title FROM movies WHERE title LIKE '%".$projet_php."%'");
                }if($req->rowCount() > 0){
                    while($movies = $req->fetch()){
                        ?>
                            <p><?= $movies["title"]; ?></p>
                        <?php
                    }
                }else{
                    ?>
                    <p>Aucun films trouver</p>
                    <?php
                }
            ?>
        </section>
        <select class="">
            <option value="category1">Action</option>
            <option value="category2">Drama</option>
        </select>
        <div class="">
            <a href="connexion.php" class="link">Connexion<span></span></a>
            <a href="shop.php" class="link">Boutique<span></span></a>
            <a href="films.php" class="link">Films<span></span></a>
            <a href="deconnexion.php" class="link">Deconnexion</a>

        </div>
    </div> 
</body>
<?php include 'includes/footer.php'; ?>