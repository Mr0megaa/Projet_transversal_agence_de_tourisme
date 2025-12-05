<?php
include "connect.php";

$sql = 'SELECT c.id_circuit, c.descriptif, c.duree, c.prixInscription,
               (
                 SELECT lv.image
                 FROM etape e
                 JOIN lieudevisite lv ON e.id_lieudevisite = lv.id_lieudevisite
                 WHERE e.id_circuit = c.id_circuit
                 ORDER BY e.id_etape ASC
                 LIMIT 1
               ) AS imageLieu
        FROM circuit c
        ORDER BY c.id_circuit';

$result = $bdd->query($sql);

$circuit = [];
foreach ($result as $ligne) {
  $circuit[] = [
    'id_circuit'      => $ligne['id_circuit'],
    'descriptif'      => $ligne['descriptif'],
    'duree'           => $ligne['duree'],
    'prixInscription' => $ligne['prixInscription'],
    'imageLieu'       => $ligne['imageLieu']
  ];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nos Circuits</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
    rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top ">
    <div class="container-fluid ">
      <a class="navbar-brand orange gras josefin color-principal" href="index.html">Voyage-Voyage</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link fw-bold black margin10 josefin color-principal" href="index.html#destination">DESTINATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold black margin10 josefin color-principal" href="circuit.php">CIRCUIT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold black margin10 josefin color-principal" href="login.php">PROFIL</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="circuit container mt-5 pt-5">
    <h1 class="h1-circuit mb-4 josefin">Nos Circuits</h1>
    <div class="row">
      <?php foreach ($circuit as $c) : ?>
        <div class="col-md-4">
          <div class="card mb-4">
            <?php if (!empty($c['imageLieu'])): ?>
              <img src="<?= htmlspecialchars($c['imageLieu']) ?>" class="card-img-top" alt="Image du circuit">
            <?php endif; ?>

            <div class="card-body circuit">
              <h5 class="card-title">Circuit n°<?= htmlspecialchars($c['id_circuit']) ?></h5>
              <p class="card-text line-clamp-2"><?= htmlspecialchars($c['descriptif']) ?></p>
              <p><strong>Durée :</strong> <?= htmlspecialchars($c['duree']) ?> jours</p>
              <p><strong>Prix :</strong> <?= htmlspecialchars($c['prixInscription']) ?> €</p>

              <!-- Bouton pour ouvrir le formulaire -->
              <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#reservationModal<?= $c['id_circuit'] ?>">
                Réserver
              </button>
            </div>
          </div>
        </div>

        <!-- Fenêtre modale contenant le formulaire -->
        <div class="modal fade" id="reservationModal<?= $c['id_circuit'] ?>" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">

              <form action="reservation.php" method="POST">
                <div class="modal-header">
                  <h5 class="modal-title">Réserver le Circuit n°<?= $c['id_circuit'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                  <input type="hidden" name="id_circuit" value="<?= $c['id_circuit'] ?>">

                  <div class="mb-3">
                    <label class="form-label">Votre Nom :</label>
                    <input type="text" name="nom" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Votre Prénom :</label>
                    <input type="text" name="prenom" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Votre Email :</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Nombre de places :</label>
                    <input type="number" name="nb_places" class="form-control" min="1" value="1" required>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-success w-100">Valider la réservation</button>
                </div>
              </form>

            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </section>

  <section class="footer">
    <div class="footer-item">
      <h3 class="white josefin">Voyage-Voyage</h3>
      <p class="white josefin">Explore le monde en toute sérénité.</p>
    </div>
    <div class="footer-item">
      <h4 class="white josefin">Navigation</h4>
      <ul>
        <li><a class="white josefin" href="index.html">Accueil</a></li>
        <li><a class="white josefin" href="index.html#destination">Destination</a></li>
        <li><a class="white josefin" href="circuit.php">Circuit</a></li>
        <li><a class="white josefin" href="login.html">Profil</a></li>
      </ul>
    </div>
    <div class="footer-item">
      <h4 class="white josefin">Contact</h4>
      <p class="white josefin">ici-ça@voyage-voyage.Fr <br>01 23 45 67 89</p>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>