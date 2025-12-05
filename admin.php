<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Voyage-Voyage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <?php
    include "connect.php";
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#"> Voyage Admin</a>
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
    <!-- TODO : Mettre la navbar admin dans un autre ficher pour pouvoir l'appeller sans tout copier/coller -->
    <div class="container py-4">

        <h1 class="mb-4 fw-bold">AJOUTER — Voyage-Voyage</h1>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Ajout d'un circuit</h5>
                        <a href="insert_circuit.php" class="btn btn-primary btn-sm">Ajouter un circuit</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Ajout d'une étape</h5>
                        <a href="insert_etape.php" class="btn btn-success btn-sm">Ajouter une étape</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Ajout d'un lieu à visiter</h5>
                        <a href="insert_lieu.php" class="btn btn-warning btn-sm">Ajouter un lieu à visiter</a>
                    </div>
                </div>
            </div>
        </div>



        <h1 class="mb-4 fw-bold mt-5">SUPPRIMER — Voyage-Voyage</h1>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Suppression d'un circuit</h5>
                        <a href="delete_circuit.php" class="btn btn-primary btn-sm">Supprimer un circuit</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Suppression d'une étape</h5>
                        <a href="delete_etape.php" class="btn btn-success btn-sm">Supprimer une étape</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Suppression d'un lieu à visiter</h5>
                        <a href="delete_lieu.php" class="btn btn-warning btn-sm">Supprimer un lieu à visiter</a>
                    </div>
                </div>
            </div>
        </div>



        <h1 class="mb-4 fw-bold mt-5">MODIFIER — Voyage-Voyage</h1>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Modification d'un circuit</h5>
                        <a href="modif_circuit.php" class="btn btn-primary btn-sm">Modifier un circuit</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Modification d'une étape</h5>
                        <a href="modif_etape.php" class="btn btn-success btn-sm">Modifier une étape</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Modification d'un lieu à visiter</h5>
                        <a href="modif_lieu.php" class="btn btn-warning btn-sm">Modifier un lieu à visiter</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>