<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $bdd    = new PDO("mysql:host=$servername;dbname=voyage_voyage", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussi";
} catch (PDOException $e) {
    echo "Erreur :" . $e->getMessage();
}

function ajouter_circuit(PDO $database_handler, array $circuit) // j'ai juste copier ce qu'il y avait dans l'exo donc pas sur du database_handler
{
    $sql = "INSERT INTO circuit(descriptif,dateDepart,nbPlacesDispo,duree,prixInscription,Ville_depart,Ville_arrivee) VALUES (:descriptif,:dateDepart,:nbPlacesDispo,:duree,:prixInscription,:Ville_depart,:Ville_arrivee)"; // Le nom des tables est horribles, maj en plein milieu et pas sur tous, plus les majs au début sur certains et pas les autres, et y'a pas de nom pour le circuit aussi, faut revoir sa
    $sth = $database_handler->prepare($sql);
    $sth->execute($circuit);

    $descriptif = $circuit['descriptif'];
    $result = $database_handler->query("SELECT count(*) FROM circuit WHERE descriptif = '$descriptif'")->fetchColumn();
}
if (isset($_POST["button"])) {
    function ajouter_circuit ();
} else {
    echo "NUL";
}
// if (isset($_POST["button"])) {
//     echo "BIEN";
// } else {
//     echo "NUL";
// }
var_dump($_POST)
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
        <a class="navbar-brand fw-bold" href="admin.html"> Voyage Admin</a>
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
    <form action="insert.php" method="post">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer le descriptif</span>
            <input type="text" class="form-control" placeholder="Descriptif" name="descriptif" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer la date de départ</span>
            <input type="text" class="form-control" placeholder="YYYY-MM-DD HH-MM-SS" name="dateDepart" aria-label="Username" aria-describedby="addon-wrapping"> <!-- Le format date heure est pas ouf, il faut le changer ou trouver une solution pour que l'admin le change sans faire d'erreur-->
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer le nombre de place disponible</span>
            <input type="text" class="form-control" placeholder="Place disponible" name="nbPlacesDispo" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer la durée du voyage</span>
            <input type="text" class="form-control" placeholder="Durée du voyage" name="duree" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer le prix d'inscription</span>
            <input type="text" class="form-control" placeholder="Prix d'inscription" name="prixInscription" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer la ville de départ</span>
            <input type="text" class="form-control" placeholder="Ville de départ" name="Ville_depart" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Inserer la ville d'arrivée</span>
            <input type="text" class="form-control" placeholder="Ville d'arrivée" name="Ville_arrivee" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <input class="btn btn-primary" type="submit" name="button" value="Envoyer"></input>
    </form>
</body>

</html>