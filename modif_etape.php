<?php
include "connect.php";

function modifier_etape(PDO $database_handler, array $data)
{
    $sql = "UPDATE etape 
            SET Id_Etape = :Id_Etape, 
                ordre = :ordre, 
                dateEtape = :dateEtape, 
                Id_LieuDeVisite = :Id_LieuDeVisite, 
                Id_Circuit = :Id_Circuit,
            WHERE Id_Etape = :Id_Etape";
    $sth = $database_handler->prepare($sql);
    $sth->execute($data);
}

if (isset($_POST["update"])) {
    $data = [
        'Id_Etape' => $_POST['Id_Etape'],
        'ordre' => $_POST['ordre'],
        'dateEtape' => $_POST['dateEtape'],
        'Id_LieuDeVisite' => $_POST['Id_LieuDeVisite'],
        'Id_Circuit' => $_POST['Id_Circuit'],
    ];
    modifier_etape($bdd, $data);
}

$sql = 'SELECT Id_Etape, ordre, dateEtape, Id_LieuDeVisite, Id_Circuit
        FROM etape
        ORDER BY Id_Etape';
$result = $bdd->query($sql);
$etape = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier étapes</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-100">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="admin.php"> Voyage Admin (Modification d'une étape)</a>
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
        <h1 class="mb-4">Gestion des étapes</h1>
        <table>
            <tr>
                <th scope="col">Id_Etape</th>
                <th scope="col">ordre</th>
                <th scope="col">dateEtape</th>
                <th scope="col">Id_LieuDeVisite</th>
                <th scope="col">Id_Circuit</th>
                <th scope="col">Action</th>
            </tr>
            <tbody>
                <?php foreach ($etape as $ligne): ?>
                    <tr>
                        <form method="post">
                            <td>
                                <?php echo ($ligne['Id_Etape']) ?>
                                <input type="hidden" name="Id_Etape" value="<?= $ligne['Id_Etape'] ?>">
                            </td>
                            <td><input type="text" name="ordre" value="<?php echo ($ligne['ordre']) ?>" class="form-control"></td>
                            <td>
                                <input type="date" name="dateEtape"
                                    value="<?php echo (substr($ligne['dateEtape'], 0, 10)) ?>"
                                    class="form-control">
                            </td>
                            <td><input type="number" name="Id_LieuDeVisite" value="<?php echo ($ligne['Id_LieuDeVisite']) ?>" class="form-control"></td>
                            <td><input type="number" name="Id_Circuit" value="<?php echo ($ligne['Id_Circuit']) ?>" class="form-control"></td>
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