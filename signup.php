<?php
session_start();
include('bibliotheque.php');

$courriel = $_POST['courriel'];
$motdepasse = $_POST['mot_passe'];

$requete = "SELECT courriel, motdepasse FROM adherent
            WHERE courriel='$courriel' AND motdepasse='$motdepasse'";
$connexion = connecter();
$resultat = mysqli_query($connexion, $requete);
mysqli_close($connexion);
if (mysqli_num_rows($resultat) == 0)
  {
    $message = 'Mauvais courriel/mot de passe.';
    $erreur = true;
  }
else
  {
    $message = 'Vous êtes connecté.';
    $erreur = false;
    $_SESSION['courriel'] = $courriel;
  }

///////////////////////////////////// PARTIE VISIBLE /////////////////////////////////////


include ('entete.html');
echo $message;
if ($erreur)
  {
    echo ' <a href="Mon compte.php">Veuillez réessayer</a>';
  }

?>

