<?php 
session_start() ;
include_once "con_dbb.php";
include 'includes/header.php';

if(!$_SESSION["username"]){
    if(!$_SESSION["passwords"]){
        header("Location: connexion.php");
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Internet Movies DataBase & co</title>
    <link rel="shortcut icon" type="image/ico" href="all_images/icone.ico">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/cat.js"></script>
</head>
<body>
    
    <!-- afficher le nombre de produit dans le panier -->
    <section class="products_list">

    <a href="accueil.php" class="link">Accueil</a>
    <a href="panier.php" class="link">Panier</a>
        <?php 
        //inclure la page de connexion
        //afficher la liste des produits

        $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
        $req = $bdd->query("SELECT * FROM products");
        while ($donnees = $req->fetch()) {
        ?>
        <form action="" class="product">
            <div class="image_product">
                <img src="<?=$donnees['img']?>">
            </div>
            <div class="content">
                <h4 class="name"><?=$donnees['name']?></h4>
                <h2 class="price"><?=$donnees['price']?>€</h2>
                <a href="ajouter_panier.php?id=<?=$donnees['id']?>" class="id_product">Ajouter au panier</a>
            </div>
        </form>

        <?php } ?>
    </section>
</body>
</html>


