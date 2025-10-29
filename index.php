<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $bdd    = new PDO("mysql:host=$servername;dbname=classicmodels", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussi";
} catch (PDOException $e) {
    echo "Erreur :" . $e->getMessage();
}
$sql = "SELECT employees.lastName
FROM employees
WHERE employees.jobTitle = :jobTitle";
$req = $bdd->prepare($sql);
$success = $req->execute(['jobTitle' => "Sales Rep"]);
while ($rep = $req->fetch()) {
    echo $rep['lastName'] . '<br>';
}
