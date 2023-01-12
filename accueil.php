<?php
include 'includes/header.php';

session_start() ;
// include 'includes/header.php';
//echo $_SESSION["username"];
?>
<style>
<?php include 'css/accueil.css'; ?>
</style>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Internet Movies DataBase & co</title>
    <link rel="shortcut icon" type="image/ico" href="all_images/icone.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/cat.js"></script>
</head>
<body>
<div class="container text-center head">
        <h1>Bienvenue sur notre site</h1>
        <p>Nous sommes heureux de vous accueillir sur notre site web.</p>
        <form method="get">
        <input type="search" name="s" placeholder="Rechercher une information"/>
        <input type="submit" name="envoyer"/>
        </form>
        <section class="display_movies">
            <?php
                $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");

            $req = $bdd->query("SELECT * FROM movies");
            if(isset($_GET["s"]) AND !empty($_GET["s"])){
            $projet_php = htmlspecialchars($_GET["s"]);
            $req = $bdd->query("SELECT title FROM movies WHERE title LIKE '%".$projet_php."%'");
            }
                if($req->rowCount() > 0){
                    while($movies = $req->fetch()){
                        ?>
                            <p><?= $movies["title"]; ?></p>
                        <?php
                    }
                }
                else{
                    ?>
                    <p>Aucun utilisateur</p>
                    <?php
                }
            ?>
        </section>
            <select class="research-cat">
                <option value="category1">Action</option>
                <option value="category2">Drama</option>
            </select>

            <a href="connexion.php" class="link">Connexion<span></span></a>
            <a href="shop.php" class="link">Shop<span></span></a>
            <a href="shop.php" class="link">Boutique<span></span></a>



        </div>
        <div class="container text-center txt">
            Voici les films disponibles actuellement sur notre site.
        </div>
</div> 




    <?php
    $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
    $req = $bdd->query("SELECT * FROM products");
        while ($donnees = $req->fetch()) {
            ?>
            <div class="container text-center">
                <div class="row">
                    <!-- <form class=""> -->
                        <div class="col">
                            <img class="" src = "<?=$donnees['img']?>"/><br/>         
                            <p class=""><?=$donnees['name']?></p>
                            <p class=""><?=$donnees['descriptions']?></p>
                            <iframe class="" width="560" height="315" src="<?=$donnees['trailer']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                        </div>
                    <!-- </form> -->
                </div>
            </div>

            <?php } ?>


</body>

<?php include 'includes/footer.php'; ?>
