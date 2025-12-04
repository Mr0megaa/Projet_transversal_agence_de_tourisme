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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="admin.php"> Voyage Admin (ajout d'un lieu à visiter)</a>
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

    <div class="container">
        <h1 class="mb-4 fw-bold">Ajouter un lieu de visite</h1>

        <form action="insert_circuit.php" method="post" class="card p-4 shadow-sm">

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="Nom" placeholder="Nom">
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="text" class="form-control" name="image" placeholder="Lien de l'image">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="descriptif" placeholder="description">
            </div>

            <div class="mb-3">
                <label class="form-label">Durée</label>
                <input type="number" class="form-control" name="duree" placeholder="durée">
            </div>

            <div class="mb-3">
                <label class="form-label">Prix de la visite (€)</label>
                <input type="number" class="form-control" name="prixVisite" placeholder="Prix">
            </div>

            <div class="mb-3">
                <label class="form-label">Id ville</label>
                <input type="number" class="form-control" name="Id_ville" placeholder="Id_ville">
            </div>

            <button type="submit" name="button" class="btn btn-primary">Envoyer</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>