<?php 
    include_once "con_dbb.php";
    include 'includes/header.php';
    session_start();
    //supprimer les produits
    //si la variable del existe
    if(isset($_GET['del'])){
        $id_del = $_GET['del'] ;
        //suppression
        unset($_SESSION['panier'][$id_del]);
    }
?>

<style><?php include 'css/style.css'; ?></style>

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
                $ids = array_keys($_SESSION['panier']);
                if(empty($ids)){
                    echo "Votre panier est vide";
                }else {
                    $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");
                foreach($products as $product):
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