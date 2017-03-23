<?php

require_once '_include/authenticate-user.php';

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

      <p>
        Bonjour, <?php echo $user['full_name'] ?> !
      </p>
    </header>

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
      <h2>Paramètres personelles</h2>

      <form action="settings-post.php?my_token=<?php echo $user['token']; ?>" method="post">

        <p>
          <label>Nom complet<br />
          <input name="full_name" required="required" value="<?php echo $user['full_name']; ?>"></label>
        </p>

        <p>
          <label>Phone<br />
          <input name="phone" required="required" type="tel" value="<?php echo $user['phone']; ?>"></label>
        </p>

        <p>
          <label>Bio<br />
          <textarea name="bio" required="required"><?php echo $user['bio']; ?></textarea></label>
        </p>

        <p>
          <label>Courriel<br />
          <input name="email" required="required" type="email" value="<?php echo $user['email']; ?>"></label>
        </p>

        <p>
          <label>Ville<br />
          <select name="city_id">
            <?php
              // Chargement des villes...
              $sql = 'SELECT *
                      FROM `cities`
                      ORDER BY name';
              $req = $db->prepare($sql);
              $req->execute(array());
              // On affiche chaque ville.
              while ($city = $req->fetch())
              {
                ?>

                <option value="<?php echo $city['id']; ?>" <?php if ($city['id'] == $user['city_id']) { echo 'selected="selected"'; } ?>><?php echo $city['name']; ?></option>

                <?php
              }
            ?>
          </select></label>
        </p>

        <p>
          <input type="submit" value="Mettre à jour mon profil">
        </p>

      </form>
    </article>
  </body>
</html>
