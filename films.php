<?php
    include 'includes/header.php';
    include 'con_dbb.php';
    session_start() ;
?>
<style>
    <?php include 'css/films.css'; ?>
    <?php include 'css/default.css'; ?>

</style>
<body>
    <div class="cont">
        <div class="container text-center">
            <div class="link center">
                <a href="accueil.php" class="link">Accueil</a>
                <a href="shop.php" class="link">Boutique</a>
                <a href="action.php" class="link">Action</a>
                <a href="drama.php" class="link">Drama</a>
            </div>
            <?php
                $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
                $gen = $bdd->prepare("SELECT * FROM products join rea on products.id_rea=rea.id_rea
                join actors on products.id_actors=actors.id_actors");
                $gen ->execute();
                while ($donnees = $gen->fetch()) {
            ?>
            <div class="container text-center box">
                <div class="align">
                    <img class="box" src= "<?=$donnees['img']?>"/><br/>     
                    <div class="align2">
                        <div class="text">
                            <h2><?= $donnees['name'] ?> avec <?= $donnees['name_actors'] ?> realiser par <?= $donnees['nom'].' '.$donnees['prenom']?></h2>
                            <p><?=$donnees['descriptions']?></p>
                        </div>
                        <iframe class="box-iframe"src="<?=$donnees['trailer']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
<?php include 'includes/footer.php'; ?>