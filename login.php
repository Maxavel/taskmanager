<?php
session_start();
include 'bd.php';

   $userlogin = $_POST['userlogin'];
   $password  = md5(md5($_POST['password']));

   $statement = $pdo->prepare('SELECT id FROM user WHERE userlogin = :userlogin AND password = :password');
   
   $statement->execute(array(
   			userlogin => $userlogin, 
   			password => $password
   		));

   $count = $statement->rowCount();

if($count == 1)
{
	$_SESSION['add_user'] = $userlogin;
	echo 'Вы авторизованы!<br> 
	Можете перейти на <a href="/">главную</a> страницу.<hr>';
	
 }
 else 
 {
	$errorMessage = 'Логин или пароль неверные!';
	include 'errors.php';
	exit;
}

var_dump($_SESSION);

/*    */
?> 