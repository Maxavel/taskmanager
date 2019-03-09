<?php
include 'bd.php';

$userlogin  = $_POST['userlogin'];
$password   = md5($_POST['password']);

 foreach ($_POST as $input )
 { if(empty($input)) {
		include 'errors.php';
		exit;
	} }

$statement = $pdo->prepare('SELECT id FROM user WHERE userlogin = :userlogin AND password = :password');
$statement->bindParam("userlogin", $userlogin,PDO::PARAM_STR);
$statement->bindParam("password", $password,PDO::PARAM_STR);
$statement->execute();
$count=$statement->rowCount();
$data=$statement->fetch(PDO::FETCH_OBJ);

var_dump($data);
?> 