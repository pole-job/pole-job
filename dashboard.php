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
        <li><a href="dashboard.php?my_token=<?php echo $user['token']; ?>">Dashboard</a></li>
        <li><a href="logout.php?my_token=<?php echo $user['token']; ?>">Se déconnecter</a></li>
      </ul>
    </nav>

    <hr />

    <article>
      <h2>Dashboard</h2>

      <!-- Ici, il faut faire un SELECT avec SQL pour obtenir la liste des jobs (dans une variable $jobs).
      Puis, il faut faire une boucle for afin d'afficher leurs parametres et un lien pour chacun, dynamiquement. -->

      <table>

        <?php
          $sql = 'SELECT DISTINCT *
                  FROM `cities`, `jobs`, `users`
                  WHERE cities.id = jobs.city_id AND
                        cities.id = users.city_id AND
                        cities.id = ?';


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
