<?php

include "connect.php";
function ajouter_circuit(PDO $database_handler, array $etape)
{
    $sql = "INSERT INTO etape(ordre,dateEtape,Id_LieuDeVisite,Id_Circuit) VALUES (:ordre,:dateEtape,:Id_LieuDeVisite,:Id_Circuit)";
    $sth = $database_handler->prepare($sql);
    $sth->execute($etape);
}
if (isset($_POST["button"])) {
    $tableau = [
        "ordre" => $_POST['ordre'],
        "dateEtape" => $_POST['dateEtape'],
        "Id_LieuDeVisite" => $_POST['Id_LieuDeVisite'],
        "Id_Circuit" => $_POST['Id_Circuit']
    ];
    ajouter_circuit($bdd, $tableau);
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
        <a class="navbar-brand fw-bold" href="admin.php"> Voyage Admin (Ajout d'une étape)</a>
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
    <form action="insert_etape.php" method="post">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer l'ordre de l'étape</span>
            <input type="text" class="form-control" placeholder="Ordre" name="ordre" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer la date de l'étape</span>
            <input type="date" class="form-control" name="dateEtape" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer l'id du lieu de visite</span>
            <input type="text" class="form-control" placeholder="Place disponible" name="Id_LieuDeVisite" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer l'id du circuit</span>
            <input type="text" class="form-control" placeholder="Durée du voyage" name="Id_Circuit" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <input class="btn btn-primary" type="submit" name="button" value="Envoyer"></input>
    </form>
</body>

</html>