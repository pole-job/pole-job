<?php

include('bibliotheque.php');



$message = verification();
if ($message == 'ok')

  {$categorie = $_POST["categorie"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$age = $_POST["age"];
$mot_passe = $_POST["mot_passe"];
$mot_passe_2 = $_POST["mot_passe_2"];
$question = $_POST["question"];
$reponse = $_POST["reponse"];
$courriel = $_POST["courriel"];
$adresse = $_POST["adresse"];
$ville = $_POST["ville"];
$code_postal = $_POST["code_postal"];
$portable = $_POST["portable"];
$sexe = $_POST["sexe"];
$publicite = $_POST["publicite"];


    // Vérifier que l'adhérent n'est pas déjà dans la base
    $connexion = connecter();
    $requete = "SELECT * FROM adherent WHERE courriel = '$courriel'";
    $resultat = mysqli_query($connexion, $requete);
    if (mysqli_num_rows($resultat) != 0)
      {
        $message = 'vous êtes déjà inscrit';
        $erreur = true;
      }
    else
      {
        $connexion = connecter();
        $requete = "INSERT INTO adherent (categorie, prenom, nom, age, mot_passe, question, reponse, courriel, adresse, ville,code_postal ,portable , sexe, publicite)
		VALUES ('$categorie', '$prenom', '$nom', '$age', '$mot_passe', '$question', '$reponse' ,'$courriel', '$adresse', '$ville', '$code_postal','$portable','$sexe', '$publicite') ";

        $resultat = mysqli_query($connexion, $requete);
        mysqli_close($connexion);
        if (!$resultat)
          {
            $message = 'vous êtes inscrit';
			$erreur = false;
			// La variable de session 'pseudo' sert
			$_SESSION['courriel'] = $courriel;
          }

        else
         {
            $message = 'Problème en traitant la requête : '.$requete;
            $erreur = true;
          }

      }
  }
  else {$erreur=true;}

include ('entete.html');
echo $message;
if ($erreur)
  {
    echo ' <a href="Mon compte.php">Veuillez réessayer</a>';
  }




//
// Cette fonction verifie les champs obligatoires dans $_POST.
// S'il y a une erreur, elle retourne un message indiquant l'erreur détéctée.
// Sinon, elle retourne 'ok'
//
function verification()
// Rappel,
//   isset(champ) : est-ce que ce champ existe
//   empty(champ) : est-ce que ce champ est vide
  {
//  SI  $_POST['categorie'] n'existe pas OU s'il est vide
    if (!isset($_POST['categorie']) || empty($_POST['categorie']))
      {
        return 'catégorie non saisie';
      }
    if (!isset($_POST['prenom']) || empty($_POST['prenom']))
      {
        return 'prenom non saisi';
      }
    if (!isset($_POST['nom']) || empty($_POST['nom']))
      {
        return 'nom non-saisi';
      }
    if (!isset($_POST['age']) || empty($_POST['age']))
      {
        return 'age non saisi';
      }
    if (!isset($_POST['mot_passe']) || empty($_POST['mot_passe']))
      {
        return 'Mot de passe non saisi';
      }
    if (!isset($_POST['mot_passe_2']) || ($_POST['mot_passe_2'] != $_POST['mot_passe']))
      {
        return 'Les mots de passe ne correspondent pas';
      }
    if (!isset($_POST['reponse']) || ($_POST['reponse'] != $_POST['reponse']))
      {
        return 'reponse non saisie';
      }
	if (!isset($_POST['courriel']) || ($_POST['courriel'] != $_POST['courriel']))
      {
        return 'courriel non saisi';
      }
	if (!isset($_POST['adresse']) || ($_POST['adresse'] != $_POST['adresse']))
      {
        return 'adresse non saisie';
      }
	if (!isset($_POST['ville']) || ($_POST['ville'] != $_POST['ville']))
      {
        return 'ville non saisie';
      }
	if (!isset($_POST['code_postal']) || ($_POST['code_postal'] != $_POST['code_postal']))
      {
        return 'code_postal non saisi';
      }
	if (!isset($_POST['portable']) || ($_POST['portable'] != $_POST['portable']))
      {
        return 'portable non saisi';
      }
	if (!isset($_POST['sexe']) || ($_POST['sexe'] != $_POST['sexe']))
      {
        return 'sexe non saisi';
      }
// Si on est arrivé ici sans problème, tout est ok.
    return 'ok';
  }


?>
