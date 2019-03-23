<?php 
session_start();
require 'bd.php';

// Если принимаем Get, получаем id автора и меняем статус удаления
if(isset($_GET['id'])) {

	$last_id = $_GET['id'];
	$deleted = 1;
	$sql = 'UPDATE posts SET deleted = :deleted where id = :last_id';
    $result = $pdo->prepare($sql);
    $result->execute(array(':last_id' => $last_id, ':deleted' => $deleted));
    header('Location: index.php');
    exit();
}















































?>