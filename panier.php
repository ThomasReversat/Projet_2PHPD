<?php 
    include_once "con_dbb.php";
    include 'includes/header.php';
    session_start();
    if(!$_SESSION["connecter"])
    {
    header("Location:connexion.php");
    }

    if(isset($_GET['del'])){
        $id_del = $_GET['del'] ;
        unset($_SESSION['panier'][$id_del]);
    }
    $bd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","Victory@ng123");
    if($bd)
    {
    $result = $bd->prepare("SELECT *from products join panier on products.id=panier.id and panier.id_users=:id_users");
    $result->execute(
        array(
            'id_users' => $_SESSION['id_users']
        )
    );
    }
?>
<style>
    <?php include 'css/style.css'; ?>
    <?php include 'css/default.css'; ?>
</style>
<body class="panier">
    <div class="box">
        <a href="index.php" class="linke">Accueil</a>
        <a href="shop.php" class="linke">Boutique</a>
    </div>
    <?php if(isset($_SESSION["cart"])) 
        $id=json_encode($_SESSION["cart"])?>
        <?php if(isset($id)):?>
            <a href="sauvegarde.php?id=<?=urlencode($id)?>" class="link">Sauvegarder le panier</a>
        <?php endif;?>
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
                echo $_SESSION["username"];
                $total = 0 ;
                if(isset($_SESSION["panier"]) && isset($result))
                $ids = array_keys(($_SESSION['panier']));
                $mes_res = $result; 
                    if(empty($ids)){                 
                    }
                    else {               
                        $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");
                        foreach($products as $product):
                        $total = $total + $product['price'] * $_SESSION['panier'][$product['id']] ;
                    ?>
            <tr>
                <td><img src="<?=$product['img']?>"></td>
                <td><?=$product['name']?></td>
                <td><?=$product['price']?>€</td>
                <td><?=$_SESSION['panier'][$product['id']]?></td>
                <td><a href="panier.php?del=<?=$product['id']?>"><img src="all_images/delete.png"></a></td>
            </tr>
            <?php endforeach ;} ?>
            <tr class="total">
                <th>Total : <?=$total?>€</th>
            </tr>        
        </table>
    </section>
</body>
</html>
