<?php

require_once '_include/authenticate-user.php';


// Mise a jour des champs dans la table MySQL.

$sql = 'UPDATE users
        SET full_name = ?,
            phone     = ?,
            bio       = ?,
            email     = ?,
            city_id   = ?
        WHERE id = ?';

$r = $db->prepare($sql);
$r->execute(array($_POST['full_name'], $_POST['phone'], $_POST['bio'], $_POST['email'], $_POST['city_id'], $user['id']));
$r->closeCursor();

// Redirection vers la page du Pokémon ennemi...
header('Location: settings.php?my_token=' . $user['token']);

?>
 
