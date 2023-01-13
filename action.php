<?php
    include 'includes/header.php';
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
                $gen = $bdd->prepare("SELECT * FROM products WHERE genre='action'");
                $gen ->execute();
                while ($donne= $gen->fetch()) {
            ?>
            <div class="container text-center box">
                <div class="align">
                    <img class="box" src= "<?=$donne['img']?>"/><br/>      
                    <div class="align2">
                        <div class="text">
                            <h2><?=$donne['name']?></h2>
                            <p><?=$donne['descriptions']?></p>
                        </div>
                        <iframe class="box-iframe"src="<?=$donne['trailer']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
<?php include 'includes/footer.php'; ?>