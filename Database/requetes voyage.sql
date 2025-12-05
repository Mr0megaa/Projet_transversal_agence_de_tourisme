/* affiche l’identifiant du circuit, descriptif, nom
 ville de départ/ville d’arrivée ainsi que le nombre d’étapes du circuit */

SELECT circuit.Id_Circuit, circuit.descriptif, v1.Nom AS Ville_depart, v2.Nom AS Ville_arrivee, COUNT(etape.Id_Circuit) AS nb_etape
FROM circuit
JOIN ville v1 ON circuit.Ville_depart = v1.Id_Ville
JOIN ville v2 ON circuit.Ville_arrivee = v2.Id_Ville
LEFT JOIN etape ON circuit.Id_Circuit = etape.Id_Circuit
GROUP BY circuit.Id_Circuit;



/* supprime lieux qui ne sont pas visités */

DELETE
FROM lieudevisite
WHERE Id_LieuDeVisite NOT IN (SELECT Id_LieuDeVisite from etape);



/* affiche prix d’un circuit touristique complet (inscription + étapes) */

SELECT circuit.Id_Circuit, SUM(lieudevisite.prixVisite) + circuit.prixInscription AS Prix_total
FROM etape
JOIN circuit ON etape.Id_Circuit = circuit.Id_Circuit
JOIN lieudevisite ON etape.Id_LieuDeVisite = lieudevisite.Id_LieuDeVisite
GROUP BY circuit.Id_Circuit;



/* rajouter réservation d’un circuit par un client */

INSERT INTO reservation (Statut, Id_Client, Id_Circuit, nb_resa, date_, Heure)
VALUES ('En Cours', 5, 1, 4, NOW(), NOW());



/* liste nombre de réservations réalisées par un client 
(nom, prénom et nombre de réservation) */

SELECT Nom, Prenom, SUM(nb_resa) AS nb_résa
FROM reservation
JOIN client ON reservation.Id_Client = client.Id_Client
WHERE Statut <> 'Annulé'
GROUP BY client.Id_Client;



/* liste nom et prénom clients n’ayant pas réalisé de réservations dans la dernière année */

SELECT Nom, Prenom
FROM reservation
JOIN client ON reservation.Id_Client = client.Id_Client
WHERE DATE(date_) < '2025-01-01';



/* liste nom voyages qui ont encore des places disponibles */

SELECT
	circuit.nbPlacesDispo - SUM(CASE WHEN Statut <> 'Annulé' THEN reservation.nb_resa ELSE 0 END) AS places_restantes,
	ville.Nom AS Ville_depart,
	pays.Nom AS Destination
FROM reservation
JOIN circuit ON reservation.Id_Circuit = circuit.Id_Circuit
JOIN ville ON circuit.Ville_depart = ville.Id_Ville
JOIN pays ON ville.Id_Pays = pays.Id_Pays
GROUP BY circuit.nbPlacesDispo
HAVING circuit.nbPlacesDispo - SUM(CASE WHEN Statut <> 'Annulé' THEN reservation.nb_resa ELSE 0 END) > 0;



/* affiche nom circuit, nombre de jours annoncés, date de début minimale et date de
 fin maximale des étapes */

SELECT
	pays.Nom AS Destination,
	DATEDIFF(MAX(etape.dateEtape), DATE(circuit.dateDepart)) AS nb_jours,
	DATE(circuit.dateDepart) AS date_depart,
	MAX(etape.dateEtape) AS date_fin
FROM circuit
JOIN etape ON circuit.Id_Circuit = etape.Id_Circuit
JOIN ville ON circuit.Ville_depart = ville.Id_Ville
JOIN pays ON ville.Id_Pays = pays.Id_Pays
GROUP BY circuit.Id_Circuit;