<?php

require_once '_include/authenticate-user.php';

// Si il n'y a pas l'ID du job à afficher sur la page.
if (!isset($_GET['job_id'])) {
  exit("Le parametre 'job_id' n'est pas present dans l'URL");
}

// Chargement du code de la fonction...
$sql = 'SELECT *
        FROM `jobs`
        WHERE id = ?';

$r = $db->prepare($sql);

$r->execute(array($_GET['job_id']));

if ($r->rowCount() != 1) {
  exit('Ce job est introuvable.');
}

$job = $r->fetch();

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <title>PoleJob</title>
  </head>

  <body>
    <header>
      <h1>PoleJob</h1>
    </header>

    <hr />

    <nav>
      <ul>
        <li><a href="dashboard.php?my_token=<?php echo $user['token']; ?>">Dashboard</a></li>
        <li><a href="logout.php?my_token=<?php echo $user['token']; ?>">Se déconnecter</a></li>
      </ul>
    </nav>

    <hr />

    <article>
      <h2>Nom du job ici (par exemple "Recherche d'un developpeur Java")</h2>

      ici, on peut mettre la description de ce job.
    </article>
  </body>
</html>
