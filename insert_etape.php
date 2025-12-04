<?php

include "connect.php";
function ajouter_etape(PDO $database_handler, array $etape)
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
    ajouter_etape($bdd, $tableau);
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

    <div class="container">
        <h1 class="mb-4 fw-bold">Ajouter une étape</h1>

        <form action="insert_circuit.php" method="post" class="card p-4 shadow-sm">

            <div class="mb-3">
                <label class="form-label">Ordre</label>
                <input type="number" class="form-control" name="Ordre" placeholder="Ordre">
            </div>

            <div class="mb-3">
                <label class="form-label">Date Etape</label>
                <input type="date" class="form-control" name="dateEtape">
            </div>

            <div class="mb-3">
                <label class="form-label">Id_LieuDeVisite</label>
                <input type="number" class="form-control" name="Id_LieuDeVisite" placeholder="Id_LieuDeVisite">
            </div>

            <div class="mb-3">
                <label class="form-label">Id_Circuit</label>
                <input type="number" class="form-control" name="Id_Circuit" placeholder="Id_Circuit">
            </div>

            <button type="submit" name="button" class="btn btn-primary">Envoyer</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>