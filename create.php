<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'bd.php';
include 'images.php';

$title     = $_POST['title'];
$post      = $_POST['post'];
$draft     = $_POST['draft'];
$userlogin = $_SESSION['add_user'];

if (!isset($status))
{
    $status = 'В процессе';
}

$sql = 'SELECT id from user where userlogin = :userlogin';
$statement = $pdo->prepare($sql);
$statement->bindParam(':userlogin', $userlogin);
$statement->execute();
$autor_id = $statement->fetchColumn();

$sql = 'INSERT INTO posts (title, post, autor_id, date_add, draft, status) values (:title, :post, :autor_id, NOW(), :draft, :status)';
$statement = $pdo->prepare($sql);

$statement->bindParam(':title', $title);
$statement->bindParam(':post', $post);
$statement->bindParam(':autor_id', $autor_id);
$statement->bindParam(':draft', $draft);
$statement->bindParam(':status', $status);

$statement->execute();
$last_id = $pdo->lastInsertId();
$_SESSION['last_id'] = $last_id;

$sql = 'INSERT INTO images (name, last_id) values (:name, :last_id)';
$statement = $pdo->prepare($sql);

$statement->bindParam(':name', $name);
$statement->bindParam(':last_id', $last_id);

$statement->execute();


?>