<?php
include 'includes/header.php';
session_start() ;
//echo $_SESSION["username"];
?>

<body>
<?php
        $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
        $req = $bdd->query("SELECT images FROM movies");
        while($donnees = $req->fetch()){
        echo ("<img style='width:500px; height:500px;' src = '" . $donnees['images']. "'/><br/>");
        }
    ?>
<?php
    $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
    $req = $bdd->query("SELECT * FROM movies");
    if(isset($_GET["s"]) AND !empty($_GET["s"])){
    $projet_php = htmlspecialchars($_GET["s"]);
    $req = $bdd->query("SELECT title FROM movies WHERE title LIKE '%".$projet_php."%'");
    }
?>
<div class="container text-center head">
        <h1>Bienvenue sur notre site</h1>
        <p>Nous sommes heureux de vous accueillir sur notre site web.</p>
        <div class="research">
            <form class="research-txt">
                <input type="text" placeholder="Search...">
                <button type="submit">Rechercher</button>
            </form>
            <select class="research-cat">
                <option value="category1">Action</option>
                <option value="category2">Drama</option>
            </select>
            
            <input type="button" onclick="window.location.href = 'connexion.php';" value="Connexion" />
        </div>
        <div class="container text-center txt">
            Voici les films disponibles actuellement sur notre site.
        </div>
</div> 

<form method="get">
        <input type="search" name="s" placeholder="Rechercher une information"/>
        <input type="submit" name="envoyer"/>
    </form>
    <section class="display_movies">
        <?php
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

<div class="container text-center">
  <div class="row">
    <div class="col col-margin">
        <img src="all_images/topgun.jpg" class="img-fluid" alt="Movie Poster">
        <h3>Top Gun: Maverick</h3>
        <p class="description">Après plus de 30 ans de service en tant que l'un des meilleurs aviateurs de la Marine,
            Pete Maverick Mitchell est à sa place, repoussant les limites en tant que pilote d'essai courageux et
            esquivant l'avancement de grade qui le mettrait à la terre.
        </p>
    </div>
    <div class="col col-margin">
        <img src="all_images/titanic.jpg" class="img-fluid" alt="Image 1">
        <h3>Titanic</h3>
        <p class="description">En 1997, l'épave du Titanic est l'objet d'une exploration fiévreuse, menée par des chercheurs de trésor
            en quête d'un diamant bleu qui se trouvait à bord. Frappée par un reportage télévisé, l'une des rescapées
            du naufrage, âgée de 102 ans, Rose DeWitt, se rend sur place et évoque ses souvenirs. 1912.
        </p>
    </div>
    <div class="col col-margin">
        <img src="all_images/avatar.jpg" class="img-fluid" alt="Movie Poster">
        <h3>Avatar: La voie de l'eau</h3>
        <p class="description">Jake Sully et Ney'tiri ont formé une famille et font tout pour rester aussi soudés que possible.
            Ils sont cependant contraints de quitter leur foyer et d'explorer les différentes régions encore mystérieuses
            de Pandora. Lorsqu'une ancienne menace refait surface, Jake va devoir mener une guerre difficile contre les
            humains.
        </p>
    </div>
  </div>
</div>
</body>

<?php include 'includes/footer.php'; ?>

