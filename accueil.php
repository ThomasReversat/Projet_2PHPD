<?php
    include 'includes/header.php';
    session_start() ;
?>
<style>
    <?php include 'css/accueil.css'; ?>
    <?php include 'css/default.css'; ?>
</style>
<body>
    <div class="cont">
        <div class="container text-center">
            <h1>Bienvenue sur notre site 
            <?php 
            if (isset($_SESSION["username"]))
                echo $_SESSION["username"];
            else
                echo ""; ?></h1>
            <p>Nous sommes heureux de vous accueillir sur notre site web.</p>
            <div class="link center">
                <a href="films.php" class="link">Films<span></span></a>
                <a href="shop.php" class="link">Boutique<span></span></a>
                <a href="panier.php" class="link">Panier<span></span></a>
                <a href="connexion.php" class="link">Connexion<span></span></a>
                <a href="deconnexion.php" class="link">Deconnexion</a>
            </div>
            <form class=""  method="GET">
                <input  class="rch barre" type="search" name="cherche" placeholder="Rechercher une information"/>
                <input class="rch" type="submit" name="envoyer"/>
            </form>
            <section class="container text-center" class="research">
                <?php
                    $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
                    if(isset($_GET["cherche"])){
                        $projet_php = htmlspecialchars($_GET["cherche"]);
                        $gen = $bdd->prepare("SELECT * FROM products join rea on products.id_rea=rea.id_rea
                        join actors on products.id_actors=actors.id_actors WHERE name like '$projet_php%' OR prenom Like '$projet_php%' OR name_actors Like '$projet_php%'");
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
                <?php
                }
                }else{
                ?>
                    <p>Aucun films trouver</p>
                <?php
                }
                ?>
            </section>
            <section class="products_list">
                <?php 
                    $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
                    $req = $bdd->query("SELECT * FROM products LIMIT 5");
                    while ($donnees = $req->fetch()) {
                ?>
                <form action="" class="text-center box">
                    <div class="box1">
                        <img class="box-img" src="<?=$donnees['img']?>">
                        <div class="box2">
                            <div class="box3">
                                <div class="box4">
                                    <h4><?=$donnees['name']?> </h4>
                                    <h4> <?=$donnees['price']?> €</h4>
                                </div>
                            </div>
                            <a href="ajouter_panier_accueil.php?id=<?=$donnees['id']?>" class="link">Ajouter au panier</a>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </section>
        </div> 
    </div>
</body>
<?php include 'includes/footer.php'; ?>