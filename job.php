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
    <link rel="stylesheet" type="text/css" href="style.css"/>

    <hr />

    <nav>
      <ul>
        <li><a href="dashboard.php?my_token=<?php echo $user['token']; ?>">Offres d'emploi</a></li>
        <li><a href="logout.php?my_token=<?php echo $user['token']; ?>">Se déconnecter</a></li>
        <li><a href="settings.php?my_token=<?php echo $user['token']; ?>">Paramètres personelles</a></li>
      </ul>
    </nav>

    <hr />

    <article>
      <h2><?php echo $job['title'] ?></h2>
	     <?php echo $job['description'] ?>
    </article>

    <h2>POSTULER </h2>
  <form action="" class="formulaire">
 <TEXTAREA name="nom" rows=25 cols=120> </TEXTAREA>
  <INPUT type="button" value="envoyer"


  </form>
  </body>
</html>
