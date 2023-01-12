<?php 
session_start();
include_once "con_dbb.php";
include 'includes/header.php';

echo $_SESSION["username"];
//supprimer les produits
//si la variable del existe
if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
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
<body class="panier">
<a href="shop.php" class="link">Boutique</a>
<section>
    <table>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Action</th>
        </tr>
        <?php 
            $total = 0 ;
            // liste des produits
            //récupérer les clés du tableau session
            //s'il n'y a aucune clé dans le tableau
            $ids = array_keys($_SESSION['panier']);
            //s'il n'y a aucune clé dans le tableau
            if(empty($ids)){
              echo "Votre panier est vide";
            }else {
              //si oui 
              
              $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");

              //lise des produit avec une boucle foreach
              foreach($products as $product):
                  //calculer le total ( prix unitaire * quantité) 
                  //et aditionner chaque résutats a chaque tour de boucle
                  $total = $total + $product['price'] * $_SESSION['panier'][$product['id']] ;
              ?>
              <tr>
                  <td><img src="<?=$product['img']?>"></td>
                  <td><?=$product['name']?></td>
                  <td><?=$product['price']?>€</td>
                  <td><?=$_SESSION['panier'][$product['id']] // Quantité?></td>
                  <td><a href="panier.php?del=<?=$product['id']?>"><img src="all_images/delete.png"></a></td>
              </tr>

          <?php endforeach ;} ?>

        </tr>
    </table>
</section>
</body>
</html>