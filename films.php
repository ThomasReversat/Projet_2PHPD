<?php
    include 'includes/header.php';
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
        <a href="connexion.php" class="link">Connexion<span></span></a>
        <a href="shop.php" class="link">Boutique<span></span></a>
        <a href="accueil.php" class="link">accueil<span></span></a>
    </div>
    <!-- Importation BDD -->
    <?php
        $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
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