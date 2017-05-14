<?php

require_once '_include/authenticate-user.php';

?>

<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8" />
    <title>PoleJob</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>

  <body>
    <header>
      <h1>PoleJob</h1>

      <h4>
        Bonjour, <?php echo $user['full_name'] ?> !
      </h4>
    </header>

    <div id="searchbar">
      <h2>Rechercher une offre</h2>

      <?php

      if (isset($_GET['q'])) {
        $q = $_GET['q'];
      }
      else {
        $q = '';
      }

      ?>

      <form action="dashboard.php" method="get">
        <p>
          <input                type="hidden" name="my_token" value="<?php echo $user['token']; ?>">
          <input class="champ"  type="search" name="q"        value="<?php echo $q; ?>" placeholder="HTML5, PHP, etc." />
          <input class="bouton" type="submit"                 value="Recherche Pole-Job" />
        </p>
      </form>
    </div>

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
      <h2>Offres d'emploi</h2>

      <table>

        <?php
          if (isset($_GET['q'])) {
            // Recherche toutes les offres qui contiennent la phrase de la recherche...
            $sql = 'SELECT *
                      FROM `jobs`
                      WHERE description LIKE ?';

            $req = $db->prepare($sql);
            $req->execute(array("%" . $_GET['q'] . "%"));
          }
          else {
            // Recherche toutes les offres qui sont dans la ville...
            $sql = 'SELECT *
                      FROM `jobs`
                      WHERE city_id = ?';

            $req = $db->prepare($sql);
            $req->execute(array($user['city_id']));
          }

          while ($job = $req->fetch())
          {
            ?>

            <tr>
              <td><?php echo $job['title'] ?></td>
              <td><a href="job.php?my_token=<?php echo $user['token']; ?>&job_id=<?php echo $job['id']; ?>">description</a></td>
            </tr>

            <?php
          }
        ?>

      </table>
    </article>
  </body>
</html>
