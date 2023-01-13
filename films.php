<?php
    include 'includes/header.php';
    include 'con_dbb.php';
    session_start() ;
?>
<!-- Import de style -->
<style>
    <?php include 'css/films.css'; ?>
    <?php include 'css/default.css'; ?>

</style>

<body>
    <!-- Barre de navigation -->
    <div class="container text-center">
        <a href="connexion.php" class="link">Connexion</a>
        <a href="shop.php" class="link">Boutique</a>
        <a href="accueil.php" class="link">accueil</a>

        <a href="action.php" class="link">Action</a>
        <a href="drama.php" class="link">Drama</a>

    </div>
    <!-- Importation BDD -->
    <?php
        $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
        $gen = $con->prepare("SELECT * FROM products WHERE genre='action'");
        $gen ->execute();
        $req = $bdd->query("SELECT * FROM products");
        while ($donnees = $req->fetch()) {
    ?>
    <!-- Films -->
    <div class="container text-center">
        <div class="ligne">
            <div class="col">
                <!-- Image -->
                <img class="box" src= "<?=$donnees['img']?>"/><br/>         
                <h2><?=$donnees['name']?></h2>
                <p><?=$donnees['descriptions']?></p>
                <iframe class="box-iframe"src="<?=$donnees['trailer']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
        <?php } ?>
</body>
<?php include 'includes/footer.php'; ?>