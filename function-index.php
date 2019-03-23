<?php
include 'bd.php';
$userlogin = $_SESSION['add_user'];

// Получаем айди по логину, хотя могли бы не тупить и засунуть в сессию сразу айди
$sql = 'SELECT id from user where userlogin = :userlogin';
$statement = $pdo->prepare($sql);
$statement->bindParam(':userlogin', $userlogin);
$statement->execute();
$autor_id = $statement->fetchColumn();

// Выбираем пост по айди
$data = $pdo->prepare('SELECT * FROM posts WHERE autor_id = :autor_id');
$data->execute(array('autor_id' => $autor_id));
$result = $data->fetchAll();


?>