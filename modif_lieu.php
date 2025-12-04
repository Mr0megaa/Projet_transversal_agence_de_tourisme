<?php
include "connect.php";

function modifier_lieu(PDO $database_handler, array $data)
{
    $sql = "UPDATE lieu 
            SET Id_LieuDeVisite = :Id_LieuDeVisite, 
                Nom = :Nom, 
                image = :image, 
                descriptif = :descriptif, 
                duree = :duree,
                prixVisite = :prixVisite,
                Id_Ville = :Id_Ville,
            WHERE Id_LieuDeVisite = :Id_LieuDeVisite";
    $sth = $database_handler->prepare($sql);
    $sth->execute($data);
}

if (isset($_POST["update"])) {
    $data = [
        'Id_LieuDeVisite' => $_POST['Id_LieuDeVisite'],
        'Nom' => $_POST['Nom'],
        'image' => $_POST['image'],
        'descriptif' => $_POST['descriptif'],
        'duree' => $_POST['duree'],
        'prixVisite' => $_POST['prixVisite'],
        'Id_Ville' => $_POST['Id_Ville']
    ];
    modifier_etape($bdd, $data);
}

$sql = 'SELECT Id_LieuDeVisite, Nom, image, descriptif, duree, prixVisite, Id_Ville
        FROM lieudevisite
        ORDER BY Id_LieuDeVisite';
$result = $bdd->query($sql);
$lieudevisite = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier lieu</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-100">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="admin.php"> Voyage Admin (Modification d'un lieu de visite)</a>
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

    <div class="container-fluid mt-4">
        <h1 class="mb-4">Gestion des lieux de visite</h1>
        <table>
            <tr>
                <th scope="col">Id_LieuDeVisite</th>
                <th scope="col">Nom</th>
                <th scope="col">image</th>
                <th scope="col">descriptif</th>
                <th scope="col">duree</th>
                <th scope="col">prixVisite</th>
                <th scope="col">Id_Ville</th>
                <th scope="col">Action</th>
            </tr>
            <tbody>
                <?php foreach ($lieudevisite as $ligne): ?>
                    <tr>
                        <form method="post">
                            <td>
                                <?= $ligne['Id_LieuDeVisite'] ?>
                                <input type="hidden" name="Id_LieuDeVisite" value="<?= $ligne['Id_LieuDeVisite'] ?>">
                            </td>
                            <td><input type="text" name="Nom" value="<?= $ligne['Nom'] ?>" class="form-control"></td>
                            <td>
                                <img src="<?= $ligne['image'] ?>" alt="<?= $ligne['Nom'] ?>" style="max-width:150px; height:auto;">
                                <input type="text" name="image" value="<?= $ligne['image'] ?>" class="form-control mt-2">
                            </td>

                            <td><input type="text" name="descriptif" value="<?= $ligne['descriptif'] ?>" class="form-control"></td>
                            <td><input type="text" name="duree" value="<?= $ligne['duree'] ?>" class="form-control"></td>
                            <td><input type="number" name="prixVisite" value="<?= $ligne['prixVisite'] ?>" class="form-control"></td>
                            <td><input type="number" name="Id_Ville" value="<?= $ligne['Id_Ville'] ?>" class="form-control"></td>
                            <td>
                                <button type="submit" name="update" class="btn btn-warning btn-sm">Modifier</button>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>