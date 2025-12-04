<?php

include "connect.php";

function ajouter_circuit(PDO $database_handler, array $circuit)
{
    $sql = "INSERT INTO circuit(descriptif,dateDepart,nbPlacesDispo,duree,prixInscription,Ville_depart,Ville_arrivee) 
            VALUES (:descriptif,:dateDepart,:nbPlacesDispo,:duree,:prixInscription,:Ville_depart,:Ville_arrivee)";
    $sth = $database_handler->prepare($sql);
    $sth->execute($circuit);
}

if (isset($_POST["button"])) {
    $tableau = [
        "descriptif" => $_POST['descriptif'],
        "dateDepart" => $_POST['dateDepart'],
        "nbPlacesDispo" => $_POST['nbPlacesDispo'],
        "duree" => $_POST['duree'],
        "prixInscription" => $_POST['prixInscription'],
        "Ville_depart" => $_POST['Ville_depart'],
        "Ville_arrivee" => $_POST['Ville_arrivee']
    ];
    ajouter_circuit($bdd, $tableau);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un circuit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="admin.php">Voyage Admin (Ajout d'un circuit)</a>
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
        <h1 class="mb-4 fw-bold">Ajouter un circuit</h1>

        <form action="insert_circuit.php" method="post" class="card p-4 shadow-sm">

            <div class="mb-3">
                <label class="form-label">Descriptif</label>
                <input type="text" class="form-control" name="descriptif" placeholder="Descriptif">
            </div>

            <div class="mb-3">
                <label class="form-label">Date de départ</label>
                <input type="datetime-local" class="form-control" name="dateDepart">
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre de places disponibles</label>
                <input type="number" class="form-control" name="nbPlacesDispo" placeholder="Places disponibles">
            </div>

            <div class="mb-3">
                <label class="form-label">Durée du voyage (en jours)</label>
                <input type="number" class="form-control" name="duree" placeholder="Durée">
            </div>

            <div class="mb-3">
                <label class="form-label">Prix d'inscription (€)</label>
                <input type="number" class="form-control" name="prixInscription" placeholder="Prix">
            </div>

            <div class="mb-3">
                <label class="form-label">ID de la ville de départ</label>
                <input type="number" class="form-control" name="Ville_depart" placeholder="ID Ville départ">
            </div>

            <div class="mb-3">
                <label class="form-label">ID de la ville d'arrivée</label>
                <input type="number" class="form-control" name="Ville_arrivee" placeholder="ID Ville arrivée">
            </div>

            <button type="submit" name="button" class="btn btn-primary">Envoyer</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>