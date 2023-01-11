<?php 
include 'includes/header.php';
 session_start() ;
?>

<body>
    <!-- afficher le nombre de produit dans le panier -->
    <a href="panier.php" class="link">Panier<span><?=array_sum($_SESSION['panier'])?></span></a>
    <section class="products_list">
        <?php 
        //inclure la page de connexion
        include_once "con_dbb.php";
        //afficher la liste des produits
         $req = mysqli_query($con, "SELECT * FROM products");
         while($row = mysqli_fetch_assoc($req)){ 
        ?>
        <form action="" class="product">
            <div class="image_product">
                <img src="all_images/<?=$row['img']?>">
            </div>
            <div class="content">
                <h4 class="name"><?=$row['name']?></h4>
                <h2 class="price"><?=$row['price']?>€</h2>
                <a href="ajouter_panier.php?id=<?=$row['id']?>" class="id_product">Ajouter au panier</a>
            </div>
        </form>

        <?php } ?>
       
    </section>
</body>
</html>