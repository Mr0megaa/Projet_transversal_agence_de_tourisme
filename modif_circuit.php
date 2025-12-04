<?php
include "connect.php";

function modifier_circuit(PDO $database_handler, array $data)
{
    $sql = "UPDATE circuit 
            SET descriptif = :descriptif, 
                dateDepart = :dateDepart, 
                nbPlacesDispo = :nbPlacesDispo, 
                duree = :duree, 
                prixInscription = :prixInscription, 
                Ville_depart = :Ville_depart, 
                Ville_arrivee = :Ville_arrivee
            WHERE Id_Circuit = :Id_Circuit";
    $sth = $database_handler->prepare($sql);
    $sth->execute($data);
}

if (isset($_POST["update"])) {
    $data = [
        'Id_Circuit' => $_POST['Id_Circuit'],
        'descriptif' => $_POST['descriptif'],
        'dateDepart' => $_POST['dateDepart'],
        'nbPlacesDispo' => $_POST['nbPlacesDispo'],
        'duree' => $_POST['duree'],
        'prixInscription' => $_POST['prixInscription'],
        'Ville_depart' => $_POST['Ville_depart'],
        'Ville_arrivee' => $_POST['Ville_arrivee']
    ];
    modifier_circuit($bdd, $data);
}

$sql = 'SELECT Id_Circuit, descriptif, dateDepart, nbPlacesDispo, duree, prixInscription, Ville_depart, Ville_arrivee 
        FROM circuit 
        ORDER BY Id_Circuit';
$result = $bdd->query($sql);
$circuit = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier circuits</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-100">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="admin.php"> Voyage Admin (Modification d'un circuit)</a>
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
        <h1 class="mb-4">Gestion des circuits</h1>
        <table>
            <tr>
                <th scope="col">Id_Circuit</th>
                <th scope="col">Descriptif</th>
                <th scope="col">Date départ</th>
                <th scope="col">Places dispo</th>
                <th scope="col">Durée</th>
                <th scope="col">Prix</th>
                <th scope="col">Ville départ</th>
                <th scope="col">Ville arrivée</th>
                <th scope="col">Action</th>
            </tr>
            <tbody>
                <?php foreach ($circuit as $ligne): ?>
                    <tr>
                        <form method="post">
                            <td>
                                <?php echo ($ligne['Id_Circuit']) ?>
                                <input type="hidden" name="Id_Circuit" value="<?= $ligne['Id_Circuit'] ?>">
                            </td>
                            <td><input type="text" name="descriptif" value="<?= htmlspecialchars($ligne['descriptif']) ?>" class="form-control"></td>
                            <td>
                                <input type="date" name="dateDepart"
                                    value="<?php echo (substr($ligne['dateDepart'], 0, 10)) ?>"
                                    class="form-control">
                            </td>
                            <td><input type="number" name="nbPlacesDispo" value="<?php echo ($ligne['nbPlacesDispo']) ?>" class="form-control"></td>
                            <td><input type="text" name="duree" value="<?php echo ($ligne['duree']) ?>" class="form-control"></td>
                            <td><input type="number" name="prixInscription" value="<?php echo ($ligne['prixInscription']) ?>" class="form-control"></td>
                            <td><input type="text" name="Ville_depart" value="<?php echo ($ligne['Ville_depart']) ?>" class="form-control"></td>
                            <td><input type="text" name="Ville_arrivee" value="<?php echo ($ligne['Ville_arrivee']) ?>" class="form-control"></td>
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