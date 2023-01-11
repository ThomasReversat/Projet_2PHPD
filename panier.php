<?php 
   session_start();
   include_once "con_dbb.php";
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    unset($_SESSION['panier'][$id_del]);
   }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="panier">
    <a href="index2.php" class="link">Boutique</a>
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
              $ids = array_keys($_SESSION['panier']);
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");
                foreach($products as $product):
                    $total = $total + $product['price'] * $_SESSION['panier'][$product['id']] ;
                ?>
                <tr>
                    <td><img src="img/<?=$product['img']?>"></td>
                    <td><?=$product['name']?></td>
                    <td><?=$product['price']?>€</td>
                    <td><?=$_SESSION['panier'][$product['id']]?></td>
                    <td><a href="panier.php?del=<?=$product['id']?>"><img src="img/delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

            <tr class="total">
                <th>Total : <?=$total?>€</th>
            </tr>
        </table>
    </section>
</body>
</html>