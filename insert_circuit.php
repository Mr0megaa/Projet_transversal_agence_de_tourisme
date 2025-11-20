<?php

$servername = "localhost";
$username = "root";
$password = "";
//TODO : Faire un mode de connection avec un gitignore pour éviter de mettre tout ce pavé a chaque page qui a besoin de se connecter (quasiment toutes les pages)
try {
    $bdd    = new PDO("mysql:host=$servername;dbname=voyage_voyage", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussi";
} catch (PDOException $e) {
    echo "Erreur :" . $e->getMessage();
}

function ajouter_circuit(PDO $database_handler, array $circuit)
{
    $sql = "INSERT INTO circuit(descriptif,dateDepart,nbPlacesDispo,duree,prixInscription,Ville_depart,Ville_arrivee) VALUES (:descriptif,:dateDepart,:nbPlacesDispo,:duree,:prixInscription,:Ville_depart,:Ville_arrivee)";
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
    <form action="insert_circuit.php" method="post">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer le descriptif</span>
            <input type="text" class="form-control" placeholder="Descriptif" name="descriptif" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer la date de départ</span>
            <input type="datetime-local" class="form-control" placeholder="YYYY-MM-DD HH-MM-SS" name="dateDepart" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer le nombre de place disponible</span>
            <input type="text" class="form-control" placeholder="Place disponible" name="nbPlacesDispo" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer la durée du voyage</span>
            <input type="text" class="form-control" placeholder="Durée du voyage" name="duree" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer le prix d'inscription</span>
            <input type="text" class="form-control" placeholder="Prix d'inscription" name="prixInscription" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer l'id de la ville de départ</span>
            <input type="text" class="form-control" placeholder="Id de la ville de départ" name="Ville_depart" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Insérer l'id de la ville d'arrivée</span>
            <input type="text" class="form-control" placeholder="Id de la ville d'arrivée" name="Ville_arrivee" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <input class="btn btn-primary" type="submit" name="button" value="Envoyer"></input>
    </form>
</body>

</html>