<?php
session_start();
include 'bd.php';

foreach($_POST as $input) {
    if(empty($input)) {
        include 'errors.php';
        exit;
    }
}

   $userlogin = $_POST['userlogin'];
   $password  = md5(md5($_POST['password']));

   $statement = $pdo->prepare('SELECT id FROM user WHERE userlogin = :userlogin AND password = :password');
   
   $statement->execute(array(
   			userlogin => $userlogin, 
   			password => $password
   		));

   $count = $statement->rowCount();
// Если только одно совпадение
if($count == 1)
{
	$_SESSION['add_user'] = $userlogin;
	header('Location: index.php');
	
}
 else 
{
	$errorMessage = 'Логин или пароль неверные!';
	include 'errors.php';
	exit;
}

?> 