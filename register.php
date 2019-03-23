<?php
include 'bd.php';

$username   = $_POST['username'];
$email      = $_POST['email'];
$userlogin  = $_POST['userlogin'];
$password   = $_POST['password'];

 foreach ($_POST as $input )
 {
	if(empty($input))
  {
		include 'errors.php';
		exit;
	}
}

$sql = 'SELECT id from user where (email=:email or userlogin=:userlogin) or (email=:email and userlogin=:userlogin)';
$statement = $pdo->prepare($sql);
$statement->execute(array(':email' => $email,':userlogin' => $userlogin));
$result = $statement->fetchAll();
if(!empty($result))
{
	$errorMessage = 'Логин или Email уже существует!';
	include 'errors.php';
	exit;
}

$sql = 'INSERT INTO user (username, email, userlogin, password) values (:username, :email, :userlogin, :password)';
$statement = $pdo->prepare($sql);
$_POST['password'] = md5(md5($_POST['password']));
$result = $statement->execute($_POST);
if(!$result)
{
	$errorMessage = 'Ошибка подключения';
} else {
  header('Location: login-form.php');
}

?>
