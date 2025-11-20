<?php

include "connect.php";
function ajouter_lieudevisite(PDO $database_handler, array $lieudevisite)
{
    $sql = "INSERT INTO lieudevisite(Nom,image,descriptif,duree,prixVisite,Id_ville) VALUES (:Nom,:image,:descriptif,:duree,:prixVisite,:Id_ville)";
    $sth = $database_handler->prepare($sql);
    $sth->execute($lieudevisite);
}
if (isset($_POST["button"])) {
    $tableau = [
        "Nom" => $_POST['Nom'],
        "image" => $_POST['image'],
        "descriptif" => $_POST['descriptif'],
        "duree" => $_POST['duree'],
        "prixVisite" => $_POST['prixVisite'],
        "Id_ville" => $_POST['Id_ville']
    ];
    ajouter_lieudevisite($bdd, $tableau);
}
// if (isset($_POST["button"])) {
//     echo "BIEN";
// } else {
//     echo "NUL";
// }
// var_dump($_POST)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="admin.php"> Voyage Admin (ajout d'un lieu à visiter)</a>
        <!-- Rajouter le nom de la page comme ci-dessus entre parenthèse sur toutes les pages -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Tableau de bord</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Voyages</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Clients</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Réservations</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="index.html">Déconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <form action="insert_lieu.php" method="post">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer le nom</span>
            <input type="text" class="form-control" placeholder="Nom" name="Nom" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer l'image</span>
            <input type="text" class="form-control" placeholder="url" name="image" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer le descriptif</span>
            <input type="text" class="form-control" placeholder="Descriptif" name="descriptif" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer la durée en minutes</span>
            <input type="text" class="form-control" placeholder="Durée de la visite" name="duree" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer le prix de la visite</span>
            <input type="text" class="form-control" placeholder="Prix de la visite" name="prixVisite" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer l'id de la ville</span>
            <input type="text" class="form-control" placeholder="Id de la ville" name="Id_ville" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <input class="btn btn-primary" type="submit" name="button" value="Envoyer"></input>
    </form>
</body>

</html>