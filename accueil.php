<?php
    include 'includes/header.php';
    session_start() ;
?>
<!-- Import de style -->
<style><?php include 'css/accueil.css'; ?></style>
<body>
    <!-- Principale information -->
    <div class="container text-center head">
        <h1>Bienvenue sur notre site</h1>
        <p>Nous sommes heureux de vous accueillir sur notre site web.</p>
        <form method="get">
            <input type="search" name="s" placeholder="Rechercher une information"/>
            <input type="submit" name="envoyer"/>
        </form>
        <section class="display_movies">
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
                    <p>Aucun utilisateur</p>
                    <?php
                }
            ?>
            </section>
            <select class="research-cat">
                <option value="category1">Action</option>
                <option value="category2">Drama</option>
            </select>
            <a href="connexion.php" class="link">Connexion<span></span></a>
            <a href="shop.php" class="link">Shop<span></span></a>
            <a href="shop.php" class="link">Boutique<span></span></a>
        </div>
    </div> 
    <?php
        $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
        $req = $bdd->query("SELECT * FROM products");
        while ($donnees = $req->fetch()) {
    ?>
    <div class="container text-center">
        <div class="row">
            <!-- <form class=""> -->
            <div class="col">
                <img class="" src = "<?=$donnees['img']?>"/><br/>         
                <p class=""><?=$donnees['name']?></p>
                <p class=""><?=$donnees['descriptions']?></p>
                <iframe class="" width="560" height="315" src="<?=$donnees['trailer']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <!-- </form> -->
        </div>
    </div>
        <?php } ?>
</body>
<?php include 'includes/footer.php'; ?>
