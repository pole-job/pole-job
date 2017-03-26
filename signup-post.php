<?php

require_once '_include/connection.php';

$sql = 'INSERT INTO users(full_name, phone, bio, email, password, token, city_id)
        VALUES(:full_name, :phone, :bio, :email, :password, :token, :city_id)';

$token = mt_rand();

$req = $db->prepare($sql);
$req->execute(array(
  'full_name' => $_POST['full_name'],
  'phone'     => $_POST['phone'],
  'bio'       => $_POST['bio'],
	'email'     => $_POST['email'],
	'password'  => $_POST['password'],
  'city_id'   => $_POST['city_id'],
	'token'     => $token
));

require_once 'login-post.php'

?>
 
