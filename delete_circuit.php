<?php

include "connect.php";
function supprimer_circuit(PDO $database_handler, int $id_circuit)
{
    $sql = ("DELETE FROM circuit where Id_Circuit =:Id_Circuit");
    $sth = $database_handler->prepare($sql);
    $sth->execute(['Id_Circuit' => $id_circuit]);
}
if (isset($_POST["Id_Circuit"])) {
    $id = (int) $_POST["Id_Circuit"];
    supprimer_circuit($bdd, $id);
}

$sql = 'SELECT Id_Circuit, descriptif, dateDepart, nbPlacesDispo, duree, prixInscription, Ville_depart, Ville_arrivee 
        FROM circuit 
        ORDER BY Id_Circuit';

$result = $bdd->query($sql);

$circuit = [];
foreach ($result as $ligne) {
    $circuit[] = [
        'Id_Circuit'      => $ligne['Id_Circuit'],
        'descriptif'      => $ligne['descriptif'],
        'dateDepart'      => $ligne['dateDepart'],
        'nbPlacesDispo'   => $ligne['nbPlacesDispo'],
        'duree'           => $ligne['duree'],
        'prixInscription' => $ligne['prixInscription'],
        'Ville_depart'    => $ligne['Ville_depart'],
        'Ville_arrivee'   => $ligne['Ville_arrivee']
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
        <a class="navbar-brand fw-bold" href="admin.php"> Voyage Admin (Suppression d'un circuit)</a>
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
    <form action="delete_circuit.php" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id_Circuit</th>
                    <th scope="col">descriptif</th>
                    <th scope="col">dateDepart</th>
                    <th scope="col">nbPlacesDispo</th>
                    <th scope="col">duree</th>
                    <th scope="col">prixInscription</th>
                    <th scope="col">Ville_depart</th>
                    <th scope="col">Ville_arrivee</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($circuit as $ligne): ?>
                    <tr>
                        <td><?php echo ($ligne['Id_Circuit']) ?></td>
                        <td><?php echo ($ligne['descriptif']) ?></td>
                        <td><?php echo ($ligne['dateDepart']) ?></td>
                        <td><?php echo ($ligne['nbPlacesDispo']) ?></td>
                        <td><?php echo ($ligne['duree']) ?></td>
                        <td><?php echo ($ligne['prixInscription']) ?></td>
                        <td><?php echo ($ligne['Ville_depart']) ?></td>
                        <td><?php echo ($ligne['Ville_arrivee']) ?></td>
                        <td>
                            <button type="submit" name="Id_Circuit" value="<?php echo $ligne['Id_Circuit'] ?>" class="btn btn-danger btn-sm">
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