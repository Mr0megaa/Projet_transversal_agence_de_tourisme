<?php

include "connect.php";
function supprimer_lieu(PDO $database_handler, int $Id_LieuDeVisite)
{
    $sql = ("DELETE FROM lieudevisite where Id_LieuDeVisite =:Id_LieuDeVisite");
    $sth = $database_handler->prepare($sql);
    $sth->execute(['Id_LieuDeVisite' => $Id_LieuDeVisite]);
}
if (isset($_POST["Id_LieuDeVisite"])) {
    $id = (int) $_POST["Id_LieuDeVisite"];
    supprimer_lieu($bdd, $id);
}

$sql = 'SELECT Id_LieuDeVisite, Nom, image, descriptif, duree, prixVisite, Id_Ville 
        FROM lieudevisite
        ORDER BY Id_LieuDeVisite';

$result = $bdd->query($sql);

$lieudevisite = [];
foreach ($result as $ligne) {
    $lieudevisite[] = [
        'Id_LieuDeVisite' => $ligne['Id_LieuDeVisite'],
        'Nom' => $ligne['Nom'],
        'image' => $ligne['image'],
        'descriptif' => $ligne['descriptif'],
        'duree' => $ligne['duree'],
        'prixVisite' => $ligne['prixVisite'],
        'Id_Ville' => $ligne['Id_Ville'],
    ];
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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="admin.php"> Voyage Admin (Suppression d'un lieu)</a>
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
    <form action="delete_lieu.php" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id_LieuDeVisite</th>
                    <th scope="col">Nom</th>
                    <th scope="col">image</th>
                    <th scope="col">descriptif</th>
                    <th scope="col">duree</th>
                    <th scope="col">prixVisite</th>
                    <th scope="col">Id_Ville</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lieudevisite as $ligne): ?>
                    <tr>
                        <td><?php echo ($ligne['Id_LieuDeVisite']) ?></td>
                        <td><?php echo ($ligne['Nom']) ?></td>
                        <td>
                            <img src="<?php echo $ligne['image'] ?>"
                                style="max-width:150px; height:auto;">
                            <!-- TODO : Mettre le style dans le .css -->
                        </td>
                        <td><?php echo ($ligne['descriptif']) ?></td>
                        <td><?php echo ($ligne['duree']) ?></td>
                        <td><?php echo ($ligne['prixVisite']) ?></td>
                        <td><?php echo ($ligne['Id_Ville']) ?></td>
                        <td>
                            <button type="submit" name="Id_LieuDeVisite" value="<?php echo $ligne['Id_LieuDeVisite'] ?>" class="btn btn-danger btn-sm">
                                Supprimer
                            </button>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    </form>
</body>

</html>