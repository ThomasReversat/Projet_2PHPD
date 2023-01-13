<?php 
    include_once "con_dbb.php";
    include 'includes/header.php';
    session_start() ;
    
?>

<style><?php include 'css/style.css'; ?></style>

<body>
    <section class="products_list">
    <a href="accueil.php" class="link">Accueil</a>
    <a href="panier.php" class="link">Panier</a>
    <?php 
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


