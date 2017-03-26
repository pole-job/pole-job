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

                            <h2>rechercher</h2>
                    <form action="" class="formulaire">
                   <input class="champ" type="text" value="rechercher"/>
                        <input class="bouton" type="button" value="OK" />

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

      <!-- Ici, il faut faire un SELECT avec SQL pour obtenir la liste des jobs (dans une variable $jobs).
      Puis, il faut faire une boucle for afin d'afficher leurs parametres et un lien pour chacun, dynamiquement. -->

      <table>

        <?php
        $sql = 'SELECT *
                  FROM `jobs`
                  WHERE city_id = ?';

          $req = $db->prepare($sql);
          $req->execute(array($user['city_id']));

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
