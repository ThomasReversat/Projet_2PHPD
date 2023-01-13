<?php
function ajouter_panier($id,$id_users)
{
    $bdd = new PDO("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");
    if($bdd)
    {
        $requete = $bdd->prepare("insert into panier(id,id_users) VALUES(?,?)");
        $requete->execute(array($id, $id_users));
    }
}
?>